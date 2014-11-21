<?php
namespace VSA\Controllers\Front;

use VSA\Users\Repositories\UserRepository;
use VSA\Users\Model\User;
use VSA\Users\Model\Gender;
use VSA\Users\Model\UserProfile;
use VSA\Users\Model\EmergencyRelation;
use VSA\Users\Model\Role;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Hash;
use Illuminate\Events\Dispatcher;


use BaseController;

class UserController extends BaseController{
	
	private $_frontPrefix;
	
	public function __construct(UserRepository $user, Dispatcher $event){
		$this->user = $user;
		$this->event = $event;
		
		$this->_frontPrefix = Config::get('app.frontPrefix');
	}
	
	function anyIndex(){
		return Redirect::to($this->_frontPrefix. '/users/dashboard');
	}
	
	public function anyDashboard(){
		return View::make('users.dashboard');
	}
	
	//method to validate user credential for front-end dashboard access
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
			$login_conditions = array(
				'email' => Input::get('email'), 
				'password' => Input::get('password'), 
			);
			
			if(Auth::attempt(array(
					'email' => Input::get('email'), 
					'password' => Input::get('password'),
				), (bool)Input::get('remember')
			))
				return Redirect::intended($this->_frontPrefix. '/users/dashboard');
			else
				return Redirect::back()
				->withInput()
				->withErrors(new MessageBag(
					['auth' => [
						'The email or password is wrong'
					]]
				));
		}
	}
	
	//method to show registration forms from both admin and front-end
	public function getRegister(){
		$genders = Gender::lists('name', 'id');
		$countries = \Country::lists('name', 'id');
		$states = \State::lists('name', 'id');
		$relationships = EmergencyRelation::lists('name', 'id');
		$roles = Role::where('id', '<>', Config::get('app.saId'))->lists('name', 'id');
		return View::make('users.register', compact('genders', 'countries', 'states', 'relationships', 'roles'));
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
				
				//firing event to notify the admin about the new sign up 
				$this->event->fire('user.admin_notification_for_signup', array($user));
				
				return Redirect::to('/')->with('success', 'Thank you for your registration. You will receive a welcome email with further instructions.');
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
}