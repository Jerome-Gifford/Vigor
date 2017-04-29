<?php namespace App\Http\Controllers;

use App\Models\User as User;
use Auth;
use App\Models\Notification as Notification;

class HubController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userAge = User::Age();
		$userHeight = User::Height();
		$userCurrentWeight = User::CurrentWeight();
		$userGoalWeight = User::GoalWeight();
		$userBMI = User::BMI();
		$userFatPercentage = User::FatPercentage();
		$userFullName = User::FullName();
		$user = new User;
		$friends = $user->friends();
		$recentNotifications = Notification::recentNotifications();
		$onlineFriends = User::countOnlineFriends();
		$friendRequests = Notification::friendRequests();
	    $unread_notifications = $user->notifications()->unread()->get();
	    $onlineFriends = User::onlineFriends();

		return view('hub.index')
				->with('userAge', $userAge)
				->with('userHeight', $userHeight)
				->with('userCurrentWeight', $userCurrentWeight)
				->with('userGoalWeight', $userGoalWeight)
				->with('userBMI', $userBMI)
				->with('userFatPercentage', $userFatPercentage)
				->with('userFullName', $userFullName)
				->with('unread_notifications', $unread_notifications)
				->with('friendRequests', $friendRequests)
				->with('onlineFriendsCount', $onlineFriends)
				->with('friends', $friends)
				->with('recentNotifications', $recentNotifications);
	}
}
