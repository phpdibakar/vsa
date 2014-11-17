<?php
use VSA\Users\Repositories\UserRepository;
use VSA\Users\Model\User;
use VSA\Users\Model\Gender;
use VSA\Users\Model\UserProfile;
use VSA\Users\Model\EmergencyRelation;
use VSA\Users\Model\Role;
use Illuminate\Support\MessageBag;

class UserController extends BaseController{
	
	public function __construct(UserRepository $user){
		$this->user = $user;
	}
	
	function anyIndex(){
		return Redirect::to('/admin/users/dashboard');
	}
	
	public function anyDashboard(){
		return View::make('admin.users.dashboard');
	}
	
	public function getRegister(){
		$view = $this->isAdmin() ? 'admin.users.register' : 'users.register';
		$genders = Gender::lists('name', 'id');
		$countries = Country::lists('name', 'id');
		$states = State::lists('name', 'id');
		$relationships = EmergencyRelation::lists('name', 'id');
		$roles = Role::where('id', '<>', Config::get('app.saId'))->lists('name', 'id');
		return View::make($view, compact('genders', 'countries', 'states', 'relationships', 'roles'));
	}
	
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
				$user = $this->user->save($user)
					->profile()->createMany(Input::only('profile'));
				
				return Redirect::to('/admin/users/register')
						->with('success', 'Profile created successfully!');
			}catch(\Exception $e){
				return Redirect::back()
					-> with('error', $e->getMessage())
					-> withErrors($validatorUser)
					-> withErrors($validatorUserProfile)
					-> withInput();
			}
		}else{
			//dd('here');
			return Redirect::back()
					-> withErrors(array_merge_recursive(
						$validatorUser->messages()->toArray(),
						$validatorUserProfile->messages()->toArray()
					))
					-> withInput();
		}
	}
	
	public function postLogin(){
		$validator = Validator::make(
			Input::all(), 
			User::getLoginValidationRules()
		);
		
		if($validator->fails()){
			$message = $validator->messages();
			return Redirect::to('/adminlogin')
				->withInput()
				->withErrors($validator);
		}else{
			if(Auth::attempt(array(
				'email' => Input::get('email'), 
				'password' => Input::get('password'), 
				'admin' => 1
				), (bool)Input::get('remember')
			))
				return Redirect::intended('/admin/users/dashboard');
			else
				return Redirect::to('/adminlogin')
				->withInput()
				->withErrors(new MessageBag(['auth' => ['The email or password is wrong or your account is not authorized for administration.']]));
		}
	}
	
	public function anyLogout(){
		if(Auth::check())
			Auth::logout();
		
		return Redirect::to('/admin/users/dashboard');
	}
	
	public function getProfile($tab = null){
		$user_id = Auth::user()->id;
		$user = User::with('profile')->find($user_id);
		$genders = Gender::lists('name', 'id');
		$countries = Country::lists('name', 'id');
		$states = State::where('country_id', $user->profile->country_id)->lists('name', 'id');
		
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
					return Redirect::to('admin/users/profile/password')->with('success', 'Password updated successfully');
				}else
					return Redirect::to('admin/users/profile/password')->with('error', 'Current password does not match with our record');
			}catch(Exception $e){
				return Redirect::to('admin/users/profile/password')->with('error', $e->getMessage());
			}
		}else
			return Redirect::to('admin/users/profile/password')->withError($validator);
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
				return Redirect::to('admin/users/profile/email')->with('success', 'Email address updated successfully');
			}catch(\Exception $e){
				return Redirect::to('admin/users/profile/email')
					->with('error', $e->getMessage())
					->withInput();
			}
		}else
			return Redirect::to('admin/users/profile/email')->withError($validator);
	}
	
	private function isAdmin(){
		return (Route::getCurrentRoute()->getPrefix() == Config::get('app.adminPrefix'));
	}
}