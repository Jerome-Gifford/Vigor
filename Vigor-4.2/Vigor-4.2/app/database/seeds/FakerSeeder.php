<?php

class FakerSeeder extends Seeder {

	/**
	 * @var \Faker\Generator
	 */
	protected $faker;

	/**
	 * Instantiate the faker factory.
	 */
	public function __construct()
	{
		$this->faker = Faker\Factory::create();
	}
}
