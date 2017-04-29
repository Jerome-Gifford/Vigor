<?php


use Illuminate\Database\Seeder;
use App\Models\UserFood as UserFood; //uses eloquent model

class UserFoodSeeder extends Seeder {

	/**
	 * Runs the seeder.
	 */
	public function run()
	{
		DB::table('user_foods')->delete();

		$this->createUserFoods();
	}

	/**
	 * Creates the user foods.
	 */
	protected function createUserFoods()
	{
		$userFoods = [
			[
				'user_id' => 1,
				'meal_time' => '4',
				'food_type' => 'Vegetables',
				'food_name' => 'Foodin',
				'food_calories' => 545,
				'food_fat' => 44,
				'food_carbs' => 36,
				'food_protein' => 8,
				'food_serving' => 35,
				'date' => time()
			]
		];

		UserFood::insert($userFoods);
	}
}