<?php 
class State extends Eloquent{
	protected $fillable = [];
	
	public function country(){
		return $this->belongsTo('Country');
	}
}