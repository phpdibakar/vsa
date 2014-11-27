<?php
namespace VSA\Users\Repositories;

use Illuminate\Database\Query\Builder;
use VSA\Users\Model\User;
use VSA\Users\Model\Role;

interface UserRepositoryInterface{
	/**
	 * Returns the full name of a user.
	 *
	 * @param int id of the user
	 * @return string.
	 * @throws ModelNotFoundException when the user is not found
	*/
	public function getFullName($id);
	
	/**
	 * create or updates the data for users
	 *
	 * @param Model user
	 * @return Model.
	 * @throws ModelNotFoundException when the user is not found
	*/
	public function save(User $data);
	
	/**
	 * updates a user password against his current password hash 
	 * identified by his /her id
	 * @param int userId
	 * @param string newPassword
	 * @param string oldPasswordHash
	 * @return bool.
	 * @throws Exception
	*/
	public function updatePassword($userId, $newPassword, $oldPassword, $oldPasswordHash);
	
	/**
	 * updates a user login email address after checking its availability by duplicate check
	 * identified by his /her id
	 * @param int userId
	 * @param string email
	 * @return bool.
	 * @throws Exception
	*/
	public function updateLoginEmail($userId, $email);
	
	/**
	 * get the list of users with filtered using the query
	 * @param Illuminate\Database\Query\Builder
	 * @param optional int $limit
	 * @return Illuminate\Database\Eloquent\Collection
	 * @throws Exception
	*/
	public function getUsers(Builder $query, $limit = null);
	
	/**
	 * get list of roles a user can register him/herslf
	 * @param optional mixed ids for specific roles
	 * @param optional int $limit
	 * @return Illuminate\Database\Eloquent\Collection
	 * @throws Exception
	*/
	public function getRoles($ids = null, $limit = null);
	
	/**
	 * get list of roles permissions a role can have
	 * @param optional mixed ids for specific roles
	 * @param optional int $limit
	 * @return Illuminate\Database\Eloquent\Collection
	 * @throws Exception
	*/
	public function getRolePermissions($ids = null, $limit = null);
	
	/**
	 * create or updates the data for user roles
	 *
	 * @param Role role
	 * @return Role.
	 * @throws ModelNotFoundException when the user is not found
	*/
	public function saveRole(Role $role);
	
	/**
	 * delete a role
	 * @param Role role
	 * @return Role.
	 * @throws ModelNotFoundException when the user is not found
	*/
	public function deleteRole(Role $role);
}