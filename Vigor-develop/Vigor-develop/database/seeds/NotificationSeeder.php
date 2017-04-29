<?php


use Illuminate\Database\Seeder;
use App\Models\Notification as Notification; //uses eloquent model

class NotificationSeeder extends Seeder {

	/**
	 * Runs the seeder.
	 */
	public function run()
	{
		DB::table('notifications')->delete();

		$this->createNotification();
	}

	/**
	 * Creates the user badges.
	 */
	protected function createNotification()
	{
		$notification = [

			['user_id' => '2',
			'from_user_id' => '1',
			'subject' => 'FriendRequest',
			'type' => '1',
			'body' => 'null',
			'is_read' => '0',
			'sent_at' => 'null']
		];

		Notification::insert($notification);
	}
}