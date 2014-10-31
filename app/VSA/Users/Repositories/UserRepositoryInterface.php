<?php
namespace VSA\Users\Repositories;

use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface{
	/**
	 * Returns the full name of a user.
	 *
	 * @param int id of the user
	 * @return string.
	 * @throws ModelNotFoundException when the user is not found
	*/
	public function getFullName($id);
	
	public function getLoginValidationRule();
}