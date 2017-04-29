<?php

class UserDayInfoSeeder extends FakerSeeder {

	/**
	 * Runs the seeder.
	 */
	public function run()
	{
		$this->createUserDayInfo();
	}

	/**
	 * Creates the user foods.
	 */
	protected function createUserDayInfo()
	{
		$userDayInfo = [
			[
				'hours_of_workouts' => '3',
				'cals_ingested' => '2100',
				'cals_burned' => '800'
			]
		];

		UserDayInfo::insert($userDayInfo);
	}
}