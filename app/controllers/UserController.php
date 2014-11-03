<?php
use VSA\Users\Repositories\UserRepository;
use Illuminate\Support\MessageBag;

class UserController extends BaseController{
	
	public function __construct(UserRepository $user){
		$this->user = $user;
	}
	
	public function anyDashboard(){
		return View::make('admin.dashboard');
	}
	
	public function postLogin(){
		$validator = Validator::make(
			Input::all(), 
			$this->user->getLoginValidationRule()
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
	
}