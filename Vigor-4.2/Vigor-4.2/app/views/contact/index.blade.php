
@extends('templates.tabs')


@section('main')
{{ HTML::style('css/contact.css') }}

<!--extened from templates.tabs-->
  <!--extened from templates.tabs-->
    <!--extened from templates.tabs-->
	<div class="row-fluid col-md-12 no-padding-right no-padding-left section-white-gray"> <!-- creates new row taht is gray, with no padding and is max width out of 12 -->
		<div class="tab-section-divider-gray max-width clear-right"> <!-- Holds the title  -->
			<p>FAQ: See Commonly Asked Questions and Contact Us</p>
		</div>

		<div class="row-fluid col-md-12 section-white-gray"> <!-- creates a new row  -->
			<div class="row"> <!-- Creates a new row -->
				<div class="col-md-12"> 
					<h2>FAQ</h2>
				</div>
			</div>
			<div class="row"> 
				<div class="col-md-6"> <!-- Divides the page into to and holds the FAQ -->
					 
					<!-- accordion here -->
					<section id="contactform"> 
						<!--FAQ-->
						<div class="accordion"> <!--creates the FAQ drop down  -->
							
							{{-- http://getbootstrap.com/javascript/#collapse --}}
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingOne">
										<h4 class="panel-title"> <!-- Holds the question -->
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"></a>
											<p id="question">How Do I Record A Workout/Meal?</p>  <!-- The Question  -->
										</h4>
									</div>
									<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"> <!-- opens the answer -->
										<div class="panel-body">
										<!-- is the answer --> 	To record a workout or meal look at the table of any of the main pages after you are logged in. To record a workout make sure you are on the workouts tab at the top of the page and fill out the chart. Make sure to hit submit to save it. To record a Meal make sure you are the the meal tab at the top of the page and fill ot the table. Once again make sure that you hit the submit button.
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingTwo">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"></a>
												<p id="question">Why Are My Meals/Workouts Tables Not Auto-Completing?</p>
										</h4>
									</div>
									<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
										<div class="panel-body">
											If the tables for recording a Meal/Workout dont auto-complete dont panic. That means that the meal/workout you are trying to record is either spelled wrong or is not a part of our database. In that case you fill out the rest of the boxs manually and the information will still save to your account.
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingThree">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"></a>
												<p id="question">How Do I Add A Friend?</p>
											
										</h4>
									</div>
									<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
										<div class="panel-body">
											To add a friend, once you are signed in, simple go to the friends tab and search for the person that you would like to add as a friend. Then a request will be sent to them that will ask them if the accept. If they do they will show up on your frineds list and you will be able to see their post and cahllenge them. If they refuse then the request will be denied and they will not be added to your friends list.
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingFour">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour"></a>
												<p id="question">Where Do I Change My Account Information?</p>
											
										</h4>
									</div>
									<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
										<div class="panel-body">
											To change your account information go to the top right of one of the main pages and click on Edit Profile. Once the page loads you will be able to change the information in any of teh input boxes. Remember to save when you are all done. Your information has then been changed. 
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingFive">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive"></a>
												<p id="question">Is There A Mobile App?</p>
											
										</h4>
									</div>
									<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
										<div class="panel-body">
											Yes. Vigor offers our users a mobile app that allows them to track fitness on the go. With iOS, Android, Windows, and Blackberry versionsS almost anyone can have Vigor by their side as they go through there day. The mobile app also offers an exclusive GPS route tracking map that will help you calculate your distance ran and store it to your profile.
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingSix">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix"></a>
												<p id="question">How Is My Rank Calculated?</p>
											
										</h4>
									</div>
									<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
										<div class="panel-body">
											A person rank is calculated based on the calories that they have burned in the lifetime of there account. Since Vigor is ment to track Workouts and Nutrition it was important to use to make sure that a users rank was a representation of that. 
										</div>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab" id="headingSeven">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven"></a>
												<p id="question">How Can I Tell When I Have Unlocked A Badge?</p>
											
										</h4>
									</div>
									<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
										<div class="panel-body">
											Once a badge is unlocked it is automatically posted to your feed for you and your firends to see. Then a check mark is added to the top right corner of the badge image so that you can easily tell what badges that you have unlocked, and so you can see what badges that you have left to achieve. 
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<!-- end accordion -->

				</div>
				<div class="col-md-6"> <!-- Second half of the page-->
					
					<!-- contact form here -->
						<div class="contact-us">
							@if (Session::has('success'))
							<div class="alert alert-success">Thank you for contact us!</div>
							@else
							{{ Form::open(['route' => 'contact']) }}
								<div class="name_box_group_form-group">
									{{ Form::label('name', 'Full Name:') }}
									{{ Form::text('name', Input::old('name'), ['class' => 'form-control'])}}
									{{ $errors->first('name', '<div class="alert alert-danger">:message</div>') }}
								</div>

								<div class="name_box_group_form-group">
									{{ Form::label('email', 'Email:') }}
									{{ Form::email('email', Input::old('email'), ['class' => 'form-control'])}}
									{{ $errors->first('email', '<div class="alert alert-danger">:message</div>') }}
								</div>

								<div class="message_box_group_form-group">
									{{ Form::label('message', 'Message:') }}
									{{ Form::textarea('message', Input::old('message'), ['class' => 'form-control'])}}
									{{ $errors->first('message', '<div class="alert alert-danger">:message</div>') }}
								</div>

								<div class="contact_us_button_group_form-group">
									{{ Form::submit('Contact Us!', ['class' => 'btn btn-primary blue-button']) }}

								</div>
							{{ Form::close() }}
							@endif
						</div>
					<!-- end contact form -->

				</div>
			</div>
		</div>
	</div>
@stop