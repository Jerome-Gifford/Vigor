<?php

use Carbon\Carbon;

class Badge extends Eloquent {

	/**
	 * Check if a badge is unlocked.
	 *
	 * @return Image Url
	 */

	//this page if full of all of the logic behind the badges and how they unlock. they all test for a required set of data and either return the locked or unlokced image of the badge
	public static function unlockedFlag($badgeid)
	{
		$userId = Auth::user()->id;

		if (DB::table('user_badges')->where('badge_id', '=', $badgeid)->where('user_id', '=', $userId)->get())
		{
			$img_url = Badge::where('id', '=', $badgeid)->pluck('unlocked');
		}
		else
		{
			$img_url = Badge::where('id', '=', $badgeid)->pluck('locked');
		}

		return $img_url;
	}

	public static function calsIngested($dateStrToTime)
	{
		$userId = Auth::user()->id;

		$allCalsIngested = UserFood::where('user_id', '=', $userId)->where('date', '=', $dateStrToTime)->pluck('food_calories');
		$sumOfAllCals = array_sum($allCalsIngested);

		return $sumOfAllCals;
	}


	//start of fitness badges checking

	public static function GoalWeightCheck()
	{
		$userId = Auth::user()->id;
		$userRow = User::find(Auth::user()->id);
		$duplicationCheck = DB::table('user_badges')->where('badge_id', '=', 1)->where('user_id', '=', $userId)->get();
		$currentWeight = $userRow['current_weight'];
		$goalWeight = $userRow['goal_weight'];

		if ($currentWeight == $goalWeight)
		{
			if (!$duplicationCheck)
			{
				$badge = new UserBadges;
				$badge->badge_id = 1;
 				$badge->user_id = $userId;
 				$badge->save();
			}
		}
	}

	public static function SessionStreakCheck()
	{
		$userId = Auth::user()->id;
		$userActivityRows = UserActivity::where('user_id', '=', $userId);
		$session1 = Carbon::createFromTimestamp(strtotime('5 days ago'));
		$session2 = Carbon::createFromTimestamp(strtotime('4 days ago'));
		$session3 = Carbon::createFromTimestamp(strtotime('3 days ago'));
		$session4 = Carbon::createFromTimestamp(strtotime('2 days ago'));
		$session5 = Carbon::createFromTimestamp(strtotime('yesterday'));
		$activitiesForSession1 = UserActivity::where('user_id', '=', $userId)->where('date', '=', $session1);
		$activitiesForSession2 = $userActivityRows->where('date', '=', $session2);
		$activitiesForSession3 = $userActivityRows->where('date', '=', $session3);
		$activitiesForSession4 = $userActivityRows->where('date', '=', $session4);
		$activitiesForSession5 = $userActivityRows->where('date', '=', $session5);

		if (!is_null($activitiesForSession1))
			if (!is_null($activitiesForSession2))
				if (!is_null($activitiesForSession3))
					if (!is_null($activitiesForSession4))
						if (!is_null($activitiesForSession5))
						{
							$badge = new UserBadges;
							$badge->badge_id = 2;
 							$badge->user_id = $userId;
 							$badge->save();
						}
	}

	public static function BecomingFitCheck()
	{
		$userId = Auth::user()->id;
		$getUserActivities = DB::table('user_activities')->where('user_id', '=', $userId)->where('activity_id', '<=', 36);

		if ($getUserActivities->exists())
		{
			$badge = new UserBadges;
			$badge->badge_id = 3;
 			$badge->user_id = $userId;
 			$badge->save();
		}
	}

	public static function MyRoutineCheck()
	{
		/*$userId = Auth::user()->id;
		$getUserActivities = DB::table('user_activities')->where('user_id', '=', $userId);

		for ($counter = 0; $counter <= 36; $counter++)
		{
			$allActivityId . $counter = $getUserActivities('activity_id')->where('activity_id', '=', 1);
			$activitySum . $counter = array_sum($allActivityId . $counter);
			
			if ($activitySum . $counter >= $counter * 20)
			{
				$badge = new UserBadges;
				$badge->badge_id = 4;
 				$badge->user_id = $userId;
 				$badge->save();
			}
		}*/
	}

