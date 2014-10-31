<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserProfilesTableCreate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profiles', function(BluePrint $table){
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('state_id')->unsigned();
			$table->foreign('state_id')->references('id')->on('states');
			$table->longText('address');
			$table->string('zip', 10);
			$table->mediumInteger('home_phone');
			$table->mediumInteger('work_phone')->nullable();
			$table->mediumInteger('mobile')->nullable();
			$table->mediumInteger('pagers')->nullable();
			$table->string('emergency_contact_name', 50);
			$table->mediumInteger('emergency_phone_number');
			$table->integer('emergency_relation_id')->unsigned();
			$table->foreign('emergency_relation_id')->references('id')->on('emergency_relations');
			$table->string('occupation', 50);
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
		Schema::dropIfExists('user_profiles');
	}

}
