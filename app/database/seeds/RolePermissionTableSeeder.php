<?php
use VSA\Users\Model\Role;

class RolePermissionTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		DB::table('role_permissions')->delete();
		
		Role::create([
			'name' => 'Role-To-Role',
			'command' => 'RR',
			'active' => 1,
		]);
		
		Role::create([
			'name' => 'Top Down',
			'command' => 'TD',
			'active' => 1,
		]);
		
		Role::create([
			'name' => 'Any',
			'command' => 'A',
			'active' => 1,
		]);
		
		$this->command->info('Role Permission table seeded!');
	}
	
}
