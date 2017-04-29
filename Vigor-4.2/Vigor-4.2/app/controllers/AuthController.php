<?php

use \Illuminate\Support\MessageBag;

class AuthController extends BaseController {

	/**
	 * Shows the login page.
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
	 */
	public function index()
	{
		if (Auth::check())
			return Redirect::route('day');

		return View::make('auth.login.index');
	}

	/**
	 * Attempts to log a user in. If successful redirect to profile. If failed send the user back to the login
	 * screen and display errors.
	 *
	 * @return $this|\Illuminate\Http\RedirectResponse
	 */
	public function login()
	{
		$rules = [
			'email' => 'required|email',
			'password' => 'required',
		];

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
		{
			return Request::isJson() ?
				Response::json($validator->messages()) :
				Redirect::back()->withInput()->withErrors($validator->messages());
		}

		if (!Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')]))
		{
			$errorMessages = new MessageBag();

			$errorMessages->add('invalid', 'Your username or password is incorrect.');

			return Request::isJson() ? Response::json($errorMessages) : Redirect::back()->withInput()->withErrors($errorMessages);
		}

		$user = Auth::user();
		$user->success = true;

		return Request::isJson() ? Response::json($user) : Redirect::route('day');
	}



	/**
	 * Logs a user out.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function logout()
	{
		Auth::logout();

		return Request::isJson() ? Response::json(['success' => true]) : Redirect::route('home');
	}
}
