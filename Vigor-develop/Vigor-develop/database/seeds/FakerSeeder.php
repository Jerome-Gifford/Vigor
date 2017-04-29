<?php


use Illuminate\Database\Seeder;
use Vendor\fzaninotto\faker\src\autoload;

class FakerSeeder extends Seeder {

	require_once '\vendor\fzaninotto\faker\src\autoload.php'; //load in the faker file for usage
	/**
	 * @var \Faker\Generator
	 */
	protected $faker;

	/**
	 * Instantiate the faker factory.
	 */
	public function __construct()
	{
		$faker = vendor\fzaninotto\faker\src\Faker\Factory::create();
	}
}
