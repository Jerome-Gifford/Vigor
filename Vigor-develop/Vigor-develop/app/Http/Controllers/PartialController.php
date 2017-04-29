<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User as User;
use App\Models\Notification as Notification;
use Illuminate\Http\Request;

class PartialController extends Controller {

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

		return view('partials._feed')->with('unread_notifications', $unread_notifications)
											->with('friendRequests', $friendRequests)
											->with('onlineFriendsCount', $onlineFriends)
											->with('friends', $onlineFriends)
											->with('recentNotifications', $recentNotifications);
	}
}
