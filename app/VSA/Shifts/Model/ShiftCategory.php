<?php
namespace VSA\Shifts\Model;

use Illuminate\Database\Eloquent\Model;

class ShiftCategory extends Model{
	
	protected $fillable = [
		'shift_category_color_id', 'name', 'active',
	];
	
	protected $guarded = [
		'id',
	];
	
	public function color(){
		return $this->belongsTo('VSA\Shifts\Model\ShiftCategoryColor');
	}
	
	public static function getValidationRules(){
		return [
			'name' => 'required|unique:shift_categories',
			'shift_category_color_id' => 'required',
		];
	}
}