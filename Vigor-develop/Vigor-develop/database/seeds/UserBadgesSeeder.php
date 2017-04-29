<?php


use Illuminate\Database\Seeder;
use App\Models\UserBadge as UserBadge; //uses eloquent model

class UserBadgesSeeder extends Seeder {

	/**
	 * Runs the seeder.
	 */
	public function run()
	{
		DB::table('user_badges')->delete();

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

		UserBadge::insert($userBadges);
	}
}