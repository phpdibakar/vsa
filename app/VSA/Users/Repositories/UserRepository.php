<?php
namespace VSA\Users\Repositories;

use VSA\Users\Repositories\UserRepositoryInterface;
use VSA\Users\Model\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserRepository implements UserRepositoryInterface{
	
	protected $user; 
	
	public function __construct(User $user){
		$this->user = $user;
	}
	public function getFullName($id){
		$user = $this->user->find($id);
		if(count($user)){
			return $user->fname . ' '. $user->lname;
		}else
			throw new ModelNotFoundException('The user does not seem to exist', 1);
	}
	
	public function getLoginValidationRule(){
		return $this->user->getLoginValidationRules();
	}
}