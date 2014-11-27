<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShiftCategoriesTableCreate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shift_categories', function(Blueprint $table){
			$table->increments('id');
			$table->string('name', 100);
			$table->integer('shift_category_color_id')->unsigned();
			$table->foreign('shift_category_color_id')->references('id')->on('shift_category_colors');
			$table->boolean('active')->default(true);
			$table->boolean('default')->default(false);
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
		Schema::dropIfExists('shift_categories');
	}

}
