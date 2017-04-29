<?php

class NotificationSeeder extends FakerSeeder {

	/**
	 * Runs the seeder.
	 */
	public function run()
	{
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
			'body' => 'null',
			'is_read' => '0',
			'sent_at' => 'null']
		];

		Notification::insert($notification);
	}
}