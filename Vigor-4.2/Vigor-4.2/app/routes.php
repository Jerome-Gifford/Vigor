<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Put me in a controller!
 */
Route::get('foods', function() {
	return Response::Json(Food::all());
});

Route::get('activities', function() {
	return Response::Json(Activity::all());
});

Route::get('usernames', function() {
	return Response::Json(User::get(array('first_name', 'last_name')));
});

/**
 * Homepage
 */
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

/**
 * Contact
 */
Route::get('contact', ['as' => 'contact', 'uses' => 'ContactController@index']);

Route::post('contact', ['as' => 'contact', 'uses' => 'ContactController@sendMail']);
/**
 * Progress
 */
Route::get('progress', ['as' => 'progress', 'uses' => 'ProgressController@index']);
/**
 * Leaderboard
 */
Route::get('leaderboard', ['as' => 'leaderboard', 'uses' => 'LeaderboardController@index']);
/**
 * TestArea
 */
Route::get('testarea', ['as' => 'testarea', 'uses' => 'TestAreaController@index']);
/**
 * Error
 */
Route::get('error', ['as' => 'error', 'uses' => 'ErrorController@index']);
/**
 * Error
 */
Route::get('friends', ['as' => 'friends', 'uses' => 'FriendsController@index']);
/**
 * Badges
 */
Route::get('badges', ['as' => 'badges', 'uses' => 'BadgesController@index']);

/**
 * Authentication group.
 *
 * This handles all the routes that deal with authentication.
 */
Route::group(['prefix' => 'auth'], function()
{
	Route::get('login', ['as' => 'login', 'uses' => 'AuthController@index']);
	Route::post('login', ['as' => 'login', 'uses' => 'AuthController@login']);

	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

	Route::get('register', ['as' => 'register', 'uses' => 'RegisterController@index']);
	Route::post('register', ['as' => 'register', 'uses' => 'RegisterController@register']);

	// Auto-generated see http://laravel.com/docs/4.2/security#password-reminders-and-reset
	Route::get('remind', ['as' => 'remind', 'uses' => 'RemindersController@getRemind']);
	Route::post('remind', ['as' => 'remind', 'uses' => 'RemindersController@postRemind']);

	Route::get('reset', ['as' => 'reset', 'uses' => 'RemindersController@getReset']);
	Route::post('reset', ['as' => 'reset', 'uses' => 'RemindersController@postReset']);

	//Routes for the tabs on all pages
	Route::post('userfoods', ['as' => 'userfoods', 'uses' => 'UserFoodsController@store']);
	Route::post('useractivity', ['as' => 'useractivity', 'uses' => 'UserActivityController@store']);

	//Route for post info
	Route::post('userpost', ['as' => 'userpost', 'uses' => 'UserPostController@store']);

	//sending friend requests
	Route::post('sendFriendRequest', ['as' => 'sendFriendRequest', 'uses' => 'FriendsController@sendFriendRequest']);

	//accepting and declining friend requests
	Route::post('friendRequestAccept', ['as' => 'friendRequestAccept', 'uses' => 'FriendsController@acceptRequest']);
	Route::post('friendRequestDecline', ['as' => 'friendRequestDecline', 'uses' => 'FriendsController@declineRequest']);
});

/**
 * Dashboard Group.
 *
 * This handles everything that deals with the dashboard.
 */
Route::group(['prefix' => 'profile', 'before' => 'auth'], function()
{
	Route::get('/', ['as' => 'profile', 'uses' => 'ProfileController@index']);
	Route::get('edit', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::patch('update', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);

	Route::get('upload', function() {

		// user a controller.
		return View::make('profile.upload');
	});

	Route::post('upload', ['as' => 'profile.upload.file', 'uses' => 'ProfileImageController@upload']);
});

/**
 * Dashboard Group.
 *
 * This handles everything that deals with the dashboard.
 */
Route::group(['prefix' => 'hub', 'before' => 'auth'], function()
{
	Route::get('/', ['as' => 'hub', 'uses' => 'HubController@index']);
});

/**
 * Dashboard Group.
 *
 * This handles everything that deals with the dashboard.
 */
Route::group(['prefix' => 'day', 'before' => 'auth'], function()
{
	Route::get('/', ['as' => 'day', 'uses' => 'DayController@index']);
});

/**
 * Dashboard Group.
 *
 * This handles everything that deals with the dashboard.
 */
Route::group(['prefix' => 'progress', 'before' => 'auth'], function()
{
	Route::get('/', ['as' => 'progress', 'uses' => 'ProgressController@index']);
});

/**
 * Dashboard Group.
 *
 * This handles everything that deals with the dashboard.
 */
Route::group(['prefix' => 'schedule', 'before' => 'auth'], function()
{
	Route::get('/', ['as' => 'schedule', 'uses' => 'ScheduleController@index']);
});

/**
 * Dashboard Group.
 *
 * This handles everything that deals with the dashboard.
 */
Route::group(['prefix' => 'badges', 'before' => 'auth'], function()
{
	Route::get('/', ['as' => 'badges', 'uses' => 'BadgesController@index']);
});

/**
 * Dashboard Group.
 *
 * This handles everything that deals with the dashboard.
 */
Route::group(['prefix' => 'contact', 'before' => 'auth'], function()
{
	Route::get('/', ['as' => 'contact', 'uses' => 'ContactController@index']);
});



