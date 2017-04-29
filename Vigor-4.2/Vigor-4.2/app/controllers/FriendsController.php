<?php

class FriendsController extends BaseController
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userId = Auth::user()->id;
		$user = new User;
		$not_friends = User::where('id', '!=', $userId);

	    if (Auth::user()->friends->count())
	    {
	      $not_friends->whereNotIn('id', Auth::user()->friends->modelKeys());
	    }

	    $not_friends = $not_friends->get();

	    $unread_notifications = $user->notifications()->unread()->get();
	    $unread_notifications_count = $user->notifications()->unread()->count();

	    $FriendRequestName = Notification::where('type', '=', 'FriendRequest')->where('is_read', '=', 0)->where('user_id', '=', Auth::user()->id)->pluck('subject');

		return View::make('friends.index')->with('not_friends', $not_friends)
											->with('unread_notifications', $unread_notifications)
											->with('unread_notifications_count', $unread_notifications_count)
											->with('FriendRequestName', $FriendRequestName);
	}

	public function sendFriendRequest()
	{
		$senderUserId = Auth::user()->id;
		$user = new User;
		$recipientName = Input::get('friend-search');
		$recipientUserId = User::where('first_name', '=', $recipientName)->pluck('id');

		$senderFirstName = User::where('id', '=', $senderUserId)->pluck('first_name');
		$senderLastName = User::where('id', '=', $senderUserId)->pluck('last_name');
		$senderName = $senderFirstName . " " . $senderLastName;
		$senderImgUrl = $this->getUserImgURL($senderUserId);
		$user->newNotification()
				->withSenderUserId($senderUserId)
				->withRecipientUserId($recipientUserId)
				->withType('FriendRequest')
				->withSubject($senderName)
				->withBody($senderImgUrl)
				->deliver();
	}

	public function acceptRequest()
	{

		$recipientUserId = Auth::user()->id;
		$senderUserId = Notification::where('user_id', '=', $recipientUserId)->pluck('from_user_id');

		$untouchedFriendRequest = Notification::firstOrNew([
			'from_user_id' => $senderUserId,
			'user_id' => $recipientUserId,
			'is_read' => 0
		]);
		$untouchedFriendRequest->is_read = 1;
		$untouchedFriendRequest->save(); 

		$userFriend = new UserFriends;
		$userFriend->user_id = $senderUserId;
		$userFriend->friend_user_id = $recipientUserId;
		$userFriend->save();

		$userFriend = new UserFriends;
		$userFriend->user_id = $recipientUserId;
		$userFriend->friend_user_id = $senderUserId;
		$userFriend->save();
	}

	public function declineRequest()
	{
		$recipientUserId = Auth::user()->id;
		$senderUserId = Notification::where('user_id', '=', $recipientUserId)->pluck('from_user_id');
		$unread = Notification::where('from_user_id', '=', $senderUserId)->where('user_id', '=', $recipientUserId)->where('is_read', '=', 0);
		$unread->is_read = 2;
	}

	

	public function getUserImgURL($userId)
	{
		$userId = Auth::user()->id;
		$user = new User;
		$ImgURL = $user->where('id', '=', $userId)->pluck('profile_image');

		return $ImgURL;
	}
}