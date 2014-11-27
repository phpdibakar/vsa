<?php
namespace VSA\Controllers\Admin;

use VSA\Shifts\Repositories\ShiftRepository;
use VSA\Shifts\Model\ShiftCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\MessageBag;

use VSA\Controllers\Admin\BaseController;

class ShiftController extends BaseController{
	
	public function __construct(ShiftRepository $shift){
		parent::__construct();
		
		$this->shift = $shift;
	}
	
	public function getCategoryList(){
		//getting custom pagination limits set by user
		$recordLimit = Input::get('limit');
		$recordLimit = (!empty($recordLimit) && in_array($recordLimit, parent::$pagination_limits)) ? 
			$recordLimit : parent::recordLimit;
			
		$colors = $this->shift->getCategoryColors();
		$categories = $this->shift->getCategories(null, $recordLimit == 'all' ? null : $recordLimit);
		
		return View::make('admin.shifts.list_category')
			->withColors($colors)
			->withCategories($categories)
			//->withRecordlimit(parent::recordLimit);
			->withRecordlimit($recordLimit);
	}
	
	public function postCategoryList(){
		$validator = Validator::make(Input::all(), ShiftCategory::getValidationRules());
		if(!$validator->fails()){
			$shiftCategory = new ShiftCategory();
			$shiftCategory->fill(
				Input::only(['name', 'shift_category_color_id'])
			);
			try{
				$this->shift->saveCategory($shiftCategory);
				return Redirect::to($this->_adminPrefix. '/shifts/category-list')->with('success', 'Category creation successful!');
			}catch(\Exception $e){
				return Redirect::back()->with('error', $e->getMessage())->withInput();
			}
		}else
			return Redirect::back()->withErrors($validator)->withInput();
	}
	
	/*
	*	Method to update multiple shift categories based on the
	*	selection
	*/
	public function postCategoryMultiUpdate(){
		$selected_items_id = Input::get('id');
		$selected_item_color_id = Input::get('shift_category_color_id');
		$messages = new MessageBag();
		
		foreach($selected_items_id as $key => $value){
			if(isset($selected_item_color_id[$key])){
				try{
					$category = ShiftCategory::find($value);
					$category->shift_category_color_id = $selected_item_color_id[$key];
					$this->shift->saveCategory($category);
				}catch(\Exception $e){
					$messages->add('error', $e->getMessage());
				}
			}
			
		}
		if($messages->count())
			return Redirect::back()->withErrors($messages);
		else
			return Redirect::to($this->_adminPrefix. '/shifts/category-list')->with('success', 'Selected categories updated successfully');	
	}
	
	/*
	*	Method to delete multiple shift categories based on the
	*	selection
	*/
	public function postCategoryMultiDelete(){
		$cat_ids = explode(',', Input::get('cat_ids'));
		if(count($cat_ids)){
			try{
				foreach($cat_ids as $key => $value){
					if(!is_numeric($value))
						continue;
					
					$category = ShiftCategory::find($value);
					$this->shift->deleteCategory($category);
				}
				return Redirect::back()->with('success', 'Selected category deleted successfully');
			}catch(\Exception $e){
				return Redirect::back()->with('error', $e->getMessage());
			}
		}else
			return Redirect::back()->with('error', 'One or more category required to be selected before delete');
	}
}