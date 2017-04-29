<?php


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Faker;
use App\Models\UserActivity as UserActivity; //uses eloquent model
/*use Vendor\fzaninotto\faker\src\autoload;
use Database\seeds\FakerSeeder;
*/
class UserActivitySeeder extends Seeder {

	/**
	 * Run the seeder.
	 */
	public function run()
	{
		DB::table('user_activities')->delete();

		$this->createUserActivities();
	}

	/**
	 * Create the user activities.
	 */
	protected function createUserActivities()
	{

		$userActivities = 	[
								['user_id' => '1',
								'activity_id' => '13',
								'time' => '3:00pm',
								'length' => '45',
								'comment' => 'Bang Bang...'],
								['user_id' => '2',
								'activity_id' => '13',
								'time' => '3:00pm',
								'length' => '45',
								'comment' => 'Bang Bang...'],
								['user_id' => '3',
								'activity_id' => '9',
								'time' => '3:00pm',
								'length' => '45',
								'comment' => 'Bang Bang...'],
								['user_id' => '2',
								'activity_id' => '11',
								'time' => '3:00pm',
								'length' => '45',
								'comment' => 'Bang Bang...'],
								['user_id' => '4',
								'activity_id' => '4',
								'time' => '3:00pm',
								'length' => '45',
								'comment' => 'Bang Bang...']

							];


		UserActivity::insert($userActivities);
	}
}