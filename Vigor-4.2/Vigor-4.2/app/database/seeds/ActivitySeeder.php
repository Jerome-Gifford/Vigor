<?php

class ActivitySeeder extends FakerSeeder {

	/**
	 * Run the seeder.
	 */
	public function run()
	{
		$this->createActivities();
	}

	/**
	 * Create activities.
	 */
	protected function createActivities()
	{
		$activities = [
			
			//stores met value for our workouts
				['activity_name' => 'Aerobics',
				'MET' => '6.83'],
				['activity_name' => 'Baseball',
				'MET' => '5.00'],
				['activity_name' => 'Basketball',
				'MET' => '8.00'],
				['activity_name' => 'Bicycling',
				'MET' => '8.00'],
				['activity_name' => 'Billiards',
				'MET' => '2.50'],
				['activity_name' => 'Boating',
				'MET' => '4.64'],
				['activity_name' => 'Bowling',
				'MET' => '3.00'],
				['activity_name' => 'Rock Climbing',
				'MET' => '9.50'],
				['activity_name' => 'Dancing',
				'MET' => '4.50'],
				['activity_name' => 'Equestrian',
				'MET' => '5.33'],
				['activity_name' => 'Fencing',
				'MET' => '6.00'],
				['activity_name' => 'Fishing',
				'MET' => '4.50'],
				['activity_name' => 'Football',
				'MET' => '8.00'],
				['activity_name' => 'Golfing',
				'MET' => '3.75'],
				['activity_name' => 'Gymnastics',
				'MET' => '4.00'],
				['activity_name' => 'Hiking',
				'MET' => '6.00'],
				['activity_name' => 'Hockey',
				'MET' => '8.00'],
				['activity_name' => 'Hunting',
				'MET' => '4.50'],
				['activity_name' => 'Martial Arts',
				'MET' => '10.00'],
				['activity_name' => 'Racquet',
				'MET' => '8.50'],
				['activity_name' => 'Rodeo',
				'MET' => '6.00'],
				['activity_name' => 'Rollerblading',
				'MET' => '6.00'],
				['activity_name' => 'Rugby',
				'MET' => '10.00'],
				['activity_name' => 'Running',
				'MET' => '7.50'],
				['activity_name' => 'Skiing',
				'MET' => '7.00'],
				['activity_name' => 'Ice Skating',
				'MET' => '7.00'],
				['activity_name' => 'Snowboarding',
				'MET' => '7.00'],
				['activity_name' => 'Soccer',
				'MET' => '7.00'],
				['activity_name' => 'Softball',
				'MET' => '5.00'],
				['activity_name' => 'Cardio',
				'MET' => '8.00'],
				['activity_name' => 'Volleyball',
				'MET' => '5.50'],
				['activity_name' => 'Walking',
				'MET' => '3.80'],
				['activity_name' => 'Water Sports',
				'MET' => '5.22'],
				['activity_name' => 'Weightlifting',
				'MET' => '3.00'],
				['activity_name' => 'Wrestling',
				'MET' => '6.00'],
				['activity_name' => 'Yoga',
				'MET' => '3.00']
			
		];

		Activity::insert($activities);
	}
}