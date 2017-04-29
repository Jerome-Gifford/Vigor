<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Auth;
use Redirect;
use App\Models\User as User;
use App\Models\Notification as Notification;
use Illuminate\Http\Request;
use Session;

class EditProfileController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = new User;
		$userAge = User::Age();
		$userHeight = User::Height();
		$userCurrentWeight = User::CurrentWeight();
		$userGoalWeight = User::GoalWeight();
		$userBMI = User::BMI();
		$userFatPercentage = User::FatPercentage();
		$recentNotifications = Notification::recentNotifications();
		$userFullName = User::FullName();
		$userMeasurementPref = User::MeasurementPref();
		$onlineFriends = User::countOnlineFriends();
		$friendRequests = Notification::friendRequests();
	    $unread_notifications = $user->notifications()->unread()->get();
	    $onlineFriends = User::onlineFriends();
	    $friends = $user->friends();

		return view('editprofile.index')
								->with('recentNotifications', $recentNotifications)
								->with('userAge', $userAge)
								->with('userHeight', $userHeight)
								->with('userCurrentWeight', $userCurrentWeight)
								->with('userGoalWeight', $userGoalWeight)
								->with('userBMI', $userBMI)
								->with('userFatPercentage', $userFatPercentage)
								->with('userFullName', $userFullName)
								->with('userMeasurementPref', $userMeasurementPref)
								->with('unread_notifications', $unread_notifications)
								->with('friendRequests', $friendRequests)
								->with('onlineFriendsCount', $onlineFriends)
								->with('friends', $friends)
								->with('recentNotifications', $recentNotifications);
	}


	/**
	 * Uploads a users profile image to our storage.
	 *
	 * app/storage/users/user/ID/profile/IMAGE_NAME.EXT
	 *
	 * @return string
	 */
	public function upload()
	{
		/*pulls user image and displays it*/
		$file = Input::file('image');
		$rules = [
					'image' => 'required|max:2048'
				];
		$messages = [
			'image.required' => 'Please input a image under 2 MB in size and submit.',
			'image.image' => 'Please Upload a vaild file format.'
		];
		 $validator = Validator::make(Input::all(), $rules, $messages);
		
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator->messages())->withInput();
		}

		$path = public_path() . '/userimg/' . Auth::user()->id;
		$fileName = str_random(32) . $file->getClientOriginalName();
		// this is where the upload happens.
		$file->move($path, $fileName);

		/*$pathForUserImg = 'storage/users/defrgtyh654eDFRGT%$#EWRFTGyhu7y^%$R#EW/user/' . Auth::user()->id . '/profile' . $fileName;
		$path_parts = pathinfo($pathForUserImg);
		$fileName = $path_parts['filename'];
		$fileName = \Hash::make($fileName);
		$fileName = $fileName . $path_parts['extension'];

		$file->move($path, $fileName);*/

		// add profile image to database.
		$user = User::find(Auth::User()->id);
		$user->profile_image = $fileName;
		$user->save();

		// everything was good! let's go back.
		//return 'Hey, image uploaded! Put in a redirect here!';
		return Redirect::back()->withSuccess(true);
	}

	public function editInfo()
	{
		$userId = Auth::user()->id;

		/*requires fields*/
		$rules = [
			'calorie_count' => 'numeric',
			'user_bmi' => 'numeric',
			'first_name' => 'alpha',
			'last_name' => 'alpha',
			'current_weight' => 'numeric',
			'goal_weight' => 'numeric',
			'user_height' => 'numeric',
			'user_age' => 'numeric',
			'user_fat_percentage' => 'numeric',
			'measurement_pref' => 'numeric'
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
			return Redirect::back()->withInput()->withErrors($validator->messages());

		/*inserts user data that the user imported*/
		$user = User::find(Auth::user()->id);
		$userMeasurementPref = User::where('id', '=', Auth::user()->id)->pluck('measurement_pref');

		if(!is_null(Input::get('calorie_count')) && Input::get('calorie_count') > 0)
			$user->calorie_count = Input::get('calorie_count');

		if(!is_null(Input::get('current_weight')) &&Input::get('current_weight') > 0)
			$user->current_weight = Input::get('current_weight');

		if(!is_null(Input::get('goal_weight')) && Input::get('goal_weight') > 0)
			$user->goal_weight = Input::get('goal_weight');

		if(!is_null(Input::get('height')) && Input::get('height') > 0)
			$user->user_height = Input::get('height');

		if(!is_null(Input::get('user_fat_percentage')) && Input::get('user_fat_percentage') > 0)
			$user->user_fat_percentage = Input::get('user_fat_percentage');

		if(!is_null(Input::get('age')) && Input::get('age') > 0)
			$user->user_age = Input::get('age');

		/*if(Input::get('measurement_pref') != $userMeasurementPref)
			$user->measurement_pref = Input::get('measurement_pref');*/

		$user->save();

		// another way to update a user but you want to be careful of mass insertion.
		//User::find(Auth::user()->id)->update(Input::all());

		Session::flash('success', true);

		return Redirect::back();
	}


}
