<?php
namespace VSA\Controllers\Admin;

use VSA\Users\Repositories\UserRepository;
use VSA\Users\Model\User;
use VSA\Users\Model\Gender;
use VSA\Users\Model\UserProfile;
use VSA\Users\Model\EmergencyRelation;
use VSA\Users\Model\Role;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\Events\Dispatcher;

use VSA\Controllers\Admin\BaseController;

class UserController extends BaseController{
	
	public function __construct(UserRepository $user, Dispatcher $event){
		parent::__construct();
		
		$this->user = $user;
		$this->event = $event;
	}
	
	function anyIndex(){
		return Redirect::to($this->_adminPrefix. '/users/dashboard');
	}
	
	public function anyDashboard(){
		return View::make('admin.users.dashboard');
	}
	
	//method to show registration forms from both admin and front-end
	public function getRegister(){
		$genders = Gender::lists('name', 'id');
		$countries = \Country::lists('name', 'id');
		$states = \State::lists('name', 'id');
		$relationships = EmergencyRelation::lists('name', 'id');
		$roles = Role::where('id', '<>', Config::get('app.saId'))->lists('name', 'id');
		return View::make('admin.users.register', compact('genders', 'countries', 'states', 'relationships', 'roles'));
	}
	
	//method to register new users from both admin and front-end
	public function postRegister(){
		//initializing model validation
		$validatorUser = Validator::make(Input::all(), User::getRegistrationValidationRules());
		$validatorUser->setAttributeNames(User::getAttributesNiceNames());
		$validatorUserProfile = Validator::make(Input::only('profile')['profile'], UserProfile::getRegistrationValidationRules());
		
		if(!$validatorUser->fails() && 
			!$validatorUserProfile->fails())
		{
			try{
				$user = new User();
				
				//filling data
				$user->fill(Input::except([
						'_token',
						'profile',
					]
				));
				
				//making password
				$user->password = Hash::make(Input::get('password'));
				
				//saving the user data then updating profile data
				$user = $this->user->save($user);
				$userProfile = $user->profile()
					->createMany(Input::only('profile'))[0]
					->defaultEmergencyNumber()->create([
						'number' => Input::get('preferred_cno'),
						'type' => Input::get('default_cno_type')
					]);
				
				//firing event to notify the user for this sign up
				$this->event->fire('user.registered', array($user));
				
				return Redirect::to($this->_adminPrefix. '/users/register')->with('success', 'The registration completed successfully!');
			}catch(\Exception $e){
				return Redirect::back()
					-> with('error', $e->getMessage())
					-> withErrors($validatorUser)
					-> withErrors($validatorUserProfile)
					-> withInput();
			}
		}else{
			return Redirect::back()
					-> withErrors(array_merge_recursive(
						$validatorUser->messages()->toArray(),
						$validatorUserProfile->messages()->toArray()
					))
					-> withInput();
		}
	}
	
	//method to authenticate Admins for administration access
	public function postLogin(){
		$validator = Validator::make(
			Input::all(), 
			User::getLoginValidationRules()
		);
		
		if($validator->fails()){
			$message = $validator->messages();
			return Redirect::back()
				->withInput()
				->withErrors($validator);
		}else{
			if(Auth::attempt(array(
				'email' => Input::get('email'), 
				'password' => Input::get('password'),
				'admin' => 1,
				), (bool)Input::get('remember')
			))
				return Redirect::intended($this->_adminPrefix. '/users/dashboard');
			else
				return Redirect::back()
				->withInput()
				->withErrors(new MessageBag(
					['auth' => [
						'The email or password is wrong or your account is not authorized for administration.'
					]]
				));
		}
	}
	
	public function anyLogout(){
		if(Auth::check())
			Auth::logout();
		
		return Redirect::to($this->_adminPrefix. '/users/dashboard');
	}
	
	public function getProfile($tab = null){
		$user_id = Auth::user()->id;
		$user = User::with('profile')->find($user_id);
		$genders = Gender::lists('name', 'id');
		$countries = \Country::lists('name', 'id');
		$states = \State::where('country_id', $user->profile->country_id)->lists('name', 'id');
		
		return View::make('admin.users.profile', compact('user', 'genders', 'countries', 'states', 'tab'));
	}
	
	public function postProfile(){
		//initializing model validation
		$validatorUser = Validator::make(Input::all(), User::getUpdateValidationRules());
		$validatorUser->setAttributeNames(User::getAttributesNiceNames());
		
		$validatorUserProfile = Validator::make(Input::only('profile')['profile'], UserProfile::getUpdateValidationRules());
		
		if(!$validatorUser->fails() && !$validatorUserProfile->fails()){
			
			$user = User::with('profile')->find(Input::get('id'));
			
			$user_data = Input::except(array('_token', 'profile'));
			$user_profile_data = Input::only(array('profile'))['profile'];
			
			if($user->update($user_data) && $user->profile->update($user_profile_data))
				return Redirect::to('/admin/users/profile')->with('success', 'Profile Updated Successfully!');
			else
				return Redirect::back()->with('error', 'Profile update error!')->withInput();
		}else{
			return Redirect::back()->withErrors($validatorUser)->withErrors($validatorUserProfile)->withInput();
		}
	}
	