	public static function BackInActionCheck()
	{
		$userId = Auth::user()->id;


		$lastSunday = Carbon::createFromTimestamp(strtotime('last sunday'));
		$nextSaturday = Carbon::createFromTimestamp(strtotime('next sunday'));

		$activitiesForPrevious7Days = User::with(['activities' => function($query) use ($lastSunday, $nextSaturday)
		{
			$query->where('date', '>=', $lastSunday)
				->where('date', '<', $nextSaturday);
		}, 'activities.activity'])->find(Auth::user()->id);


		if(is_null($activitiesForPrevious7Days))
		{
			$badge = new UserBadges;
			$badge->badge_id = 5;
 			$badge->user_id = $userId;
 			$badge->save();
		}
	}

	public static function DedicationCheck()
	{
		$userId = Auth::user()->id;

		$lastSunday = Carbon::createFromTimestamp(strtotime('last sunday'));
		$nextSaturday = Carbon::createFromTimestamp(strtotime('next sunday'));

		$activitiesForPrevious7Days = User::with(['activities' => function($query) use ($lastSunday, $nextSaturday)
		{
			$query->where('date', '>=', $lastSunday)
				->where('date', '<', $nextSaturday);
		}, 'activities.activity'])->find(Auth::user()->id);


		if (!is_null($activitiesForPrevious7Days))
		{
			$badge = new UserBadges;
			$badge->badge_id = 6;
 			$badge->user_id = $userId;
 			$badge->save();	
		}

	}

	public static function ResultsCheck()
	{
		$userId = Auth::user()->id;
		$currWeight = User::find($userId)->pluck('current_weight');

		if ($currWeight <= $currWeight)
			if ($currWeight <= $currWeight)
				if ($currWeight <= $currWeight)
					if ($currWeight <= $currWeight)
						if ($currWeight <= $currWeight)
						{
							$badge = new UserBadges;
							$badge->badge_id = 7;
 							$badge->user_id = $userId;
 							$badge->save();	
						}

	}

	public static function ConsistentCheck()
	{
		/*$now = Carbon::now();
		$userId = Auth::user()->id;

		//last week
		$lastSunday = Carbon::createFromTimestamp(strtotime('last sunday'));
		$nextSaturday = Carbon::createFromTimestamp(strtotime('next sunday'));

		$LengthFromLastWeek = User::with(['activities' => function($query) use ($lastSunday, $nextSaturday)
		{
			$query->where('date', '>=', $lastSunday)
				->where('date', '<', $nextSaturday);
		}, 'activities.activity'])->find(Auth::user()->id)->pluck('length');

		//two weeks ago
		$twoSundayAgo = Carbon::createFromTimestamp(strtotime('two sundays ago'));
		$twoSaturdayAgo = Carbon::createFromTimestamp(strtotime('last sunday'));

		$LengthFromTwoWeeksAgo = User::with(['activities' => function($query) use ($lastSunday, $nextSaturday)
		{
			$query->where('date', '>=', $lastSunday)
				->where('date', '<', $nextSaturday);
		}, 'activities.activity'])->find(Auth::user()->id)->pluck('length');


		$lastWeekLengthSum = array_sum($LengthFromLastWeek);
		$twoWeeksAgoLengthSum = array_sum($LengthFromTwoWeeksAgo);


		if ($lastWeekLengthSum >= 300)
		{
			if ($twoWeeksAgoLengthSum >= 300)
			{
				$badge = new UserBadges;
				$badge->badge_id = 8;
 				$badge->user_id = $userId;
 				$badge->save();
			}
		}*/
	}

