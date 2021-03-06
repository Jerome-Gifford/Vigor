<?php


use Illuminate\Database\Seeder;
use App\Models\Food as Food; // uses eloquent model

class FoodSeeder extends Seeder {

	/**
	 * Run the seeder.
	 */
	public function run()
	{
		DB::table('foods')->delete();

		$this->createFoods();
	}

	/**
	 * Create foods to seed the database.
	 */
	protected function createFoods()
	{
		DB::table('foods')->delete();
 
		$foodJson = File::get(storage_path() . "/jsondata/food.json");
		$food = json_decode($foodJson);
		foreach ($food as $object) {
			Food::create(array(
				'name' => $object->name,
				'foodtype' => $object->foodtype,
				'calories' => $object->calories,
				'fat' => $object->fat,
				'carbs' => $object->carbs,
				'protein' => $object->protein,
				'serving_size' => $object->serving_size
			));
		}
	}
}