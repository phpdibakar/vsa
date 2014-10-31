<?php
use VSA\Users\Model\Role;

class RoleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		DB::table('roles')->delete();
		
		Role::create([
			'name' => 'System Administrator',
			'active' => 1,
		]);
		
		Role::create([
			'name' => 'Site Administrator',
			'active' => 1,
		]);
		
		Role::create([
			'name' => 'Viewer',
			'active' => 1,
		]);
		
		$this->command->info('Role table seeded!');
	}
	
}
