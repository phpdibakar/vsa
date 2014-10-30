<?php
class EmergencyRelation extends Eloquent{
	/**
	 * The timestamps fields used default by the model.
	 *
	 * @var string
	 */
	public $timestamps = false;
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'emergency_relations'; 
}