<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Illuminate\Http\Request;

class UserFoodController extends Controller {

	/**
	 * Posting a users food submission to database
	 */
	public function newUserFood()
	{
		$userFood = new UserFood;
		$userFood->user_id = Auth::user()->id;
		$userFood->food_type = Input::get('food_type');
		$userFood->food_name = Input::get('food_name');
		$userFood->food_calories = Input::get('food_calories');
		$userFood->food_fat = Input::get('food_fat');
		$userFood->food_carbs = Input::get('food_carbs');
		$userFood->food_protein = Input::get('food_protein');
		$userFood->food_serving = Input::get('food_serving', 1);
		$userFood->date = time();
		$userFood->save();

		return Request::isJson() ? Response::json(['success' => true]) : Redirect::back()->withSuccess('true');
	}

}
