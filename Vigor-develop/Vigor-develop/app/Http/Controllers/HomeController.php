<?php namespace App\Http\Controllers;

class HomeController extends Controller {

	/**
	 * Show the application homepage to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home.index');
	}
}
