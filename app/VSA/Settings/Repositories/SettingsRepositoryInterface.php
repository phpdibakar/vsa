<?php
namespace VSA\Settings\Repositories;

use Illuminate\Database\Eloquent\Model;

interface SettingsRepositoryInterface{
	/**
	 * Returns the full name of a user.
	 *
	 * @param int id of the user
	 * @return string.
	 * @throws ModelNotFoundException when the user is not found
	*/
	public function getName();
	
	/**
	 * Returns the full name of a user.
	 *
	 * @param int id of the user
	 * @return string.
	 * @throws ModelNotFoundException when the user is not found
	*/
	public function getTagline();
	
	/**
	 * Returns the full name of a user.
	 *
	 * @param bool absolute to determine absolute or relative
	 * @return string.
	 * @throws ModelNotFoundException when the user is not found
	*/
	public function getLogoPath($absolute = false);
	
	/**
	 * Returns the image file name used and uploaded for this website.
	 *
	 * @param 
	 * @return string.
	 * @throws ModelNotFoundException when the user is not found
	*/
	public function getLogoImage();
	
	/**
	 * Returns the admin email address used for this website.
	 *
	 * @param 
	 * @return string.
	 * @throws ModelNotFoundException when the user is not found
	*/
	
	public function getAdminEmail();
	
}