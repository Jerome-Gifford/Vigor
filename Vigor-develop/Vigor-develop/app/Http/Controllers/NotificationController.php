<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Illuminate\Http\Request;

class NotificationController extends Controller {

	public function sendNotification()
	{
		$userId = Auth::user()->id;
		$recipientUser = User::find($recipientUserId);

		$notification = new Notification;
		$notification->from_user_id = $userId;
		$notification->user_id = $recipientUserId;
		$notification->subject = ($notifSubject, null);
		$notification->type = $notifType;
		$notification->body = ($notifBody, null);
		$notification->is_read = 0;
		$notification->sent_at = time();
		$notification->save();
	}

}
