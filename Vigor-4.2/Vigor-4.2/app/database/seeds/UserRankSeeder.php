<?php

class UserRankSeeder extends FakerSeeder {

	/**
	 * Runs the seeder.
	 */
	public function run()
	{
		$this->createUserRank();
	}

	/**
	 * Creates the user badges.
	 */
	protected function createUserRank()
	{
		$userRank = [

		['user_id' => '1',
		'user_xp' => '39000']

		];

		UserRank::insert($userRank);
	}
}