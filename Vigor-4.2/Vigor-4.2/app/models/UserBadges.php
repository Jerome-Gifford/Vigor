<?php

class UserBadges extends Eloquent {

	protected $table = 'user_badges';

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function badge()
    {
        return $this->belongsTo('Badge', 'badge_id');
    }
	
}