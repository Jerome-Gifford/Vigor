
@extends('templates.tabs')


@section('main')
<!--extened from templates.tabs-->
<!--extened from templates.tabs-->
<!--extened from templates.tabs-->
<div class="row-fluid col-md-12 no-padding-right no-padding-left section-white-gray max-height">
	<div class="tab-section-divider-gray max-width clear-right">
		<p>Friends: View Your Friends List and Add New Friends</p>
	</div>
	<br>
	<div class="row">
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
	</div>
	<br>
	<div class="row">
		<div class="col-md-10 col-md-push-1">
			<div class="jumbotron friends-list-container">

				@foreach(Notification::where('user_id', '=', Auth::user()->id)->where('is_read', '=', 0)->get() as $friendRequest)
					{{ HTML::image('users/user/' . $friendRequest->from_user_id . '/profile/' . $friendRequest->body, 'Upload a profile picture', ['width' => '100%', 'class' => 'img-round']) }}
					{{ User::find($friendRequest->from_user_id)->first_name }} {{ User::find($friendRequest->from_user_id)->last_name }}
					{{ User::find($friendRequest->from_user_id)->first_name }} {{ User::find($friendRequest->from_user_id)->last_name }}
					<div class="row">
						<div class="col-md-12 col-md-push-2">
							{{ Form::open(['route' => 'friendRequestAccept'])}}
							{{ Form::submit('Accept', ['class' => 'btn btn-primary blue-button']) }}
							{{ Form::close() }}

							{{ Form::open(['route' => 'friendRequestDecline'])}}
							{{ Form::submit('Decline', ['class' => 'btn btn-primary blue-button']) }}
							{{ Form::close() }}
						</div>
					</div>
				@endforeach

				
				<br>
				<ul class="friends-list-ul">

					{{--@foreach (User::where('id', '=', )->get() as $acceptedFriendRequest)--}}
					
					@foreach (Auth::user()->friends as $acceptedFriendRequest)
						<li class="friends-list-group-item">
							{{ HTML::image('users/user/' . $acceptedFriendRequest->id . '/profile/' . $acceptedFriendRequest->profile_image, 'Upload a profile picture', ['width' => '100%', 'class' => 'img-round']) }}
							<label class="name">
								{{ User::find($acceptedFriendRequest->id)->first_name }} {{ User::find($acceptedFriendRequest->id)->last_name }}
							</label>
							<label class="pull-right">
								<a class="btn btn-success btn-xs glyphicon glyphicon-hourglass" href="#" title="Challenge"></a>
								<a class="btn btn-danger  btn-xs glyphicon glyphicon-trash" href="#" title="Remove Friend"></a>
							</label>
							<div class="break"></div>
						</li>
					@endforeach
					
				</ul>
			</div>
		</div>
	</div>
</div><!-- Ends from what is extened from templates.tabs-->
</div><!-- Ends from what is extened from templates.tabs-->
</div>
</body><!-- Ends from what is extened from templates.tabs-->
@stop

@section('scripts')
@parent
{{ HTML::script('bower_components/typeahead.js/dist/typeahead.bundle.min.js')}}

{{ HTML::script('js/userNames.js') }}
@stop