<?php

class UserFoodsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//userfood route
		$userFood = new UserFood;
		$userFood->user_id = Input::get('user_id', Auth::user()->id);
		$userFood->food_type = Input::get('food_type');
		$userFood->food_name = Input::get('food_name');
		$userFood->food_calories = Input::get('food_calories');
		$userFood->food_fat = Input::get('food_fat');
		$userFood->food_carbs = Input::get('food_carbs');
		$userFood->food_protein = Input::get('food_protein');
		$userFood->food_serving = Input::get('food_serving', 0);
		$userFood->meal_time = 0;
		$userFood->date = time();
		$userFood->save();

		return Request::isJson() ? Response::json(['success' => true]) : Redirect::back()->withSuccess('true');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
