<?php

class HomeController extends BaseController {

	/**
	 * Display the homepage item.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		return View::make('home/index');
	}
}
