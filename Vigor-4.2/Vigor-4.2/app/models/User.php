<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use SammyK\LaravelFacebookSdk\FacebookableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface
{

	use UserTrait, RemindableTrait, FacebookableTrait;


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token', 'access_token');

	/**
	 * Hashes the users password before it's inserted into the database.
	 *
	 * @param $value
	 */
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}

	/**
	 * Gets a users gravatar.
	 *
	 * @return string
	 */
	public function getGravatarAttribute()
	{
		$hash = md5(strtolower(trim($this->attributes['email'])));

		return "http://www.gravatar.com/avatar/$hash/?default=mm";
	}

	public function activities()
	{
		return $this->hasMany('UserActivity', 'user_id');
	}

	public function badges()
	{
		return $this->hasMany('UserBadges', 'user_id');
	}

	public function friends()
	{
		return $this->belongsToMany('User', 'user_friends', 'user_id', 'friend_user_id');
	}

	public function addFriend(User $user)
    {
        $this->friends()->attach($user->id);
    }

    public function removeFriend(User $user)
    {
        $this->friends()->detach($user->id);
    }

    public function notifications()
	{
    	return $this->hasMany('Notification');
	}

	public function newNotification()
    {
        $notification = new Notification;
        $notification->user()->associate($this);

        return $notification;
    }
}