	public static function ChangeCheck()
	{
		$userId = Auth::user()->id;
		$getUserActivities = DB::table('user_activities')->where('user_id', '=', $userId)->pluck('activity_id');

		if ($getUserActivities >= 10)
		{
			$badge = new UserBadges;
			$badge->badge_id = 9;
 			$badge->user_id = $userId;
 			$badge->save();
		}

	}

	public static function FartherCheck()
	{
		$userId = Auth::user()->id;
		$getUserActivities = DB::table('user_activities')->where('user_id', '=', $userId);
		$getRunLength = $getUserActivities->where('activity_id', '=', 24)->pluck('distance');
		arsort($getRunLength);
		$keys = array_keys($getRunLength);


		if (count($getUserActivities) >= 30)
		{
			if (max($getRunLength) > $keys[2])
			{
				$badge = new UserBadges;
				$badge->badge_id = 10;
 				$badge->user_id = $userId;
 				$badge->save();
			}
		}
	}

	public static function TwoHundredHoursCheck()
	{
		$userId = Auth::user()->id;
		$getUserActivitiesLength = DB::table('user_activities')->where('user_id', '=', $userId)->pluck('length');
		$sumOfLengths = array_sum($getUserActivitiesLength);

		if ($sumOfLengths >= 12000)
		{
			$badge = new UserBadges;
			$badge->badge_id = 11;
 			$badge->user_id = $userId;
 			$badge->save();
		}
	}

	public static function ThousandHoursCheck()
	{
		$userId = Auth::user()->id;
		$getUserActivitiesLength = DB::table('user_activities')->where('user_id', '=', $userId)->pluck('length');
		$sumOfLengths = array_sum($getUserActivitiesLength);

		if ($sumOfLengths >= 60000)
		{
			$badge = new UserBadges;
			$badge->badge_id = 12;
 			$badge->user_id = $userId;
 			$badge->save();
		}
	}

	//End of Fitness Badge Checks

	//Start of Nutrition Badge Checks

