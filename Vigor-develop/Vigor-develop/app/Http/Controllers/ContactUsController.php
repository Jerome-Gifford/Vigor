<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User as User;
use Illuminate\Http\Request;
use App\Models\Notification as Notification;

class ContactUsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = new User;
		$recentNotifications = Notification::recentNotifications();
		$onlineFriends = User::countOnlineFriends();
		$friendRequests = Notification::friendRequests();
	    $unread_notifications = $user->notifications()->unread()->get();
	    $onlineFriends = User::onlineFriends();
	    $friends = $user->friends();

		return view('contactus.index')
				->with('recentNotifications', $recentNotifications)
				->with('unread_notifications', $unread_notifications)
				->with('friendRequests', $friendRequests)
				->with('onlineFriendsCount', $onlineFriends)
				->with('friends', $friends)
				->with('recentNotifications', $recentNotifications);
	}
}
