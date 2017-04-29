<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\File as File;
use Illuminate\Http\Request;
use App\Models\User as User;
use Auth;
use Config;
use Response;
use Input;

class ImageController extends Controller {

	public function getProfileImage()
	{
		$imgName = User::where('id', '=', Auth::user()->id)->pluck('profile_image');
		$path = Config::get('assets.images') . Auth::user()->id . '/' . $imgName;
		$file = Response::make(
				Input::file($path),
				200
		);

		return $file;
	}

}
