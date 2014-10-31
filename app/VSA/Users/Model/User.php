<?php
namespace VSA\Users\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Model implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	/**
	* Validation for login
	*
	*/
	private $_loginValidationRules = [
		'email' => 'required|email',
		'password' => 'required',
	];
	
	public function getLoginValidationRules(){
		return $this->_loginValidationRules;
	}
	
	/**
	 * Relationships
	*/
	
	public function gender(){
		return $this->hasOne('VSA\Users\Model\Gender');
	}
	
	public function role(){
		return $this->belongsTo('VSA\Users\Model\Role');
	}
	
	public function profile(){
		return $this->hasOne('VSA\Users\Model\UserProfile');
	}
}
