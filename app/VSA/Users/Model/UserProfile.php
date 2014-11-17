<?php
namespace VSA\Users\Model;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model{
	
	/**
	 * The attributes included from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable  = ['state_id', 'country_id', 'emergency_relation_id', 'address', 'zip', 'home_phone', 'occupation'];
	
	public function user(){
		return $this->belongsTo('VSA\Users\Model\User');
	}
	
	public function defaultEmergencyNumber(){
		return $this->hasOne('VSA\Users\Model\DefaultEmergencyContactNumber');
	}
	
	/* validation rules 
	
	*/
	public static function getUpdateValidationRules(){
		return [
			'state_id' => 'required|numeric',
			'country_id' => 'required|numeric',
			'address' => 'required|alpha_num',
			'zip' => 'required|alpha_num',
			'home_phone' => 'required|numeric',
		];
	}
	
	public static function getRegistrationValidationRules(){
		return [
			'address' => 'required',
			'city' => 'required|alpha',
			'zip' => 'required',
			'home_phone' => 'required|numeric|min:8',
			'country_id' => 'required|numeric',
			'state_id' => 'required|numeric',
			'emergency_contact_name' => 'required',
			'emergency_relation_id' =>'required|numeric',
			'emergency_phone_number' =>'required|numeric|min:8',
			'occupation' =>'required',
		];
	}

}