	public static function MaintainDietCheck()
	{
		$calsGoal = User::where('user_id', '=', $userId)->pluck('calorie_count');

		$daysago14 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('14 days ago')));
		$daysago13 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('13 days ago')));
		$daysago12 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('12 days ago')));
		$daysago11= $this->calsIngested(Carbon::createFromTimestamp(strtotime('11 days ago')));
		$daysago10 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('10 days ago')));
		$daysago9 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('9 days ago')));
		$daysago8 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('8 days ago')));
		$daysago7 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('7 days ago')));
		$daysago6 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('6 days ago')));
		$daysago5 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('5 days ago')));
		$daysago4 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('4 days ago')));
		$daysago3 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('3 days ago')));
		$daysago2 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('2 days ago')));
		$daysago1 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('yesterday')));



		if ($daysago1 <= $calsGoal)
			if ($daysago2 <= $calsGoal)
				if ($daysago3 <= $calsGoal)
					if ($daysago4 <= $calsGoal)
						if ($daysago5 <= $calsGoal)
							if ($daysago6 <= $calsGoal)
								if ($daysago7 <= $calsGoal)
									if ($daysago8 <= $calsGoal)
										if ($daysago9 <= $calsGoal)
											if ($daysago10 <= $calsGoal)
												if ($daysago11 <= $calsGoal)
													if ($daysago12 <= $calsGoal)
														if ($daysago13 <= $calsGoal)
															if ($daysago14 <= $calsGoal)
															{
																$badge = new UserBadges;
																$badge->badge_id = 13;
													 			$badge->user_id = $userId;
													 			$badge->save();
															}

	}

	public static function EatLessCheck()
	{
		$userId = Auth::user()->id;
		$userCalsIngested5 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('5 days ago')));
		$userCalsIngested4 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('4 days ago')));
		$userCalsIngested3 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('3 days ago')));
		$userCalsIngested2 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('2 days ago')));
		$userCalsIngested1 = $this->calsIngested(Carbon::createFromTimestamp(strtotime('yesterday')));


		if ($userCalsIngested <= $userCalsIngested1)
			if ($userCalsIngested1 <= $userCalsIngested2)
				if ($userCalsIngested2 <= $userCalsIngested3)
					if ($userCalsIngested3 <= $userCalsIngested4)
						if ($userCalsIngested4 <= $userCalsIngested5)
						{
							$badge = new UserBadges;
							$badge->badge_id = 14;
 							$badge->user_id = $userId;
 							$badge->save();	
						}
	}

	public static function BalanceCheck()
	{
		$foodNames = UserFoods::where('user_id', '=', $userId)->pluck('food_name');
		$userId = Auth::user()->id;

		if (count(array_unique($foodNames)) >= 5)
		{
			$badge = new UserBadges;
			$badge->badge_id = 15;
 			$badge->user_id = $userId;
 			$badge->save();
		}
	}

	public static function LessFatCheck()
	{
		$yesterdayDate = Carbon::createFromTimestamp(strtotime('yesterday'));

		$fatFromYesterday = User::with(['foods' => function($query) use ($yesterdayDate)
		{
			$query->where('date', '=', '$yesterdayDate');
		}, 'foods.food'])->find(Auth::user()->id)->pluck('food_fat');

		if ($fatFromYesterday <= 75.0)
		{
			$badge = new UserBadges;
			$badge->badge_id = 16;
 			$badge->user_id = $userId;
 			$badge->save();
		}
	}

	public static function GoodBMICheck()
	{
		$userId = Auth::user()->id;
		$userBMI = User::find(Auth::user()->id)->pluck('current_bmi');


		if ((float)$userBMI >= 18.5 && (float)$userBMI <= 24.9)
		{
			$badge = new UserBadgess;
			$badge->badge_id = 17;
 			$badge->user_id = $userId;
 			$badge->save();
		}
	}

	public static function FruitsAndVeggiesCheck()
	{
		$userId = Auth::user()->id;
		$fruitServings = UserFood::where('user_id', '=', $userId)->where('food_type', '=', 'Fruit');
		$vegetableServings = UserFood::where('user_id', '=', $userId)->where('food_type', '=', 'Vegetables');
		$fruitServingsSum = array_sum($fruitServings);
		$vegetableServingsSum = array_sum($vegetableServings);

		if ($fruitServingsSum + $vegetableServingsSum >= 5)
		{
			$badge = new UserBadgess;
			$badge->badge_id = 18;
 			$badge->user_id = $userId;
 			$badge->save();
		}
	}

	public static function VarietyCheck()
	{
		$foodNames = UserFoods::where('user_id', '=', $userId)->pluck('food_name');
		$userId = Auth::user()->id;

		$SundayAgo = Carbon::createFromTimestamp(strtotime('10 sundays ago'));
		$twoSaturdayAgo = Carbon::createFromTimestamp(strtotime('last sunday'));

		$LengthFromTwoWeeksAgo = User::with(['activities' => function($query) use ($lastSunday, $nextSaturday)
		{
			$query->where('date', '>=', $lastSunday)
				->where('date', '<', $nextSaturday);
		}, 'activities.activity'])->find(Auth::user()->id)->pluck('length');

		if (count(array_unique($foodNames)) >= 10)
		{
			$badge = new UserBadges;
			$badge->badge_id = 19;
 			$badge->user_id = $userId;
 			$badge->save();
		}
	}

	public static function MeatlessCheck()
	{
		$noMeatFoodTypes = UserFoods::where('user_id', '=', $userId)->where('food_type', '!=', 'Meats')->pluck('food_type');
		$userId = Auth::user()->id;

		if (count($noMeatFoodTypes) >= 5)
		{
			$badge = new UserBadges;
			$badge->badge_id = 20;
 			$badge->user_id = $userId;
 			$badge->save();
		}
	}

	public static function TheDailyGoalCheck()
	{
		$userId = Auth::user()->id;
		$date7DaysAgo = Carbon::createFromTimestamp(strtotime('7 days ago'));
		$date6DaysAgo = Carbon::createFromTimestamp(strtotime('6 days ago'));
		$date5DaysAgo = Carbon::createFromTimestamp(strtotime('5 days ago'));
		$date4DaysAgo = Carbon::createFromTimestamp(strtotime('4 days ago'));
		$date3DaysAgo = Carbon::createFromTimestamp(strtotime('3 days ago'));
		$date2DaysAgo = Carbon::createFromTimestamp(strtotime('2 days ago'));
		$yesterdayDate = Carbon::createFromTimestamp(strtotime('yesterday'));

		$calsIngested7DaysAgo = UserFoods::where('user_id', '=', $userId)->where('date', '=', $date7DaysAgo)->pluck('food_calories');
		$calsIngested6DaysAgo = UserFoods::where('user_id', '=', $userId)->where('date', '=', $date6DaysAgo)->pluck('food_calories');
		$calsIngested5DaysAgo = UserFoods::where('user_id', '=', $userId)->where('date', '=', $date5DaysAgo)->pluck('food_calories');
		$calsIngested4DaysAgo = UserFoods::where('user_id', '=', $userId)->where('date', '=', $date4DaysAgo)->pluck('food_calories');
		$calsIngested3DaysAgo = UserFoods::where('user_id', '=', $userId)->where('date', '=', $date3DaysAgo)->pluck('food_calories');
		$calsIngested2DaysAgo = UserFoods::where('user_id', '=', $userId)->where('date', '=', $date2DaysAgo)->pluck('food_calories');
		$calsIngested1DaysAgo = UserFoods::where('user_id', '=', $userId)->where('date', '=', $yesterdayDate)->pluck('food_calories');

		$calsIngested7DaysAgoSum = array_sum($calsIngested7DaysAgo);
		$calsIngested6DaysAgoSum = array_sum($calsIngested6DaysAgo);
		$calsIngested5DaysAgoSum = array_sum($calsIngested5DaysAgo);
		$calsIngested4DaysAgoSum = array_sum($calsIngested4DaysAgo);
		$calsIngested3DaysAgoSum = array_sum($calsIngested3DaysAgo);
		$calsIngested2DaysAgoSum = array_sum($calsIngested2DaysAgo);
		$calsIngested1DaysAgoSum = array_sum($calsIngested1DaysAgo);

		if ($calsIngested7DaysAgoSum <= 2000)
			if ($calsIngested6DaysAgoSum <= 2000)
				if ($calsIngested5DaysAgoSum <= 2000)
					if ($calsIngested4DaysAgoSum <= 2000)
						if ($calsIngested3DaysAgoSum <= 2000)
							if ($calsIngested2DaysAgoSum <= 2000)
								if ($calsIngested1DaysAgoSum <= 2000)
								{
									$badge = new UserBadges;
									$badge->badge_id = 21;
 									$badge->user_id = $userId;
 									$badge->save();
								}

	}

	public static function EatingHealthyCheck()
	{
		
	}

	public static function PyramidMasterCheck()
	{
		// halps pls
	}

	public static function FishyCheck()
	{
		$userId = Auth::user()->id;

		$numberOfFish = 3; Food::where('food_name', 'LIKE', 'Fish')
										->where('food_name', 'LIKE', 'Halibut')
										->where('food_name', 'LIKE', 'Cod')
										->where('food_name', 'LIKE', 'Perch')
										->where('food_name', 'LIKE', 'Catfish')
										->where('food_name', 'LIKE', 'Large Mouth Bass')
										->where('food_name', 'LIKE', 'Salmon')
										->where('user_id', '=', $userId)
										->count();
		if ($numberOfFish >= 3)
		{
			$badge = new UserBadges;
			$badge->badge_id = 24;
 			$badge->user_id = $userId;
 			$badge->save();
		}
	}
}


