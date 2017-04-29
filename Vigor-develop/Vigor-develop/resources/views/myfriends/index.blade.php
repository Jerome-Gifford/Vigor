@extends('templates.friends')

@section('content')
<div class="container-fluid">
	<!--This is code for one user post-->
	<br>
	<div class="col-md-12">
		
		<div class="col-md-1">
			<!-- This is where the Timeline goes, IE the gray line and the different circles indicating what kind of post it is -->

		</div>
		<div class="col-md-11">
			<!--This is where the image and post goes-->
			<div class="bubble">
				<div class="col-md-12">
					<div class="col-md-1">
						<img src ="http://www.iconbeast.com/images/user-big-line-grey.png"> <!-- 60 X 60 px -->
					</div>
					<div class= "col-md-11">
						<div class="container-fluid post-text-holder">
							<div class="row">
								<p id= "post-name"> JOE SMITH </p>
							</div>
							<div class="row">
								<p id= "post-content"> THIS IS WHERE A USERS POST WOULD GO..........................................</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			{!! Form::open(['route' => 'sendFriendRequest']) !!}

				<input type="input" placeholder="search someone you may know..." name="recipientFullName">
				<input type="submit" value="Send Friend Request">

			{!! Form::close() !!}

			

			

<!-- WHY IS THIS HERE 
			{{ Form::open(['route' => 'sendFriendRequest']) }}
			<div class="col-md-6 col-md-push-1">
				<div class="form-friend-search inner">
					<input type="text" class="form-control usernames" id="form-friend-search" placeholder="Find someone you might know..." name="friend-search"/>
				</div>
			</div>
			<div class="col-md-1 col-md-push-1">
				{{ Form::submit('Send Friend Request', ['class' => 'btn btn-primary blue-button']) }}
			</div>
			{{ Form::close() }}
-->
		</div>
	</div>
</div>
@stop