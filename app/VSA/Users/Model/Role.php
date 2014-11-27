<?php
namespace VSA\Users\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model{
	
	protected $fillable = [
		'role_permission_id', 
		'name', 
		'public_signup',
		'active',
	];
	
	protected $guarded = [
		'id',
	];
	
	public function permission(){
		return $this->belongsTo('VSA\Users\Model\RolePermission');
	}
	
	public static function getValidationRules(){
		return [
			'name' => 'required|unique:roles',
			'role_permission_id' => 'required',
			'disp_rank' => 'sometimes|required|integer',
			'disp_order' => 'sometimes|required|integer',
		];
	}
}