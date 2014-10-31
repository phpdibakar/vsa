<?php
use VSA\Users\Repositories\UserRepository;
class UserController extends BaseController{
	
	public function __construct(UserRepository $user){
		$this->user = $user;
	}
	
	public function dashboard($id){
		return $this->user->getFullName($id);
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
			if(Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
				return Redirect::intended('/admin/user/dashboard');
			else
				return Redirect::to('/adminlogin')
				->withInput();
				//->withErrors(Auth);
		}
	}
	
}