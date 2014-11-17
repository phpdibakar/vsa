<?php
namespace VSA\Users\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class User extends Model implements UserInterface, RemindableInterface, StaplerableInterface {

	use UserTrait, RemindableTrait, EloquentTrait;

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
	 * The attributes included from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable  = ['fname', 'lname', 'email', 'dob', 'avatar', 'visible', 'gender_id', 'role_id'];
	
	//constructor 
	public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('avatar', [
            'styles' => [
            'small' => '30x30',
            'medium' => '300x300',
            'thumb' => '150x150'
            ]
        ]);

        parent::__construct($attributes);
    }
	
	/**
	* Validation rules for various sections
	*
	*/
	
	public static function getRegistrationValidationRules(){
		return [
			'fname' => 'required|alpha',
			'lname' => 'required|alpha',
			'email' => 'required|email|confirmed|unique:users,email',
			//'email_confirmation' => 'required|email',
			'dob' => 'required|date',
			'password' => 'required|min:6|max:14|confirmed',
			//'password_confirmation' => 'required|min:6|max:14|confirmed',
			'gender_id' =>'required|numeric',
			'role_id' =>'required|numeric',
		];
	}
	
	public static function getLoginValidationRules(){
		return [
			'email' => 'required|email',
			'password' => 'required',
		];
	}
	
	public static function getUpdateValidationRules(){
		return [
			'fname' => 'required|alpha',
			'lname' => 'required|alpha',
			'gender' => 'numeric',
		];
	}
	
	public static function getPasswordValidationRules(){
		return [
			'current_password' => 'required|min:6|max:15',
			'password' => 'required|min:6|max:15',
			'conf_password' => 'required|same:password',
		];
	}
	
	public static function getLoginEmailChangeValidations(){
		return [
			'email' => 'required|email',
			'conf_email' => 'required|email|same:email',
		];
	}
	
	public static function getAttributesNiceNames(){
		return [
			'fname' => 'First Name',
			'lname' => 'last Name',
			'gender_id' => 'Gender',
			'email' => 'Email Address',
			'avatar' => 'Avatar Image',
			'visible' => 'visibility',
		];
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
