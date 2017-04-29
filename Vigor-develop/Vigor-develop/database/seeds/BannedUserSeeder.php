<?php

use Illuminate\Database\Seeder;
use App\Models\BannedUser as BannedUser; //uses eloquent model

class BannedUserSeeder extends Seeder {

	/**
	 * Run the seeder.
	 */
	public function run()
	{
		DB::table('banned_users')->delete();

		$this->createBannedUsers();
	}

	/**
	 * Create bannedUsers.
	 */
	protected function createBannedUsers()
	{
		$bannedUsers = [
			
			['user_id' => '3',
			'banned_user_id' => '4']
		];

		BannedUser::insert($bannedUsers);
	}
}