<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DefaultEmergencyContactNumbersTableCreate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('default_emergency_contact_numbers', function(Blueprint $table){
			$table->increments('id');
			$table->integer('user_profile_id')->unsigned();
			$table->foreign('user_profile_id')->references('id')->on('user_profiles');
			$table->string('number', 15);
			$table->string('type_name', 20);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('default_emergency_contact_numbers');
	}

}
