<?php
namespace VSA\Users\Repositories;

use VSA\Users\Repositories\UserRepositoryInterface;
use VSA\Users\Model\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

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
	
	public function save(User $user){
		if($user->save())
			return $user;
		else
			throw new \Exception('Saving error');
	}
	
	public function updatePassword($userId, $newPassword, $oldPassword, $oldPasswordHash){
		if(Hash::check($oldPassword, $oldPasswordHash)){
			return $this->user->where('id', $userId)->update(array('password' => Hash::make($newPassword)));
		}else
			throw new \Exception('The given current password does not match with our record.');
	}
	
	public function updateLoginEmail($userId, $email){
		if(!$this->user->where('email', '=', $email)->where('id', '<>', $userId)->pluck('id')){
			$updated_row = (bool) $this->user->where('id', $userId)->update(['email' => $email]);
			if($updated_row)
				return $updated_row;
			else
				throw new \Exception('Updating of email address did not complete successfully.');
		}else
			throw new \Exception('Requested email address is already existed in our records.');
	}
}