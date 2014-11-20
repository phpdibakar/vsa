<?php

class SettingTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		DB::table('settings')->delete();
		
		DB::table('settings')->insert([
			'theme_id' => 1,
			'name' => 'Volunteer Scheduling Service',
			'tagline' => 'The Site offers a simple way to view schedules and sign-up for events Getting Started',
			'admin_email' => 'alex.jordon111@gmail.com',
			'logo' => 'logo.png',
			'updated_on' => date('Y-m-d H:i:s'),
		]);
		
		$this->command->info('Setting table seeded!');
	}
	
}
