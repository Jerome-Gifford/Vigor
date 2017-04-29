<?php

use Carbon\Carbon;

class UserTableSeeder extends FakerSeeder {

	/**
	 * Run the seeder.
	 */
	public function run()
	{
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
			115.7,
			110
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

		foreach (range(1, $numberOfUsers) as $index) {
			$currentWeight = $this->faker->numberBetween($minWeight, $maxWeight);
			$shaveWeight = ($currentWeight * 0.2);

			$user = $this->createUser(
				$this->faker->email,
				$this->faker->word,
				$this->faker->firstName,
				$this->faker->lastName,
				2,
				$currentWeight,
				$this->faker->numberBetween($minWeight - $shaveWeight, $maxWeight - $shaveWeight)
			);

			User::create($user);
		}
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
	private function createUser($email, $password, $firstName, $lastName, $privilege, $currentWeight, $goalWeight)
	{
		$time = Carbon::createFromTimestamp(time());

		return [
			'email' => $email,
			'password' => $password,
			'first_name' => $firstName,
			'last_name' => $lastName,
			'privilege' => $privilege,
			'current_weight' => $currentWeight,
			'goal_weight' => $goalWeight,
			'created_at' => $time,
			'updated_at' => $time
		];
	}
}