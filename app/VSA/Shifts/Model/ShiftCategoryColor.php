<?php
namespace VSA\Shifts\Model;

use Illuminate\Database\Eloquent\Model;

class ShiftCategoryColor extends Model{
	
	protected $fillable = [
		'name', 'color_code', 'order',
	];
	
	protected $guarded = [
		'id',
	];
	
	public function category(){
		return $this->hasOne('VSA\Shifts\Model\ShiftCategory');
	}
}