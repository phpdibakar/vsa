<?php
use VSA\Users\Model\Gender;
use VSA\Users\Model\Role;
use VSA\Users\Model\User;
use VSA\Users\Model\UserProfile;
use VSA\Users\Model\EmergencyRelation;

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		DB::table('users')->delete();
		
		$gender = Gender::where('name', 'Male')->first();
		$role = Role::where('name', 'System Administrator')->first();
		$emRel = EmergencyRelation::where('name', 'Father')->first(); 
		$state = DB::table('states')->where('code', 'AB')->first();
		
		$user = User::create([
			'role_id' => $role->id,
			'gender_id' => $gender->id,
			'email' => 'alex.jordon111@gmail.com',
			'password' => Hash::make('Admin2014'),
			'fname' => 'Alex',
			'lname' => 'Jordan',
			'active' => 1,
			'admin' => 1,
		]);
		
		UserProfile::create([
			'user_id' => $user->id,
			'state_id' => $state->id,
			'address' => 'Demo',
			'zip' => '123456',
			'home_phone' => '123456',
			'emergency_contact_name' => 'Test Name',
			'emergency_phone_number' => '123456',
			'emergency_relation_id' => $emRel->id,
			'occupation' => 'Test Job',
		]);
		
		$this->command->info('User table seeded!');
	}
	
}
