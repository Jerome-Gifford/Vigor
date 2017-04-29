<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User as User;
use Illuminate\Http\Request;
use App\Models\UserFriend as UserFriend;
use App\Models\Notification as Notification;
use Redirect;
use Input;

class MyFriendsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userId = Auth::user()->id;
		$user = new User;
		$recentNotifications = Notification::recentNotifications();
		$onlineFriends = User::countOnlineFriends();
		$friendRequests = Notification::friendRequests();
		$friends = $user->friends();
	    $unread_notifications = $user->notifications()->unread()->get();
	    $onlineFriends = User::onlineFriends();

		return view('myfriends.index')->with('unread_notifications', $unread_notifications)
									->with('friendRequests', $friendRequests)
									->with('onlineFriendsCount', $onlineFriends)
									->with('friends', $friends)
									->with('recentNotifications', $recentNotifications);
	}

	public function sendFriendRequest()
	{
		$recipientIdFromName = User::where('first_name', '=', Input::get('recipientFullName'))->pluck('id');
		$sentReqs = Notification::where('from_user_id', '=', Auth::user()->id)->where('user_id', '=', $recipientIdFromName)->count();
		$userAlreadySentRequest = true;
		$userIsntFriend = false;
		$isFriendrows = UserFriend::where('user_id', '=', Auth::user()->id)->where('friend_user_id', '=', $recipientIdFromName)->count();
		$userIsntSelf = false;

		if($sentReqs > 1)
		{
			$userAlreadySentRequest = true;
			return Redirect::back()->with('message', 'You have already sent a friend request to that user!');
		}
		
		if($sentReqs == 0)
			$userAlreadySentRequest = false;

		if($isFriendrows > 0)
		{
			return Redirect::back()->with('message', 'You are already friends with that person!');
		}

		if($isFriendrows == 0)
			$userIsntFriend = true;

		if($recipientIdFromName != Auth::user()->id)
			$userIsntSelf = true;

		if(!$userAlreadySentRequest && $userIsntFriend /*&& $userIsntSelf*/)
		{
			$notification = new Notification;
			$notification->from_user_id = Auth::user()->id;
			$notification->user_id  = $recipientIdFromName;
			$notification->subject = null;
			$notification->type = 1;
			$notification->body = null;
			$notification->is_read = 0;
			$notification->save();
		}
		return Redirect::back();
	}

	public function declineFriendRequest()
	{
		$FriendRequest = Notification::where('from_user_id', '=', Input::get('from_user_id'))->where('user_id', '=', Input::get('user_id'))->where('type', '=', 1);
		$FriendRequest->delete();
		return Redirect::back();
	}

	public function acceptFriendRequest()
	{
		$FriendRequest = Notification::where('from_user_id', '=', Input::get('from_user_id'))->where('user_id', '=', Input::get('user_id'))->where('type', '=', 1);
		
		$userFriend = new UserFriend;
		$userFriend->user_id = Input::get('user_id');
		$userFriend->friend_user_id = Input::get('from_user_id');
		$userFriend->save();

		$userFriend2 = new UserFriend;
		$userFriend2->user_id = Input::get('from_user_id');
		$userFriend2->friend_user_id = Input::get('user_id');
		$userFriend2->save();

		$first_name = User::where('id', '=', Input::get('from_user_id'))->pluck('first_name');
		$last_name = User::where('id', '=', Input::get('from_user_id'))->pluck('last_name');
		$fromuserFullName = $first_name . ' ' . $last_name;

		$FriendRequest->delete();
		return Redirect::back()->with('message', 'You and ' . $fromuserFullName . ' are now friends on Plyo!');
	}

	public function removeFriend()
	{
		$friendId = Input::get('friendId');

		$userFriend = UserFriend::where('user_id', '=', Auth::user()->id)->where('friend_user_id', '=', $friendId);
		$userFriend->delete();

		$userFriend2 = UserFriend::where('user_id', '=', $friendId)->where('friend_user_id', '=', Auth::user()->id);
		$userFriend2->delete();

		$first_name = User::where('id', '=', $friendId)->pluck('first_name');
		$last_name = User::where('id', '=', $friendId)->pluck('last_name');
		$friendName = $first_name . ' ' . $last_name;

		return Redirect::back()->with('message', 'You and ' . $friendName . ' are no longer friends.');
	}
}
