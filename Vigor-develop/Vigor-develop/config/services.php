<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'User',
		'secret' => '',
	],

	'facebook' 	=> [
		'client_id'		=> '1780190085538808',
		'client_secret'	=> '9e6abfeb57256ab1187045ba5d76bb35',
	],

	'google'	=> [
		'client_id' 	=> '234714889568-bjhj0rpefjtk0p41ro87eh6i0paepm4r.apps.googleusercontent.com',
		'client_secret'	=> 'FsIT_Gsatc9nVwYWlyytBCiZ',
	],

	'spotify'	=> [
		'client_id' 	=> 'b1de6606bd494b8f9b2d1fb49f43b5e1',
		'client_secret'	=> '7c345f65a40b4171ae08aa3fb3a754cd',
	],

	'soundcloud'	=> [
		'client_id' 	=> '',
		'client_secret'	=> '',
	]

];
