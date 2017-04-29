@extends('templates.edit')

@section('content')
<div class= "row">
	<br>
	<br>
	<div class="col-md-12">
		<div class="col-md-3">
			<div class="img-upload">
				<div class="userimg animated bounce"> <!-- holds current profile image in upload box-->
						{!! HTML::image('/userimg/' . Auth::user()->id . '/' . Auth::user()->profile_image, 'Upload A Profile Image', array('width' => '100%', 'height' => '100%')) !!}
					 <!-- pulls user profile image -->

					<div class="updateimg"> <!-- holds the choose a file and submit buttons, and banner -->
						{!! Form::open(['route' => 'profile.upload.file', 'files' => true]) !!} <!-- adds open file-->
							<div class="controls">
								{!! Form::file('image') !!} 
								{!! Form::submit('Upload Profile Image') !!} <!-- Adds submit button -->
							</div>

							<div id="success"> </div> <!-- throws errors -->
							<p class="errors">{!! $errors->first('image') !!}</p>

							@if(Session::has('error'))
								<p class="errors">{!! Session::get('error') !!}</p>
							@endif
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">

			{!! Form::open(['route' => 'editProfileInfo']) !!} 
			<div class="form-group-profile"> 
				<div class="card-container">
					<div class="card">
						<div class="side">{!! Form::label('calorie_count', 'Daily Calorie Goal', ['class' => 'control-label']) !!}</div>
						<div class="side back">{!! Form::text('calorie_count', Input::old('calorie_count'), ['class' => 'form-control']) !!}</div>
					</div>
				</div>
				{!! $errors->first('calorie_count', '<div class="alert alert-danger">:message</div>') !!}
			</div>
			<br>
			<div class="form-group-profile">
				<div class="card-container">
					<div class="card">
						<div class="side">{!! Form::label('current_weight', 'Current Weight', ['class' => 'control-label']) !!}</div>
						<div class="side back">{!! Form::text('current_weight', Input::old('current_weight'), ['class' => 'form-control']) !!}</div>
					</div>
				</div>
				{!! $errors->first('current_weight', '<div class="alert alert-danger">:message</div>') !!}
			</div>
			<br>
			<div class="form-group-profile">
				<div class="card-container">
					<div class="card">
						<div class="side">{!! Form::label('goal_weight', 'Goal Weight', ['class' => 'control-label']) !!}</div>
						<div class="side back">{!! Form::text('goal_weight', Input::old('goal_weight'), ['class' => 'form-control']) !!}</div>
					</div>
				</div>
				{!! $errors->first('goal_weight', '<div class="alert alert-danger">:message</div>') !!}
			</div>
			<br>
			<div class="form-group-profile">
				<div class="card-container">
					<div class="card">
						<div class="side">{!! Form::label('Body Fat Percentage', 'Body Fat Percentage', ['class' => 'control-label']) !!}</div>
						<div class="side back">{!! Form::text('user_fat_percentage', Input::old('user_fat_percentage'), ['class' => 'form-control']) !!}</div>
					</div>
				</div>
				{!! $errors->first('user_fat_percentage', '<div class="alert alert-danger">:message</div>') !!}
			</div>
			<br>
			<div class="form-group-profile">
				<div class="card-container">
					<div class="card">
						<div class="side">{!! Form::label('Height', 'Height', ['class' => 'control-label']) !!}</div>
						<div class="side back">{!! Form::text('height', Input::old('height'), ['class' => 'form-control']) !!}</div>
					</div>
				</div>
				{!! $errors->first('height', '<div class="alert alert-danger">:message</div>') !!}
			</div>
			<br>
			<div class="form-group-profile">
				<div class="card-container">
					<div class="card">
						<div class="side">{!! Form::label('Age', 'Age', ['class' => 'control-label']) !!}</div>
						<div class="side back">{!! Form::text('age', Input::old('age'), ['class' => 'form-control']) !!}</div>
					</div>
				</div>
				{!! $errors->first('age', '<div class="alert alert-danger">:message</div>') !!}
			</div>
			<br>

{{-- 				AJAX A TWO WAY RADIO BUTTON IN HERE
 --}}
			<br>			
			<div class="form-group-profile">
				<input type="submit" class="form-control" name="editProfile" value="Update Profile Info!">
			</div>
			{!! Form::close() !!}

		</div>
		<div class"col-md-1"></div>
	</div>
</div>
@stop