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
			$table->integer('gender_id')->unsigned();
			$table->foreign('gender_id')->references('id')->on('genders');
			$table->string('email')->unique();
			$table->string('password', 255);
			$table->string('fname');
			$table->string('lname');
			$table->tinyInteger('active');
			$table->timestamps();
			$table->rememberToken();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
