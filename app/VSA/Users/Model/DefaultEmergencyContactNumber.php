<?php
namespace VSA\Users\Model;

use Illuminate\Database\Eloquent\Model;

class DefaultEmergencyContactNumber extends Model{
	/**
	 * The timestamps fields used default by the model.
	 *
	 * @var string
	 */
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'default_emergency_contact_numbers'; 
	
	protected $fillable = ['number', 'type'];
}