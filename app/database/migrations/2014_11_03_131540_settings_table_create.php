<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SettingsTableCreate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table){
			$table->increments('id');
			$table->integer('theme_id')->unsigned();
			$table->foreign('theme_id')->references('id')->on('themes');
			$table->string('site_name', 100);
			$table->string('admin_email', 100);
			$table->string('logo', 255);
			$table->timestamp('updated_on');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('settings');
	}

}
