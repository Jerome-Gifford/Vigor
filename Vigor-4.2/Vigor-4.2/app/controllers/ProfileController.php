<?php

class ProfileController extends BaseController 
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('profile.index');
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
		//
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
	 * @return Response
	 */
	public function edit()
	{
		return View::make('profile.edit')->withUser(Auth::user());
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function update()
	{ 
		/*requires fields*/
		$rules = [
			'email' => 'required|email',
			'password' => 'required|alpha',
			'first_name' => 'required|alpha',
			'calorie_count' => 'required|numeric',
			'current_bmi' => 'required|numeric',
			'last_name' => 'required|alpha',
			'current_weight' => 'required|numeric',
			'goal_weight' => 'required|numeric'
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
			return Redirect::back()->withInput()->withErrors($validator->messages());

		/*rolls back*/
		$user = User::find(Auth::user()->id);
		$user->email = Input::get('email');
		$user->password = Input::get('password');
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->calorie_count = Input::get('calorie_count');
		$user->current_bmi = Input::get('current_bmi');
		$user->current_weight = Input::get('current_weight');
		$user->goal_weight = Input::get('goal_weight');
		$user->save();

		// another way to update a user but you want to be careful of mass insertion.
		//User::find(Auth::user()->id)->update(Input::all());

		Session::flash('success', true);

		return Redirect::back();
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