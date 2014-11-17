<?php
namespace VSA\Users\Model;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model{
	
	/**
	 * The attributes included from the model's JSON form.
	 *
	 * @var array
	 */
	
	protected $fillable  = ['state_id', 'country_id', 'address', 'zip', 'home_phone', 'occupation'];
	
	public function profile(){
		return $this->belongsTo('VSA\Users\Model\User');
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
			'home_phone' => 'required|numeric|min:8|max:12',
			'country_id' => 'required|numeric',
			'state_id' => 'required|numeric',
			'emergency_contact_name' => 'required|alpha',
			'emergency_relation_id' =>'required|numeric',
			'role_id' =>'required|numeric',
			'emergency_phone_number' =>'required|numeric|min:8|max:12',
			'occupation' =>'required|alpha',
		];
	}

}