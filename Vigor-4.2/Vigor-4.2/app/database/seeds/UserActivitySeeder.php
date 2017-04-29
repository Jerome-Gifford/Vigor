<?php

use Carbon\Carbon;


class UserActivitySeeder extends FakerSeeder {

	/**
	 * Run the seeder.
	 */
	public function run()
	{
		$this->createUserActivities();
	}

	/**
	 * Create the user activities.
	 */
	protected function createUserActivities()
	{
		$userActivities = [];

		foreach (range(1, 20) as $key => $index)
		{
			$userActivities[] = [
				'user_id' => 1,
				'activity_id' => $this->faker->numberBetween(1, 8),
				'length' => $this->faker->numberBetween(0, 60),
				'time' => time(),
				'date' => $this->faker->dateTimeBetween($startDate = '-2 weeks', $endDate = 'now'),
				'comment' => 'Getting Fit, Everyone should try Vigor!'
			];
		}

		UserActivity::insert($userActivities);
	}
}