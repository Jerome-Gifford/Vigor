<?php

use Carbon\Carbon;

class ProgressController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = $this->getActivities();
		$userBadges = $this->getBadges();

		return View::make('progress.index')->withUser($user)->withBadges($userBadges);
	}

	/**
	 * Calculate calories from activities from the current week and post to chart.
	 *
	 * @return Response
	 */
	protected function getActivities()
	{
		$lastSunday = Carbon::createFromTimestamp(strtotime('last sunday'));
		$nextSaturday = Carbon::createFromTimestamp(strtotime('next saturday'));
		$stub = [
			'workout_hours' => 0,
			'calories_burned' => 0,
			'calories_injected' => 0
		];
		$chartData = [
			'monday' => $stub,
			'tuesday' => $stub,
			'wednesday' => $stub,
			'thursday' => $stub,
			'friday' => $stub,
			'saturday' => $stub,
			'sunday' => $stub
		];

		$user = User::with(['activities' => function($query) use ($lastSunday, $nextSaturday)
		{
			$query->where('date', '>=', $lastSunday)
				->where('date', '<', $nextSaturday);
		}, 'activities.activity'])->find(Auth::user()->id);

		foreach ($user['activities'] as $activity)
		{
			//  the date of the activity
			$date = $activity->date;

			// chart stuff
			$dayName = strtolower(date('l', strtotime($date)));

			// hours worked out
			$chartData[$dayName]['workout_hours'] += $activity->length;

			// cals burned
			$weightAsKilos = $user['current_weight'] / 2.2;
			$product = $weightAsKilos * $activity['activity']['MET'];
			$cals_burned = $product * ($activity['length'] / 60);
			$chartData[$dayName]['calories_burned'] = floor($cals_burned);
		}

		// run though the time in minutes and convert them to hours.
		foreach ($chartData as $dayIndex => $day)
			$chartData[$dayIndex]['workout_hours'] = round($day['workout_hours'] / 60, 1);

		// chart data objects
		$user->charts = $chartData;

		// flat chart data all in one array.
		$user->flat = [
			'workout_hours' => array_values(array_map(function($val) {
				return $val['workout_hours'];
			}, $user->charts)),

			'calories_burned' => array_values(array_map(function($val) {
				return $val['calories_burned'];
			}, $user->charts)),

			'chart_labels' => array_map(function($val) {
				return ucwords($val);
			}, array_keys($user->charts))
		];

		return $user;
	}

	/**
	 * Calculates how many badges a user has locked and unlocked.
	 *
	 * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Support\Collection|null|static
	 */
	protected function getBadges()
	{
		$userBadges = User::with('badges.badge')->find(Auth::user()->id);
		$allBadges = Badge::all();

		$userBadgeCount = $userBadges->badges->count();
		$userBadges->unlocked = $userBadgeCount;
		$userBadges->locked = $allBadges->count() - $userBadgeCount;

		return $userBadges;

	}
}