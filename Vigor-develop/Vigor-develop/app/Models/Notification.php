<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\User as User;

class Notification extends Model {

    /**
     * *** TYPE KEY ****
     *  
     *      1 = friend request
     *      2 = recent notification (still being displayed)
     *      897 = recent notfication (has been viewed enough, stop displaying on feed, prepare for deletion from table)
     */

    protected $table = 'notifications';

    protected $fillable   = ['from_user_id','to_user_id', 'subject', 'type', 'body', 'object_id', 'object_type', 'sent_at'];

    public function getDates()
    {
        return ['created_at', 'updated_at', 'sent_at'];
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function withRecipientUserId($recipientUserId)
    {
        $this->user_id = $recipientUserId;

        return $this;
    }

    public function withSenderUserId($senderUserid)
    {
        $this->from_user_id = $senderUserid;

        return $this;
    }

    public function withSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    public function withBody($body)
    {
        $this->body = $body;

        return $this;
    }

    public function withType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function deliver()
    {
        $this->sent_at = new Carbon;
        $this->save();

        return $this;
    }

    public function scopeUnread($query)
    {
        return $query->where('user_id', '=', Auth::user()->id)->where('is_read', '=', 0);
    }

    public function newNotification()
    {
        $notification = new Notification;
        $notification->user()->associate($this);

        return $notification;
    }

    /**
     * Gets all rows in Notifications that are recent notifications (type = 2)
     */
    public static function recentNotifications()
    {
        $userId = Auth::user()->id;
        $recentNotifs = Notification::where('type', '=', 2)->where('user_id', '=', $userId)->where('is_read', '=', 0)->get();
        $recentNotifsIds = Notification::where('type', '=', 2)->where('user_id', '=', $userId)->where('is_read', '=', 0)->pluck('id');

        if(is_null($recentNotifsIds) || $recentNotifsIds->count() == 0)
            $recentNotifs = null;

        return $recentNotifs;
    }

    public static function friendRequests()
    {
        $friendRequest = Notification::where('user_id', '=', Auth::user()->id)->where('type', '=', 1)->get();
        foreach($friendRequest as $row)
        {
            $userfirstname = User::where('id', '=', $row->from_user_id)->pluck('first_name');
            $userlastname = User::where('id', '=', $row->from_user_id)->pluck('last_name');
            $userFullName = $userfirstname . ' ' . $userlastname;

            $row->profileImage = User::where('id', '=', $row->from_user_id)->pluck('profile_image');
            $row->body = $userFullName;
        }

        if(is_null($friendRequest))
            $friendRequest = null;
        
        return $friendRequest;
    }
}