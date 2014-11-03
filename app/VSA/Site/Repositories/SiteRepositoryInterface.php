<?php
namespace VSA\Site\Repositories;

use Illuminate\Database\Eloquent\Model;

interface SiteRepositoryInterface{
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
	 * @param int id of the user
	 * @return string.
	 * @throws ModelNotFoundException when the user is not found
	*/
	public function getLogoPath();
	
	/**
	 * Returns the image file name used and uploaded for this website.
	 *
	 * @param 
	 * @return string.
	 * @throws ModelNotFoundException when the user is not found
	*/
	public function getLogoImage();
	
	/**
	 * Saves the various site settings
	 *
	 * @param Model
	 * @return bool.
	 * @throws Exception when the user is not found
	*/
	public function saveSettings(Model $site);
}