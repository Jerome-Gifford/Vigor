<?php

class RegisterController extends BaseController {

	/**
	 * Displays the registration page.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		return View::make('auth.register.index');
	}

	/**
	 * Registers a user.
	 *
	 * @return $this|\Illuminate\Http\RedirectResponse
	 */
	public function register()
	{
		$rules = [
			'first_name' => 'required|alpha',
			'last_name' => 'required|alpha',
			'email' => 'required|email|unique:users|email',
			'password' => 'required|confirmed'
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
			return Redirect::back()->withInput()->withErrors($validator->messages());

		$user = new User;
		$user->first_name = Input::get('first_name');
		$user->last_name = Input::get('last_name');
		$user->email = Input::get('email');
		$user->password = Input::get('password');
		$user->save();

		// probably should email the user.

		Auth::login($user);

		return Redirect::route('profile.edit');
	}
}
