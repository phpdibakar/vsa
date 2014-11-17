<?php
namespace VSA\Users\Repositories;

use VSA\Users\Model\User;

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
}