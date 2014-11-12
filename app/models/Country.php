<?php 
class Country extends Eloquent{
	protected $fillable = [];
	
	public function states(){
		return $this->hasMany('State');
	}
}