<?php

class DatabaseSeeder extends FakerSeeder {



	/**
	 * The tables to seed.
	 *
	 * @var array
	 */
	protected $tables = [
		'users' => 'UserTableSeeder',
		'user_goals' => 'UserGoalsSeeder',
		'activities' => 'ActivitySeeder',
		'banned_users' => 'BannedUserSeeder',
		'foods' => 'FoodSeeder',
		'user_activities' => 'UserActivitySeeder',
		'user_foods' => 'UserFoodSeeder',
		'badges' => 'BadgeSeeder',
		'user_post' => 'UserPostSeeder',
		'user_badges' => 'UserBadgesSeeder',
		'user_day_info' => 'UserDayInfoSeeder',
		'user_friends' => 'UserFriendsSeeder',
		'user_rank' => 'UserRankSeeder',
		'notifications' => 'NotificationSeeder'
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		$this->cleanDatabase();

		Eloquent::reguard();
	}

	/**
	 * Cleans the database before seeding the database.
	 */
	protected function cleanDatabase()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

		foreach ($this->tables as $table => $seeder)
			$this->call($seeder);

		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
	
	
}
