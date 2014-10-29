<?php

class GenderTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Eloquent::unguard();
		
		DB::table('genders')->delete();
		
		Gender::create([
			'name' => 'Male',
		]);
		
		Gender::create([
			'name' => 'Female',
		]);
		
		$this->command->info('Gender table seeded!');
	}
	
}
