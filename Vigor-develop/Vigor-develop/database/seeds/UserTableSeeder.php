<?php


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User as User; //uses eloquent model
use Vendor\fzaninotto\faker\src\autoload;
use Database\seeds\FakerSeeder;

class UserTableSeeder extends Seeder 
{

	/**
	 * Run the seeder.
	 */
	public function run()
	{
		DB::table('users')->delete();

		$this->generateAdmin();

		$this->generateUsers();
	}

	/**
	 * Generate the app admin.
	 */
	protected function generateAdmin()
	{
		$admin = $this->createUser(
			'admin@fitness.com',
			'admin',
			'Fitness',
			'Admin',
			0,
			1,
			180,
			170,
			89,
			68,
			12,
			'default_user_image.jpg',
			9898916115,
			1
		);

		User::create($admin);
	}

	/**
	 * Generate random users.
	 */
	protected function generateUsers()
	{

		$numberOfUsers = 20;
		$minWeight = 150;
		$maxWeight = 200;
		$currentWeight = 150;
		$shaveWeight = ($currentWeight * 0.2);

		/*foreach (range(1, $numberOfUsers) as $index) {
		$factory('User', [

				'email' => function () use ($faker) {

					$email = $faker->email;
					return $email();
				},

				'password' => function () use ($faker) {

					$password = $faker->word;
					return $password;
				},

				'firstName' => function () use ($faker) {

					$firstName = $faker->firstName;
					return $firstName;
				},

				'lastName' => function () use ($faker) {

					$lastName = $faker->lastName;
					return $lastName;
				},

				'privilege' => function () use ($faker) {

					$privilege = 2;
					return $privilege;
				},

				'currentWeight' => function () use ($faker) {

					$currentWeight = $currentWeight;
					return $currentWeight;
				},

				'goalWeight' => function () use ($faker) {

					$goalWeight = $faker->numberBetween($minWeight - $shaveWeight, $maxWeight - $shaveWeight);
					return $goalWeight;
				}


				
			]);*/

			$user = $this->createUser(

				/*$this->User()*/


				'blah@gmail.com',
				'password12345',
				'bob',
				'Schlazz',
				2,
				2,
				180,
				170,
				89,
				68,
				12,
				'default_user_image.jpg',
				5555459595,
				2
			);

			User::create($user);
		
	}

	/**
	 * Generate a user array.
	 *
	 * @param $email
	 * @param $password
	 * @param $firstName
	 * @param $lastName
	 * @param $privilege
	 * @param $currentWeight
	 * @param $goalWeight
	 * @return array
	 */
	private function createUser($email, $password, $firstName, $lastName, $privilege, $measurementPref, $currentWeight, $goalWeight, $userAge, $userHeight, $userFatPercentage, $profileImage, $phoneNumber, $phoneCarrier)
	{
		$time = Carbon::createFromTimestamp(time());

		return [
			'email' => $email,
			'password' => $password,
			'first_name' => $firstName,
			'last_name' => $lastName,
			'privilege' => $privilege,
			'measurement_pref' => $measurementPref,
			'current_weight' => $currentWeight,
			'goal_weight' => $goalWeight,
			'user_age' => $userAge,
			'user_height' => $userHeight,
			'user_fat_percentage' => $userFatPercentage,
			'profile_image' => $profileImage,
			'phone_number' => $phoneNumber,
			'phone_carrier' => $phoneCarrier,
			'created_at' => $time,
			'updated_at' => $time
		];
	}
}