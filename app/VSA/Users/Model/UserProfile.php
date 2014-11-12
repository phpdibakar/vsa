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
	
	public static function getUpdateValidationRules(){
		return [
			'state_id' => 'required|numeric',
			'country_id' => 'required|numeric',
			'address' => 'required|alpha_num',
			'zip' => 'required|alpha_num',
			'home_phone' => 'required|numeric',
		];
	}

}