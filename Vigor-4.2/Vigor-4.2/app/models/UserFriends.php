<?php

class UserFriends extends Eloquent {

	protected $table = 'user_friends';

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function friendsOfMine()
    {
      return $this->belongsToMany('User', 'friends', 'user_id', 'friend_user_id')
                ->wherePivot('accepted', '=', 1)
                ->withPivot('accepted'); 
    }

    public function friendOf()
    {
      return $this->belongsToMany('User', 'friends', 'friend_user_id', 'user_id')
                ->wherePivot('accepted', '=', 1)
                ->withPivot('accepted');
    }

    public function getFriendsAttribute()
    {
        if ( ! array_key_exists('friends', $this->relations)) $this->loadFriends();

        return $this->getRelation('friends');
    }

    protected function loadFriends()
    {
        if ( ! array_key_exists('friends', $this->relations))
        {
            $friends = $this->mergeFriends();

            $this->setRelation('friends', $friends);
        }
    }

    protected function mergeFriends()
    {
        return $this->friendsOfMine->merge($this->friendOf);
    }

    public function getAddFriend($id)
    {
        $user = User::find($id);
        Auth::user()->addFriend($user);
        return Redirect::back();
    }

    public function getRemoveFriend($id)
    {
        $user = User::find($id);
        Auth::user()->removeFriend($user);
        return Redirect::back();
    }

    public static function getSenderName()
    {
        $name = Notification::where('type', '=', 'FriendRequest')->where('is_read', '=', 0)->where('user_id', '=', Auth::user()->id)->pluck('subject');
       
        return $name;
    }
}