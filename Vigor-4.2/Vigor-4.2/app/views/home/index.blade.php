@extends('templates.app')




@section('banner')
<div id="banner"> <!-- Pulls in the background image -->
	
	<section id="login" class="section"> <!-- hold the log in -->
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-lg-push-1">
					<div class="logo logo-center">
						{{ HTML::image('img/logo.png') }} <!-- Pulls the logo via blade -->
					</div>

					<div id="tabbox"> <!-- creates the tabs-->
						<a href="#" id="signup" class="login-tab signup">Signup</a> 
						<a href="#" id="login-tab" class="login-tab select">Login</a>
					</div>
					<div id="panel">
						<div id="loginbox"> <!-- Creates the login fields -->
							{{ Form::open(['route' => 'login', 'class' => 'section-form']) }}

		                <!--<div class="form-group">
		                    <div class="section-header section-header-center">
		                        <h3>Login</h3>
		                    </div>

		                    <div class="section-content section-intro">
		                        <p>Please login to continue.</p>
		                    </div>
		                </div>-->

		                <div class="form-group"> <!-- Email field -->
		                	{{ Form::label('email', 'Email', ['class' => 'control-label']) }}
		                	{{ Form::email('email', Input::old('email'), ['class' => 'form-control']) }}
		                	{{ $errors->first('email', '<div class="alert alert-warning">:message</div>') }}
		                </div>

		                <div class="form-group"> <!-- password field  -->
		                	{{ Form::label('password', 'Password', ['class' => 'control-label']) }}
		                	{{ Form::password('password', ['class' => 'form-control']) }}
		                	{{ $errors->first('password', '<div class="alert alert-warning">:message</div>') }}
		                </div>



		                <div class="form-group">
		                	<div class="checkbox"> <!-- remember me field -->
		                		<label>
		                			{{ Form::checkbox('remember_me', Input::old('remember_me'), true) }} Remember me
		                		</label>
		                	</div>
		                </div>

		                <div class="form-group"> <!--Log in button -->
		                	{{ Form::submit('Login', ['class' => 'btn btn-primary btn-block']) }}
		                </div>

		                {{ $errors->first('invalid', '<div class="alert alert-warning">:message</div>') }}

		                {{ Form::close() }}

		                <div class="login-forgot"> <!-- creates the log in forgot-->
		                	{{ link_to_route('remind', 'Forgot login details?', null, ['class' => 'btn-small btn-link']) }}
		                </div>
		            </div>
		            <div id="signupbox"> <!-- Added the sign up -->
		            	{{ Form::open(['route' => 'register', 'class' => 'register-form section-form']) }}

		            	<div class="form-group"> <!-- First name field -->
		            		{{ Form::label('first_name', 'First Name', ['class' => 'control-label']) }}
		            		{{ Form::text('first_name', Input::old('first_name'), ['class' => 'form-control']) }}
		            		{{ $errors->first('first_name', '<div class="alert alert-warning">:message</div>') }}
		            	</div>

		            	<div class="form-group"> <!-- Last name field -->
		            		{{ Form::label('last_name', 'Last Name', ['class' => 'control-label']) }}
		            		{{ Form::text('last_name', Input::old('last_name'), ['class' => 'form-control']) }}
		            		{{ $errors->first('last_name', '<div class="alert alert-warning">:message</div>') }}
		            	</div>

		            	<div class="form-group"> <!--Email field  -->
		            		{{ Form::label('email', 'Email', ['class' => 'control-label']) }}
		            		{{ Form::email('email', Input::old('email'), ['class' => 'form-control']) }}
		            		{{ $errors->first('email', '<div class="alert alert-warning">:message</div>') }}
		            	</div>

		            	<div class="form-group"> <!-- Password field -->
		            		{{ Form::label('password', 'Password', ['class' => 'control-label']) }}
		            		{{ Form::password('password', ['class' => 'form-control']) }}
		            		{{ $errors->first('password', '<div class="alert alert-warning">:message</div>') }}
		            	</div>

		            	<div class="form-group"> <!-- Comfirm password field -->
		            		{{ Form::label('password_confirmation', 'Password Confirmation', ['class' => 'control-label']) }}
		            		{{ Form::password('password_confirmation', ['class' => 'form-control']) }}
		            		{{ $errors->first('password_confirmation', '<div class="alert alert-warning">:message</div>') }}
		            	</div>

		            	<div class="form-group"> <!-- Submit register -->
		            		{{ Form::submit('Register', ['class' => 'btn btn-primary btn-block']) }}
		            	</div>

		            	{{ Form::close() }}

		            </div>
		        </div>           	
		    </div>
		</div>
	</div>
