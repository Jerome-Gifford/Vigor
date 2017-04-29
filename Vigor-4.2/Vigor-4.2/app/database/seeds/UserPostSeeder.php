<?php

class UserPostSeeder extends FakerSeeder {

	/**
	 * Runs the seeder.
	 */
	public function run()
	{
		$this->createUserPosts();
	}

	/**
	 * Creates the user foods.
	 */
	protected function createUserPosts()
	{
		$userPosts = [
			[
				'username' => 'admin@fitness.com',
				'post_comment' => 'seeded user post, workout was great',
				'post_imgurl' => 'www.userimageseed.com',
				'post_videourl' => 'www.uservideoseed.com'
			]
		];

		UserPost::insert($userPosts);
	}
}