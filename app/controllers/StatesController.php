<?php
class StatesController extends BaseController{
	public function postStates(){
		$country_id = Input::get('country_id');
		if(!empty($country_id) && is_numeric($country_id)){
			$states = State::where('country_id', $country_id)->lists('name', 'id');
			return View::make('states.ajax_states', compact('states'));
		}else
			throw new Exception('Invalid parameters or required parameters missing!');
	}
}