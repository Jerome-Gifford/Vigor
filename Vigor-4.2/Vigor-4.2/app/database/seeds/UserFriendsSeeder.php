<?php

class UserFriendsSeeder extends FakerSeeder {

	/**
	 * Runs the seeder.
	 */
	public function run()
	{
		$this->createUserFriends();
	}

	/**
	 * Creates the user badges.
	 */
	protected function createUserFriends()
	{
		$userFriends = [

		['user_id' => '1',
		'friend_user_id' => '3'],
		['user_id' => '1',
		'friend_user_id' => '2']
		
		];

		UserFriends::insert($userFriends);
	}
}