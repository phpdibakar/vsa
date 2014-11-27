<?php

class ShiftCategoryColorSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		$hexColors = [
			'Blue' => '#8CA5CA',
			'Sky' => '#CADAFF',
			'Teal' => '#95BDCE',
			'Violet' => '#B3AFDA',
			'Purple' => '#D4CAFF',
			'Pink' => '#DAAFC9',
			'Brick' => '#DAAFC9',
			'Green 1' => '#E3CFAE',
			'Green 2' => '#E2E3AD',
			'Green 3' => '#CBD79D',
			'Green 4' => '#FDFFCA',
		];
		
		DB::table('shift_category_colors')->delete();
		$counter = 0;
		foreach($hexColors as $color => $code){
			DB::table('shift_category_colors')->insert([
				'name' => $color,
				'color_code' => $code,
				'order' => $counter,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
			]);
			
			$counter ++;
		}
		
		
		$this->command->info('Shift Category colors table seeded!');
	}
	
}
