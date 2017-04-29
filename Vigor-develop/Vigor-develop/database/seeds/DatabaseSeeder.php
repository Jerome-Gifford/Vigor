<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		
		$this->call('UserTableSeeder');
		$this->call('ActivitySeeder');
		$this->call('BannedUserSeeder');
		$this->call('FoodSeeder');
		$this->call('UserActivitySeeder');
		$this->call('UserFoodSeeder');
		$this->call('BadgeSeeder');
		$this->call('UserPostSeeder');
		$this->call('UserBadgesSeeder');
		$this->call('NotificationSeeder');

		Model::reguard();
	}
}
