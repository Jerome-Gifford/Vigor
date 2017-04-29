<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use League\OAuth2\Client\Provider\Google as GoogleProvider;
use League\OAuth2\Client\Provider\Facebook as FacebookProvider;
use League\OAuth2\Client\Provider\Instagram as InstagramProvider;
use Illuminate\Http\Request;

class SocialLoginController extends Controller {

	public function Googleplus()
	{
		$provider = new GoogleProvider([
			'clientId'      => '111665456569-mik08r0h2hq36osnjdoofghfchh6b2of.apps.googleusercontent.com',
			'clientSecret'  => '5C1kP6ohERMxh1tjSALtMfvd',
			'redirectUri'   => 'https://www.plyo.fit',
			'scopes'        => Input::get('google-plus-email');
			]);

		if (!isset($_GET['code'])) {

    	// If we don't have an authorization code then get one
			$authUrl = $provider->getAuthorizationUrl();
			$_SESSION['oauth2state'] = $provider->state;
			header('Location: '.$authUrl);
			exit;

		// Check given state against previously stored one to mitigate CSRF attack
		} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {

			unset($_SESSION['oauth2state']);
			exit('Invalid state');

		} else {

    	// Try to get an access token (using the authorization code grant)
			$token = $provider->getAccessToken('authorization_code', [
				'code' => $_GET['code']
				]);

    	// Optional: Now you have a token you can look up a users profile data
			try {

        // We got an access token, let's now get the user's details
				$userDetails = $provider->getUserDetails($token);

        // Use these details to create a new profile
				printf('Hello %s!', $userDetails->firstName);

			} catch (Exception $e) {

        // Failed to get user details
				exit('Your information failed, please try again.');
			}

    	// Use this to interact with an API on the users behalf
			echo $token->accessToken;

    	// Use this to get a new access token if the old one expires
			echo $token->refreshToken;

    	// Unix timestamp of when the token will expire, and need refreshing
			echo $token->expires;
		}
	}

}
