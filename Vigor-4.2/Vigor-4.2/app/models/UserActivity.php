<?php

class UserActivity extends Eloquent {

	protected $table = 'user_activities';

	public function activity()
	{
		return $this->hasOne('Activity', 'id', 'activity_id');
	}
}