<?php

class ThemeTableSeeder extends Seeder{
	
	public function run(){
		\Eloquent::unguard();
		
		\DB::table('themes')->delete();
		
		\DB::table('themes')->insert([
			[
				'id' => 1,
				'name' => 'Standard',
				'style' => 'standard.css',
			],
			
			[
				'id' => 2,
				'name' => 'Blue',
				'style' => 'blue.css'
			],
		
		]);
		
		$this->command->info('Themes table seeding completed!');
	}
}