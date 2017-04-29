<?php

use Carbon\Carbon;

class BannerTabs extends Eloquent {

	protected $table='users';
	
	/**
	 * Calculate total workouts.
	 *
	 * @return totalWorkouts
	 */
	public static function totalWorkouts()
	{
		$userId = Auth::user()->id;
		if (DB::table('user_activities')->where('user_id', '=', $userId)->count() > 0)
		{
			$total = DB::table('user_activities')->where('user_id', '=', $userId)->count();
		
			return $total;
		}
		else
		{
			return 0;
		}
	}

	/**
	 * Get currentWeight
	 *
	 * @return currentWeight
	 */
	public static function currentWeight()
	{
		$userId = Auth::user()->id;

		if (!is_null(User::where('current_weight')))
		{
			$currWeight = BannerTabs::where('id', '=', $userId)->pluck('current_weight');
		
			return $currWeight;
		}
		else
		{
			$message = "None";
			return $message;
		}
		
	}

	/**
	 * Get goalWeight
	 *
	 * @return goalWeight
	 */
	public static function goalWeight()
	{
		$userId = Auth::user()->id;

		if (!is_null(User::where('goal_weight')))
		{
			$goalWeight = BannerTabs::where('id', '=', $userId)->pluck('goal_weight');
		
			return $goalWeight;
		}
		else
		{
			$message = "None";
			return $message;
		}
	}

	/**
	 * Get lastWorkout
	 *
	 * @return lastWorkout
	 */

	
	public static function lastWorkout()
	{ 

		$userId = Auth::user()->id;
		if (DB::table('user_activities')->where('user_id', '=', $userId)->count() > 0)
		{
			$user = User::with(['activities' => function($query)
				{
					$query->orderBy('date', 'desc')->first();
					
				}])->find(Auth::user()->id);

				return Carbon::createFromTimeStamp(strtotime($user->activities[0]->date))->diffForHumans();
		}
		else
		{
			$message = "Add Workout";
			return $message;
		}
	
	}
	

	/**
	 * Get caloriesBurned
	 *
	 * @return cals_burned
	 */
	public static function caloriesBurned()
	{ 
		$today = Carbon::today();
		$cals_burned =0;
		$user = User::with(['activities' => function($query) use ($today)
		{
			$query->where('date', '=', $today);
		}, 'activities.activity'])->find(Auth::user()->id);

		foreach ($user['activities'] as $activity)
		{
			// hours per day, is not this actual the date of the activity?
			$date = $activity->date;

			$weightAsKilos = $user['current_weight'] / 2.2;
			$product = $weightAsKilos * $activity['activity']['MET'];
			$cals_burned = $product * ($activity['length'] / 60);
			$chartCaloriesBurned[] = floor($cals_burned);

			$activity->cals_burned = $cals_burned;
		}

		return floor($cals_burned);
	} 


	/**
	 * Get caloriesIngested
	 *
	 * @return sumOfAllCals
	 */
	public static function caloriesIngested()
	{
		$userId = Auth::user()->id;

		$dateStrToTime = Carbon::today();

		if (UserFood::where('user_id', '=', $userId)->where('date', '=', $dateStrToTime)->pluck('food_calories'))
		{
			$allCalsIngested = UserFood::where('user_id', '=', $userId)->where('date', '=', $dateStrToTime)->pluck('food_calories');
			$sumOfAllCals = array_sum($allCalsIngested);
		}
		else
		{
			$sumOfAllCals = 0;
		}
			
		return $sumOfAllCals;
	}
	

	
}


