<?php

class EmergencyRelationTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		DB::table('emergency_relations')->delete();
		
		$relations = [
			'Husband',
			'Wife',
			'Mother',
			'Father',
			'Son',
			'Daughter',
			'Brother',
			'Sister',
			'Partner',
			'Friend',
			'Supervisor',
			'Other',
		];
		
		foreach($relations as $key => $value){
			EmergencyRelation::create([
				'name' => $value
			]);
		}
		
		$this->command->info('Emergency relation table seeded!');
	}
	
}
