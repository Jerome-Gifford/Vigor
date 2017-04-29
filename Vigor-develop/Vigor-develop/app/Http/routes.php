<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::post('/', ['as' => 'googleplussignup', 'uses' => 'SocialLoginController@Googleplus']);

Route::group(['middleware' => 'auth'], function()
{
	Route::get('hub', ['as' => 'hub', 'uses' => 'HubController@index']);
	Route::get('myprofile', ['as' => 'myprofile', 'uses' => 'MyProfileController@index']);
	Route::get('myfriends', ['as' => 'myfriends', 'uses' => 'MyFriendsController@index']);
	Route::get('challenges', ['as' => 'challenges', 'uses' => 'ChallengeController@index']);
	Route::get('mycalendar', ['as' => 'mycalendar', 'uses' => 'MyCalendarController@index']);
	Route::get('mybadges', ['as' => 'mybadges', 'uses' => 'MyBadgesController@index']);
	Route::get('contactus', ['as' => 'contactus', 'uses' => 'ContactUsController@index']);
	Route::get('editprofile', ['as' => 'editprofile', 'uses' => 'EditProfileController@index']);
	Route::get('messenger', ['as' => 'getmessages', 'uses' => 'MessengerController@getMessages']);

	/* POSTS */
	Route::post('myfriends', ['as' => 'sendFriendRequest', 'uses' => 'MyFriendsController@sendFriendRequest']);
	Route::post('acceptFriendRequest', ['as' => 'acceptFriendRequest', 'uses' => 'MyFriendsController@acceptFriendRequest']);
	Route::post('declineFriendRequest', ['as' => 'declineFriendRequest', 'uses' => 'MyFriendsController@declineFriendRequest']);
	Route::post('removeFriend', ['as' => 'removeFriend', 'uses' => 'MyFriendsController@removeFriend']);	
	Route::post('newUserFood', ['as' => 'newUserFood', 'uses' => 'UserFoodController@newUserFood']);
	Route::post('sendNotification', ['as' => 'sendNotification', 'uses' => 'NotificationController@sendNotification']);
	Route::post('editprofile', ['as' => 'profile.upload.file', 'uses' => 'EditProfileController@upload']);
	Route::post('editProfileInfo', ['as' => 'editProfileInfo', 'uses' => 'EditProfileController@editInfo']);
	Route::post('messenger', ['as' => 'postmessages', 'uses' => 'MessengerController@postMessages']);

});



