<?php

class UserBadgesSeeder extends FakerSeeder {

	/**
	 * Runs the seeder.
	 */
	public function run()
	{
		$this->createUserBadges();
	}

	/**
	 * Creates the user badges.
	 */
	protected function createUserBadges()
	{
		$userBadges = [
			[
				'badge_id' => 1,
				'user_id' => 1
			]
		];

		UserBadges::insert($userBadges);
	}
}