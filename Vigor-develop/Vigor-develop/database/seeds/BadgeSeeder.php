<?php


use Illuminate\Database\Seeder;
use App\Models\Badge as  Badge; //uses eloquent model

class BadgeSeeder extends Seeder {

	/**
	 * Runs the seeder.
	 */
	public function run()
	{
		DB::table('badges')->delete();

		$this->createBadges();
	}

	/**
	 * Creates the user badges.
	 */
	protected function createBadges()
	{
		$badges = [
			//stores badges and how to unlock them
		['description' => 'Achieve your goal weight',
		'locked' => 'img/Goal Weight.png',
		'unlocked' => 'img/Goal Weight Unlocked.png',
		'name' => 'Goal Weight'],
		['description' => 'Log 5 sessions on 5 consecutive days',
		'locked' => 'img/Session Streak.png',
		'unlocked' => 'img/Session Streak Unlocked.png',
		'name' => 'Session Streak'],
		['description' => 'Log your first session',
		'locked' => 'img/Becoming Fit.png',
		'unlocked' => 'img/Becoming Fit Unlocked.png',
		'name' => 'Becoming Fit'],
		['description' => 'Log the same routine 20 times',
		'locked' => 'img/My Routine.png',
		'unlocked' => 'img/My Routine Unlocked.png',
		'name' => 'My Routine'],
		['description' => 'Log a session after missing at least one week of workouts',
		'locked' => 'img/Back in Action.png',
		'unlocked' => 'img/Back in Action Unlocked.png',
		'name' => 'Back in Action'],
		['description' => 'Log at least 1 workout for 7 consecutive days',
		'locked' => 'img/Dedication.png',
		'unlocked' => 'img/Dedication Unlocked.png',
		'name' => 'Dedication'],
		['description' => 'Record weight loss 5 times',
		'locked' => 'img/Results.png',
		'unlocked' => 'img/Goal Weight Unlocked.png',
		'name' => 'Results'],
		['description' => 'Workout for 5 hours a week for 2 weeks',
		'locked' => 'img/Consistent.png',
		'unlocked' => 'img/Consistent Unlocked.png',
		'name' => 'Consistent'],
		['description' => 'Log 10 different kinds of workouts',
		'locked' => 'img/Changing It Up.png',
		'unlocked' => 'img/Changing It Up Unlocked.png',
		'name' => 'Changing It Up'],
		['description' => 'Beat your longest run (After recording 30 sessions)',
		'locked' => 'img/Longest Workout.png',
		'unlocked' => 'img/Longest Workout Unlocked.png',
		'name' => 'Farther'],
		['description' => 'Record 200 hours of workouts',
		'locked' => 'img/200 Hours.png',
		'unlocked' => 'img/200 Hours Unlocked.png',
		'name' => '200 Hours'],
		['description' => 'Record 1000 hours of workouts',
		'locked' => 'img/1000 Hours.png',
		'unlocked' => 'img/1000 Hours Unlocked.png',
		'name' => '1000 Hours'],
		//start of nutrition badges ***********************************************
		['description' => 'Stay under your max calorie intake for 14 days',
		'locked' => 'img/Maintain Diet.png',
		'unlocked' => 'img/Maintain Diet Unlocked.png',
		'name' => 'Maintain Diet'],
		['description' => 'Record a drop in your calorie intake 5 times',
		'locked' => 'img/Eat Less.png',
		'unlocked' => 'img/Eat Less Unlocked.png',
		'name' => 'Eat Less'],
		['description' => 'Eat an assortment of foods',
		'locked' => 'img/Balance.png',
		'unlocked' => 'img/Balance Unlocked.png',
		'name' => 'Balance'],
		['description' => 'Take in less than 75g of fat a day',
		'locked' => 'img/Less Fat.png',
		'unlocked' => 'img/Less Fat Unlocked.png',
		'name' => 'Less Fat'],
		['description' => 'Have A BMI in the 18.5-24.9 range',
		'locked' => 'img/Good BMI.png',
		'unlocked' => 'img/Good BMI Unlocked.png',
		'name' => 'Good BMI'],
		['description' => 'Eat 5 or more servings of fruits and vegetables in a day',
		'locked' => 'img/Fruits & Veggies.png',
		'unlocked' => 'img/Fruits & Veggies Unlocked.png',
		'name' => 'Fruits and Veggies'],
		['description' => 'Eat a new kind of meal once a week for 10 weeks',
		'locked' => 'img/Variety.png',
		'unlocked' => 'img/Variety Unlocked.png',
		'name' => 'Variety'],
		['description' => 'Eat a meal with no meat (At least 5 times)',
		'locked' => 'img/Meatless.png',
		'unlocked' => 'img/Meatless Unlocked.png',
		'name' => 'Meatless'],
		['description' => 'Eat 2000 or less calories each day for a whole week',
		'locked' => 'img/The Daily Goal.png',
		'unlocked' => 'img/The Daily Goal Unlocked.png',
		'name' => 'The Daily Goal'],
		['description' => 'Eat no processed foods for the whole day',
		'locked' => 'img/Eating Healthy.png',
		'unlocked' => 'img/Eating Healthy Unlocked.png',
		'name' => 'Eating Healthy'],
		['description' => 'Eat a balance equal to the food pyramid for a whole week',
		'locked' => 'img/Pyramid Master.png',
		'unlocked' => 'img/Pyramid Master Unlocked.png',
		'name' => 'Pyramid Master'],
		['description' => 'Eat three different types of fish',
		'locked' => 'img/Fishy.png',
		'unlocked' => 'img/Fishy Unlocked.png',
		'name' => 'Fishy']
	
		];

		Badge::insert($badges);
	}
}