	public function postPasswordUpdate(){
		$validator = Validator::make(
			Input::all(),
			User::getPasswordValidationRules()
		);
		
		if(!$validator->fails()){
			//updating password
			try{
				if($this->user->updatePassword(
					Auth::user()->id, 
					Input::get('password'),
					Input::get('current_password'),
					Auth::user()->password
				)){
					return Redirect::to($this->_adminPrefix. '/users/profile/password')->with('success', 'Password updated successfully');
				}else
					return Redirect::to($this->_adminPrefix. '/users/profile/password')->with('error', 'Current password does not match with our record');
			}catch(\Exception $e){
				return Redirect::to($this->_adminPrefix. '/users/profile/password')->with('error', $e->getMessage());
			}
		}else
			return Redirect::to($this->_adminPrefix. '/users/profile/password')->withError($validator);
	}
	
	public function postEmailUpdate(){
		$validator =  Validator::make(
			Input::all(),
			User::getLoginEmailChangeValidations()
		);
		
		if(!$validator->fails()){
			try{
				$this->user->updateLoginEmail(
					Auth::user()->id,
					Input::get('email')
				);
				return Redirect::to($this->_adminPrefix.'/users/profile/email')->with('success', 'Email address updated successfully');
			}catch(\Exception $e){
				return Redirect::to($this->_adminPrefix. '/users/profile/email')
					->with('error', $e->getMessage())
					->withInput();
			}
		}else
			return Redirect::to($this->_adminPrefix. '/users/profile/email')->withError($validator);
	}
	
	public function getList(){
		$recordLimit = Input::get('limit');
		$recordLimit = (!empty($recordLimit) && in_array($recordLimit, parent::$pagination_limits)) ? 
			$recordLimit : parent::recordLimit;
		
		//listing all users with all status excluding sa
		$user = User::where('id', '<>', $this->_saId)
			->with(['role', 'profile'])
			->paginate(parent::recordLimit);
		
		return View::make('admin.users.list')
			->withUsers($user)
			->withRecordlimit($recordLimit);
	}
	
	public function getRoleList(){
	$recordLimit = Input::get('limit');
		$recordLimit = (!empty($recordLimit) && in_array($recordLimit, parent::$pagination_limits)) ? 
			$recordLimit : parent::recordLimit;
		$roles = $this->user->getRoles(null, $recordLimit == 'all' ? null : $recordLimit);
		$permissions = $this->user->getRolePermissions();
		return View::make('admin.users.list_roles')
			->withRoles($roles)
			->withPermissions($permissions)
			->withRecordlimit($recordLimit);
	}
	
	public function postRoleList(){
		$validator = Validator::make(Input::all(), Role::getValidationRules());
		if(!$validator->fails()){
			$role = new Role();
			$role->fill(
				Input::only(['name', 'role_permission_id'])
			);
			try{
				$this->user->saveRole($role);
				return Redirect::to($this->_adminPrefix. '/users/role-list')->with('success', 'Role creation successful!');
			}catch(\Exception $e){
				return Redirect::back()->with('error', $e->getMessage())->withInput();
			}
		}else
			return Redirect::back()->withErrors($validator)->withInput();
	}
	
	/*
	*	Method to update multiple shift categories based on the
	*	selection
	*/
	public function postRoleMultiDelete(){
		$role_ids = explode(',', Input::get('role_ids'));
		if(count($role_ids)){
			try{
				foreach($role_ids as $key => $value){
					if(!is_numeric($value))
						continue;
					
					$role = Role::find($value);
					$this->user->deleteRole($role);
				}
				return Redirect::back()->with('success', 'Selected roles deleted successfully');
			}catch(\Exception $e){
				return Redirect::back()->with('error', $e->getMessage());
			}
		}else
			return Redirect::back()->with('error', 'One or more role required to be selected before delete');
	}
	
	public function postRoleMultiUpdate(){
		$selected_items_id = Input::get('id');
		$selected_signup_status = Input::get('public_signup');
		$selected_item_permission_id = Input::get('role_permission_id');
		$selected_disp_rank = Input::get('disp_rank');
		$selected_disp_order = Input::get('disp_order');
		
		$messages = new MessageBag();
		
		if(empty($selected_items_id)){
			return Redirect::to($this->_adminPrefix. '/users/role-list')
				->with('error', 'One or more role required to be selected before update')
				->withInput();
		}
		
		foreach($selected_items_id as $key => $value){
			if( isset($selected_signup_status[$key]) && 
				isset($selected_item_permission_id[$key]) && 
				isset($selected_disp_rank[$key]) && 
				isset($selected_disp_order[$key]) 
			){
				try{
					$role = Role::find($value);
					$role->public_signup = $selected_signup_status[$key];
					$role->role_permission_id = $selected_item_permission_id[$key];
					$role->disp_rank = $selected_disp_rank[$key];
					$role->disp_order = $selected_disp_order[$key];
					//now saving the changes
					$this->user->saveRole($role);
				}catch(\Exception $e){
					$messages->add('error', $e->getMessage());
				}
			}
			
		}
		if($messages->count())
			return Redirect::back()->withErrors($messages);
		else
			return Redirect::to($this->_adminPrefix. '/users/role-list')->with('success', 'Selected roles updated successfully');
	}
}