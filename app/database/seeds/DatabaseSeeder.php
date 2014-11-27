<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		$this->call('CountriesTableSeeder');
		$this->call('StatesTableSeeder');
		$this->call('GenderTableSeeder');
		$this->call('RolePermissionTableSeeder');
		$this->call('EmergencyRelationTableSeeder');
		$this->call('UserTableSeeder');
		
	}
	
}
