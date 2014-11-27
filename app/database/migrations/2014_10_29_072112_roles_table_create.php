<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RolesTableCreate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//schema to build role permission types
		Schema::create('role_permissions', function(Blueprint $table){
			$table->increments('id');
			$table->string('name', 100)->unique();
			$table->char('command', 4);
			$table->tinyInteger('active')->default(true);
			$table->timestamps();
		});
		
		Schema::create('roles', function(BluePrint $table){
			$table->increments('id');
			$table->interger('role_permission_id')->unsigned();
			$table->foreign('role_permission_id')->references('id')->on('role_permissions');
			$table->string('name')->unique();
			$table->boolean('public_signup')->default(true);
			$table->smallInteger('disp_rank');
			$table->smallInteger('disp_order');
			$table->tinyInteger('active')->default(true);
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
		Schema::dropIfExists('roles');
		Schema::dropIfExists('role_permissions');
	}

}
