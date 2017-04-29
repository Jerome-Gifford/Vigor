
<?php
use Carbon\Carbon;
class UserActivityController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


		if (Request::isJson())
		{
			$userActivity = new UserActivity;
			$userActivity->user_id = Input::get('user_id');
			$userActivity->activity_id = Input::get('activity_id');
			$userActivity->date = Carbon::now();
			$userActivity->time = time();
			$userActivity->length = Input::get('length');
			$userActivity->comment = Input::get('comment');
			$userActivity->save();
			return Response::json(['success' => true]);
		}


		//validation
		$rules = [
			'workout_activity' => 'required|alpha',
			'workout_at' => 'required',
			'workout_length' => 'required|integer|max:300'
		];

		$messages = [

			'workout_activity.required' => 'You must input a Workout.',
			'workout_activity.alpha' => 'The activity name must be alphameric.',
			'workout_at.required' => 'You forgot the Time Started!',
			'workout_length.required' => 'You must input the length of your workout.',
			'workout_length.integer' => 'Your workout length must be in number of minutes.',
			'workout_length.max' => 'You cannot input that many minutes.'
		];

		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails())
		{
			return Request::ajax() ?
				Response::json($validator->messages()) :
				Redirect::back()->withInput()->withErrors($validator->messages());
		}

		//storing input

		$userActivity = new UserActivity;
		$userActivity->user_id = Auth::user()->id;
		$userActivity->activity_id = Activity::where('activity_name', '=', Input::get('workout_activity'))->pluck('id');
		$userActivity->date = Carbon::now();
		$userActivity->time = Input::get('workout_at', time());
		$userActivity->length = Input::get('workout_length');
		$userActivity->comment = Input::get('workout_comment');
		$userActivity->save();

		/*Badge::GoalWeightCheck();
		Badge::SessionStreakCheck();
		Badge::BecomingFitCheck();
		Badge::MyRoutineCheck();
		//Badge::BackInAction();
		Badge::DedicationCheck();
		Badge::ResultsCheck();
		Badge::ConsistentCheck();
		Badge::ChangeCheck();
		Badge::FartherCheck();
		Badge::TwoHundredHoursCheck();
		Badge::OneThousandHoursCheck();
		Badge::MaintainDietCheck();
		Badge::EatLessCheck();
		Badge::BalanceCheck();
		Badge::LessFatCheck();
		Badge::GoodBMICheck();
		Badge::FruitsAndVeggiesCheck();
		Badge::VarietyCheck();
		Badge::MeatlessCheck();
		Badge::TheDailyGoalCheck();
		Badge::FishyCheck();*/

		return Request::isJson() ? Response::json(['success' => true]) : Redirect::back()->withSuccess('true');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
