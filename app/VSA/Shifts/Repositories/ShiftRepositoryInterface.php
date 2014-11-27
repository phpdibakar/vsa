<?php
namespace VSA\Shifts\Repositories;

use VSA\Shifts\Model\ShiftCategory;

interface ShiftRepositoryInterface{
	/**
	 * Returns list of categories matches with the id or full list.
	 *
	 * @param optional mixed id of the category
	 * @param int limit to limit the no of records for pagination 
	 * @return array.
	 * @throws ModelNotFoundException when the category is not found
	*/
	public function getCategories($ids = null, $limit = null);
	
	/**
	 * saves or updates the category
	 *
	 * @param ShiftCategory category
	 * @return ShiftCategory.
	 * @throws Exception
	*/
	public function saveCategory(ShiftCategory $category);
	
	/**
	 * deletes the category
	 *
	 * @param ShiftCategory category
	 * @return ShiftCategory.
	 * @throws Exception
	*/
	public function deleteCategory(ShiftCategory $category);
	
	/**
	 * Returns list of category colors matches with the id or full list.
	 *
	 * @param optional int id of the color
	 * @return array.
	 * @throws ModelNotFoundException when the category is not found
	*/
	public function getCategoryColors($id = null);
}