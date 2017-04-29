<?php


use Illuminate\Database\Seeder;
use App\Models\UserPost as UserPost; // uses eloquent model

class UserPostSeeder extends Seeder {

	/**
	 * Runs the seeder.
	 */
	public function run()
	{
		DB::table('user_posts')->delete();

		$this->createUserPosts();
	}

	/**
	 * Creates the user foods.
	 */
	protected function createUserPosts()
	{
		$userPosts = [
			[
				'user_id' => '1',
				'post_body' => 'seeded user post, workout was great',
				'post_img_url' => 'www.userimageseed.com',
				'post_video_url' => 'www.uservideoseed.com'
			]
		];

		UserPost::insert($userPosts);
	}
}