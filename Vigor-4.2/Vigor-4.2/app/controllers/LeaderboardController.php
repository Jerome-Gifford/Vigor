<?php

class LeaderboardController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*pushes data */
		$users = $this->getRanks();
		$users = $this->getUnlockedBadges();
		$users = $this->getWorkoutsCompleted();

		return View::make('leaderboard.index')->withUsers($users);
	}


	/**
	 * Display the top 10 Users in the Rank Leaderboard
	 *
	 * @return Response
	 */
	protected function getRanks()
	{
		$users = User::orderBy('rank','DESC')->paginate(10); /** pulls the top users for rank and stores them */

		return $users;
	}


	/**
	 * Display the top 10 Users in the Badges Unlocked Leaderboard
	 *
	 * @return Response
	 */
	public function getUnlockedBadges()
	{
		$users = User::orderBy('unlocked_badges','DESC')->paginate(10); /** pulls the top users forunlocked badges and stores them */

		return $users;
	}

	public function getWorkoutsCompleted()
	{
		$users = User::orderBy('workout_completed','DESC')->paginate(10); /** pulls the top users for workouts completed  and stores them */

		return $users;
	}
}