</div>
</section>
</div>
@stop

@section('main')
<section class="section section-blue section-large"> <!-- Creates a section (same as below) and holds all the infomation-->
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1>What Is Vigor?</h1>
				<p>Vigor is a social fitness tracker that takes the human nature of competitive to heart. At Vigor we believe that competition helps boost a persons drive, and a person needs an increased drive most when they are tying to achieve physical fitness. Our social elements allow you to make friends and challenge them to various activities, through our Badges system. To keep the competition going we also have a rankings system, encouraging you to keep pushing through the ranks of physical fitness.</p>
			</div>
			<div class="col-md-6 hidden-xs hidden-sm">
				<img src="http://projects.gametimepa.com/fbpreview/img/white-trophy.png" alt="Competition" width="60%" height="60%" >
			</div>
		</div>
	</div>
</section>
<section class="section section-white section-large">
	<div class="container">
		<div class="row">
			<div class="col-md-6 hidden-xs hidden-sm">
				<img src="http://www.parachutedigitalmarketing.com.au/wp-content/uploads/2012/03/social-media-friends-of-friends.jpg" alt="friends">
			</div>
			<div class="col-md-6">
				<h1>Get Fit With Friends</h1>
				<p>When working towards physical fitness there is nothing more important than have the support you need.
					With Vigor you can have your friends there with you at all times as they can see your recent activity and support 
					or challenge you to go further. This additive of incorporating friends into your fitness routine is something that helps set 
					Vigor aside from its competitors. </p>
				</div>
				
			</div>
		</div>
	</section>
	<section class="section section-gray section-large">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h1>Log Your Data</h1>
					<p>When you use Vigor its all about convenience. Log all of your meals and workouts in one spot.With our 
					database of over 8,000 foods when you record a meal, if it is in our database it with automatically fill out the 
					calories, grams fat, carbs, and many more depending on you rserving size.   </p>
					</div>
					<div class="col-md-6 hidden-xs hidden-sm">
						<img src="http://b-i.forbesimg.com/emc/files/2013/09/chart-and-magnifying-glass-data-analysis-predictive-analytics-2.jpg" alt="Data" width="75%" height="75%" >
					</div>
				</div>
			</div>
		</section>
		<section class="section section-light-blue section-large">
			<div class="container">
				<div class="row">
					<div class="col-md-6 hidden-xs hidden-sm">
						<img src="http://www.active.com/Assets/Running/580/Man+Running+With+Phone.jpg" alt="Competition" width="75%" height="75%" >
					</div>
					<div class="col-md-6">
						<h1>Take Vigor On The Go</h1>
						<p>Dont let being on the go prevent you from being fit. Take Vigor with you. With our apps avaliable on iOS, Android, and Windows anyoone can take Vigor on the go with time. 
						Exculsive to our mobile app is a GPS traking map that will track your runs as you run and record them to your account. </p>
						</div>

					</div>
				</div>
			</section>


			<!-- js for tabs -->
			<script type="text/javascript" src="http://ajax.googleapis.com/
			ajax/libs/jquery/1.5/jquery.min.js"></script>
			<script type="application/javascript">
			$(document).ready(function()
			{
				
				$(".login-tab").click(function()
				{
					var X=$(this).attr('id');
					
					if(X=='signup')
					{
						$("#login").removeClass('select');
						$("#signup").addClass('select');
						$("#loginbox").slideUp();
						$("#signupbox").slideDown();
					}
					else
					{
						$("#signup").removeClass('select');
						$("#login").addClass('select');
						$("#signupbox").slideUp();
						$("#loginbox").slideDown();
					}
					
				});

			});
			</script>

			@stop