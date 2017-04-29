<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Auth;
use App\Models\User as User;
use App\Models\Notification as Notification;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

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
	protected $hidden = array('password', 'remember_token', 'access_token', 'phone_number');

	protected $fillable = array('first-name', 'last-name');

	/**
	 * Hashes the users password before it's inserted into the database.
	 *
	 * @param $value
	 */
	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = \Hash::make($value);
	}

	/**
	 * Hashes the users phone number 
	 *
	 * @param $value
	 */
	public function setPhone_numberAttribute($value)
	{
		$this->attributes['phone_number'] = \Hash::make($value);
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
		return $this->hasMany('App\Models\UserActivity', 'user_id');
	}

	public function badges()
	{
		return $this->hasMany('App\Models\UserBadges', 'user_id');
	}

	public function friends()
	{
		$friendRows = UserFriend::where('user_id', '=', Auth::user()->id)->get();
		foreach($friendRows as $row)
		{
			$userfirstname = User::where('id', '=', $row->friend_user_id)->pluck('first_name');
            $userlastname = User::where('id', '=', $row->friend_user_id)->pluck('last_name');
            $friendFullname = $userfirstname . ' ' . $userlastname;

            $row->profileImage = User::where('id', '=', $row->friend_user_id)->pluck('profile_image');
            $row->id = $row->friend_user_id;
            $row->fullname = $friendFullname;
		}
		return $friendRows;
	}

    public function notifications()
	{
    	return $this->hasMany('App\Models\Notification');
	}

	public function conversations()
	{
		return $this->belongsToMany('App\Models\Conversation', 'conversations', 'user_id', 'user_id_2');
	}

	public function messages()
	{
		return $this->hasMany('App\Models\Message');
	}

    public static function Age()
	{
		$userId = Auth::user()->id;
		$returnVar = User::where('id', '=', $userId)->pluck('user_age');
		return $returnVar;
	}

	public static function Height()
	{
		$userId = Auth::user()->id;
		$returnVar = 0;

		//If measurement pref is imperial
		if(User::where('id', '=', $userId)->pluck('measurement_pref') == 1)
		{
			$userHeight = User::where('id', '=', $userId)->pluck('user_height') * 0.032808;
			$userHeight = round($userHeight, 1);
			$returnVar = $userHeight . ' ft';
		}

		//If measurement pref is metric
		if(User::where('id', '=', $userId)->pluck('measurement_pref') == 2)
		{
			$userHeight = User::where('id', '=', $userId)->pluck('user_height');
			$userHeight = round($userHeight, 0);
			$returnVar = $userHeight . ' cm';
		}
		
		return $returnVar;
	}

	public static function CurrentWeight()
	{
		$userId = Auth::user()->id;
		$returnVar = 0;

		//If measurement pref is imperial
		if(User::where('id', '=', $userId)->pluck('measurement_pref') == 1)
		{
			$userWeight = User::where('id', '=', $userId)->pluck('current_weight') * 2.2046;
			$userWeight = round($userWeight, 1);
			$returnVar = $userWeight . ' lbs';
		}

		//If measurement pref is metric
		if(User::where('id', '=', $userId)->pluck('measurement_pref') == 2)
		{
			$userWeight = User::where('id', '=', $userId)->pluck('current_weight');
			$userWeight = round($userWeight, 1);
			$returnVar = $userWeight . ' kg';
		}

		return $returnVar;
	}

	public static function GoalWeight()
	{
		$userId = Auth::user()->id;
		$returnVar = 0;

		//If measurement pref is imperial
		if(User::where('id', '=', $userId)->pluck('measurement_pref') == 1)
		{
			$userWeight = User::where('id', '=', $userId)->pluck('goal_weight') * 2.2046;
			$userWeight = round($userWeight, 1);
			$returnVar = $userWeight . ' lbs';
		}

		//If measurement pref is metric
		if(User::where('id', '=', $userId)->pluck('measurement_pref') == 2)
		{
			$userWeight = User::where('id', '=', $userId)->pluck('goal_weight');
			$userWeight = round($userWeight, 1);
			$returnVar = $userWeight . ' kg';
		}
		return $returnVar;
	}

	public static function BMI()
	{
		$userId = Auth::user()->id;
		$current_weight = User::where('id', '=', $userId)->pluck('current_weight');
		$heightInCentimeters = User::where('id', '=', $userId)->pluck('user_height');
		$heightInMeters = $heightInCentimeters * 0.01;
		$stage4 = 0;

		if($current_weight > 0 && $heightInMeters > 0)
		{
			$stage1 = $current_weight;

			$stage2 = $heightInMeters;

			$stage3 = $stage2 * $stage2;

			$stage4 = $stage1 / $stage3;

			$stage4 = round($stage4, 0);
		}
		return $stage4;
	}

	public static function FatPercentage()
	{
		$returnVar = 0;
		$userId = Auth::user()->id;
		$userFatPercentage = User::where('id', '=', $userId)->pluck('user_fat_percentage');
		$returnVar = round($userFatPercentage, 1);
		$returnVar = $userFatPercentage . '%';
		return $returnVar;
	}

	public static function FullName()
	{
		$userId = Auth::user()->id;
		$firstName = User::where('id', '=', $userId)->pluck('first_name');
		$lastName = User::where('id', '=', $userId)->pluck('last_name');

		$returnVar = $firstName . ' ' . $lastName;

		return $returnVar;
	}

	public static function MeasurementPref()
    {
    	$returnVar = 1;
        $userId = Auth::user()->id;
        $returnVar = User::where('id', '=', $userId)->pluck('measurement_pref');
        return $returnVar;
    }

    public static function onlineFriends()
    {
    	$friends = UserFriend::where('user_id', '=', Auth::user()->id)->pluck('friend_user_id');

    	$onlineFriendsCount = count($friends);

    	$onlineFriends = array();

    	for($counter = 0; $counter < $onlineFriendsCount; $counter++)
    	{
    		$onlineFriends[$counter] = User::find($friends[$counter]);
    	}

    	return $onlineFriends;
    }

    public static function countOnlineFriends()
    {
        $friends = UserFriend::where('user_id', '=', Auth::user()->id)->pluck('friend_user_id');
        if(is_null($friends))
        {
            return null;
        }

        $friendscount = count($friends);

        for($counter = 0; $counter < $friendscount; $counter++)
        {
        	$onlinefriendscount = 0;

        	if(Auth::check($friends[$counter]))
        	{
        		$onlinefriendscount++;
        	}
        }

		return $onlinefriendscount;
    }

    public function getMessagesFrom($userId)
    {
    	$returnArray = Message::where('from_user_id', '=', $userId)->where('to_user_id', '=', Auth::user()->id);
    	return $returnArray;
    }
}
