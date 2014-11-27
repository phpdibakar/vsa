<?php
namespace VSA\Users\Repositories;

use VSA\Users\Repositories\UserRepositoryInterface;
use VSA\Users\Model\User;
use VSA\Users\Model\Role;
use VSA\Users\Model\RolePermission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Query\Builder;
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
	
	/*
	* @param Illuminate\Database\Query\Builder query
	* @paran int limit
	*/
	public function getUsers(Builder $query, $limit = null){
		User::where()
	}
	
	public function save(User $user){
		if($user->save())
			return $user;
		else
			throw new \Exception('User Saving error');
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
	
	public function getRoles($ids = null, $limit = null){
		$roles = Role::with('permission')->where('active', 1);
		if(!empty($ids))
			$roles->where('id', $ids);
		
		//return $roles->orderBy('disp_order', 'asc')
		return $roles->orderBy('name', 'asc')
			->paginate($limit);
	}
	
	public function getRolePermissions($ids = null, $limit = null){
		$permissions = RolePermission::where('active', 1);
		if(!empty($ids))
			$permissions->where('id', $ids);
		
		return $permissions->orderBy('name', 'asc')
			->lists('name', 'id');
	}
	
	public function saveRole(Role $role){
		if($role->save())
			return $role;
		else
			throw new \Exception('Role Saving error');
	}
	
	public function deleteRole(Role $role){
		if($role->delete())
			return $role;
		else
			throw new \Exception('Role Deletion error');
	}
}