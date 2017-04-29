<?php

class UserRank extends Eloquent {

	protected $table = 'user_rank';

	public static function xpCalculator()
	{
		$user = User::find(Auth::user()->id);
		$total_cals_burned=0; 

		$chartLabels = [];
			$chartCaloriesIngested = [];  // where is this data stored?
			$chartCaloriesBurned = [];
			$chartWorkoutHours = [];

			foreach ($user['activities'] as $activity)
			{
			//  date of the activity
				$date = $activity->date;

				// cals clas burned
				$weightAsKilos = $user['current_weight'] / 2.2;
				$product = $weightAsKilos * $activity['activity']['MET'];
				$cals_burned = $product * ($activity['length'] / 60);
				$total_cals_burned = ($cals_burned + $total_cals_burned);
				$chartCaloriesBurned[] = floor($cals_burned);

				$activity->cals_burned = $cals_burned;
			}

		// cals xpremaing fo next level up
		if ($total_cals_burned <= 5000 ){
			$xpRemaining= (5000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 5000 and $total_cals_burned <= 15000){
			$xpRemaining= (15000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 15000 and $total_cals_burned <= 30000){
			$xpRemaining= (30000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 30000 and $total_cals_burned <= 50000) {
			$xpRemaining= (50000 - $total_cals_burned);
		}
		elseif ($total_cals_burned > 50000 and $total_cals_burned <= 75000) {
			$xpRemaining= (75000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 75000 and $total_cals_burned <= 105000){
			$xpRemaining= (105000 - $total_cals_burned);
		}
		elseif ($total_cals_burned > 105000 and $total_cals_burned <= 140000) {
			$xpRemaining= (140000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 140000 and $total_cals_burned <= 180000){
			$xpRemaining= (180000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 180000 and $total_cals_burned <= 225000){
			$xpRemaining= (225000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 225000 and $total_cals_burned <= 275000){
			$xpRemaining= (275000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 275000 and $total_cals_burned <= 330000){
			$xpRemaining= (330000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 330000 and $total_cals_burned <= 390000){
			$xpRemaining= (390000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 390000 and $total_cals_burned <= 455000){
			$xpRemaining= (455000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 455000 and $total_cals_burned <= 525000){
			$xpRemaining= (525000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 525000 and $total_cals_burned <= 600000){
			$xpRemaining= (600000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 600000 and $total_cals_burned <= 680000){
			$xpRemaining= (680000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 680000 and $total_cals_burned <= 765000){
			$xpRemaining= (765000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 765000 and $total_cals_burned <= 855000){
			$xpRemaining= (855000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 855000 and $total_cals_burned <= 950000){
			$xpRemaining= (950000 - $total_cals_burned);
		}
		elseif($total_cals_burned > 950000 and $total_cals_burned <= 1050000){
			$xpRemaining= (1050000 - $total_cals_burned);
		}
		else{
			$xpRemaining= 0;
		}

		return $xpRemaining;
	}

	public static function calcCalsBurned()
	{
		$user = User::find(Auth::user()->id);
		$total_cals_burned=0; 

		$chartLabels = [];
			$chartCaloriesIngested = [];  // where is this data stored?
			$chartCaloriesBurned = [];
			$chartWorkoutHours = [];

			foreach ($user['activities'] as $activity)
			{
			//  date of the activity
				$date = $activity->date;

				//calcs cals burned
				$weightAsKilos = $user['current_weight'] / 2.2;
				$product = $weightAsKilos * $activity['activity']['MET'];
				$cals_burned = $product * ($activity['length'] / 60);
				$total_cals_burned = ($cals_burned + $total_cals_burned);
				$chartCaloriesBurned[] = floor($cals_burned);

				$activity->cals_burned = $cals_burned;
			}

		//returns total cals burned
		return $total_cals_burned;
	}

	public static function rankCalculator()
	{
		$userRow = User::find(Auth::user()->id);
		$total_cals_burned=0; 

		$chartLabels = [];
			$chartCaloriesIngested = [];  // where is this data stored?
			$chartCaloriesBurned = [];
			$chartWorkoutHours = [];

			foreach ($userRow['activities'] as $activity)
			{
			//  date of the activity
				$date = $activity->date;

				$weightAsKilos = $userRow['current_weight'] / 2.2;
				$product = $weightAsKilos * $activity['activity']['MET'];
				$cals_burned = $product * ($activity['length'] / 60);
				$total_cals_burned = ($cals_burned + $total_cals_burned);
				$chartCaloriesBurned[] = floor($cals_burned);

				$activity->cals_burned = $cals_burned;
			}

			// calcs user rank
		if ($total_cals_burned <= 5000 ){
			$userRank="1";
			
		}
		elseif($total_cals_burned > 5000 and $total_cals_burned <= 15000){
			$userRank="2";
			
		}
		elseif($total_cals_burned > 15000 and $total_cals_burned <= 30000){
			$userRank="3";
			
		}
		elseif($total_cals_burned > 30000 and $total_cals_burned <= 50000) {
			$userRank="4";

		}
		elseif ($total_cals_burned > 50000 and $total_cals_burned <= 75000) {
			$userRank="5";
			
		}
		elseif($total_cals_burned > 75000 and $total_cals_burned <= 105000){
			$userRank="6";
			
		}
		elseif ($total_cals_burned > 105000 and $total_cals_burned <= 140000) {
			$userRank="7";
			
		}
		elseif($total_cals_burned > 140000 and $total_cals_burned <= 180000){
			$userRank="8";
			
		}
		elseif($total_cals_burned > 180000 and $total_cals_burned <= 225000){
			$userRank="9";
			
		}
		elseif($total_cals_burned > 225000 and $total_cals_burned <= 275000){
			$userRank="10";
			
		}
		elseif($total_cals_burned > 275000 and $total_cals_burned <= 330000){
			$userRank="11";
			
		}
		elseif($total_cals_burned > 330000 and $total_cals_burned <= 390000){
			$userRank="12";
			
		}
		elseif($total_cals_burned > 390000 and $total_cals_burned <= 455000){
			$userRank="13";
			
		}
		elseif($total_cals_burned > 455000 and $total_cals_burned <= 525000){
			$userRank="14";
			
		}
		elseif($total_cals_burned > 525000 and $total_cals_burned <= 600000){
			$userRank="15";
			
		}
		elseif($total_cals_burned > 600000 and $total_cals_burned <= 680000){
			$userRank="16";
			
		}
		elseif($total_cals_burned > 680000 and $total_cals_burned <= 765000){
			$userRank="17";
			
		}
		elseif($total_cals_burned > 765000 and $total_cals_burned <= 855000){
			$userRank="18";
			
		}
		elseif($total_cals_burned > 855000 and $total_cals_burned <= 950000){
			$userRank="19";
			
		}
		elseif($total_cals_burned > 950000 and $total_cals_burned <= 1050000){
			$userRank="20";
			
		}
		else{
			$userRank="MAX";
		}

		//pushes data to the db
		$currUser = Auth::user()->id;
		$total = DB::table('user_activities')->where('user_id', '=', $currUser)->count();
		$badgesCount = UserBadges::where('user_id', '=', $currUser)->count();

		if (!is_null($badgesCount))
		{
			$user = User::find($currUser);
			$user->rank = $userRank;
			$user->unlocked_badges = $badgesCount;
			$user->workout_completed = $total;
			$user->save();
		}
		


		return $userRank;
	}
}