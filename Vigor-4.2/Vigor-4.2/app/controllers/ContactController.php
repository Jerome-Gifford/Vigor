<?php

class ContactController extends BaseController
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('contact.index');
	}

	public function sendMail() /** sends mail based on contact */
	{
		$rules = [
			'name' => 'required|alpha',
			'email' => 'required|email', /** pulls all the fields */
			'message' => 'required'
		];
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails())
			return Redirect::back()->withInput()->withErrors($validator->messages()); /*validates the messgae */

		$data = [
			'name' => Input::get('name'),
			'email' => Input::get('email'), /** sends data */
			'msg' => Input::get('message')
		];

		// could also store contact details in a db if you wanted to.
		Mail::send('emails.contact.inquiry', $data, function($message) 
		{
			$message->to('badbear28@gmail.com', 'Dennis Martinez')->subject('Contact Inquiry'); /** mails */
		});

		return Redirect::back()->withSuccess(true);
	}
}