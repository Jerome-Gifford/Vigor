<?php

class ProfileImageController extends BaseController {

	/**
	 * Uploads a users profile image to our storage.
	 *
	 * app/storage/users/user/ID/profile/IMAGE_NAME.EXT
	 *
	 * @return string
	 */
	public function upload()
	{
		/*pulls user image and displays it*/
		$file = Input::file('image');
		$rules = ['image' => 'required|max:2048'];
		$messages = [
			'image.required' => 'Please input a image and submit.'
		];
		$validator = Validator::make(Input::all(), $rules, $messages);
		
		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator->messages())->withInput();
		}

		if (!$file->isValid())
			return 'This is where you should redirect on invalid file...';

		$fileName = $file->getClientOriginalName();
		$path = public_path() . '/users/user/' . Auth::user()->id . '/profile';

		// this is where the upload happens.
		$file->move($path, $fileName);

		// add profile image to database.
		$user = User::find(Auth::User()->id);
		$user->profile_image = $fileName;
		$user->save();

		// everything was good! let's go back.
		//return 'Hey, image uploaded! Put in a redirect here!';
		return Redirect::back()->withSuccess(true);
	}

}