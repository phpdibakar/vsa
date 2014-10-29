<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableUsersCreate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(BluePrint $table){
			$table->increments('id');
			$table->integer('role_id')->unsigned();
			$table->foreign('role_id')->references('id')->on('roles');
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
