<?php
namespace VSA\Shifts\Repositories;

use VSA\Shifts\Repositories\UserRepositoryInterface;
use VSA\Shifts\Model\ShiftCategory;
use VSA\Shifts\Model\ShiftCategoryColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShiftRepository implements ShiftRepositoryInterface{
	
	protected $shift; 
	
	public function __construct(ShiftCategory $shift){
		$this->shift = $shift;
	}
	/*
	@return Illuminate\Database\Eloquent\Collection
	*/
	public function getCategories($ids = null, $limit = null){
		$categories = ShiftCategory::with('color')->where('active', 1);
		if(!empty($ids))
			$categories->where('id', $ids);
		
		return $categories->orderBy('name', 'asc')
			->paginate($limit);
		
	}
	
	public function saveCategory(ShiftCategory $shiftCategory){
		if($shiftCategory->save())
			return $shiftCategory;
		else
			throw new \Exception('Saving error');
	}
	
	public function deleteCategory(ShiftCategory $shiftCategory){
		if($shiftCategory->delete())
			return $shiftCategory;
		else
			throw new \Exception('Deletion error');
	}
	
	public function getCategoryColors($id = null){
		$colors = ShiftCategoryColor::where('active', 1);
		if(!empty($id))
			$colors->where('id', $id);
		
		return $colors->orderBy('order', 'asc')
			->orderBy('name', 'asc')
			->get(['name', 'id', 'color_code'])
			->toArray();
	}
}