<?php
namespace VSA\Users\Model;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model{
	
	public $timestamps = false;
	
	protected $fillable = [
		'name', 
		'active',
	];
	
	protected $guarded = [
		'id',
	];
	
	public static function getValidationRules(){
		return [
			
		];
	}
}