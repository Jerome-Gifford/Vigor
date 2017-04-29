<div class= "search">
	<div id="wrap">
		<form action="" autocomplete="on">
			<input id="search_submit" value="Rechercher" type="search-submit"><input id="search" name="search" type="search-text" placeholder="Search...">
		</form>
	</div>
</div>
<div class= "activity">
	<br>
	<p id="feed-title"> RECENT ACTIVITY </p>
	<br>
	<!-- LOGIC FOR SHOWING FRIEND REQUESTS AND SUCH -->
	@if(!is_null($friendRequests) && count($friendRequests) > 0)

	@foreach($friendRequests as $friendRequest)
		<br>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-5 col-md-push-5"> <!-- MAKE THIS USER IMAGE CENTERED IN THE ROW -->
						{!! HTML::image('/userimg/' . $friendRequest->from_user_id . '/' . $friendRequest->profileImage, 'Profile Image', array('class' => 'circular')) !!}
						<div class="row">
							{!! $friendRequest->body !!}
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-4 col-md-push-4">
						<div class="col-md-2 col-md-push-2">
							{!! Form::open(['route' => 'acceptFriendRequest'])!!}
							{!! Form::text(' ', $friendRequest->from_user_id, array('class' => 'hidden', 'name' => 'from_user_id')) !!}
							{!! Form::text(' ', $friendRequest->user_id, array('class' => 'hidden', 'name' => 'user_id')) !!}
							<button type="submit">
								<span class="glyphicon glyphicon-ok"></span>
							</button>
							{!! Form::close() !!}
						</div>
						<div class="col-md-2 col-md-push-3">
							{!! Form::open(['route' => 'declineFriendRequest'])!!}
							{!! Form::text(' ', $friendRequest->from_user_id, array('class' => 'hidden', 'name' => 'from_user_id')) !!}
							{!! Form::text(' ', $friendRequest->user_id, array('class' => 'hidden', 'name' => 'user_id')) !!}
							<button type="submit">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		@endforeach
		@else
		-YOU HAVE NO NOTIFICATIONS-
		@endif
	
	<div class= "online-friends">
		<br>
		<br>
		<br>
		<p id="feed-title"> FRIENDS </p>
		@if(!is_null($onlineFriendsCount) && $onlineFriendsCount > 0)
		@foreach($friends as $friend)
		<br>
		<div class="row-fluid">
			<div class="col-md-12">
				<div class= "col-md-3">
					{!! HTML::image('/userimg/' . $friend->id . '/' . $friend->profileImage, 'Profile Image', array('class' => 'circular')) !!}
				</div>
				<div class="col-md-6">
					<p id="online-friend-text">{!! $friend->fullname !!}</p>
				</div>
				<div>
				{!! Form::open(['route' => 'removeFriend']) !!}
					<button type="submit">
						{!! Form::text(' ', $friend->id, array('class' => 'hidden', 'name' => 'friendId')) !!}
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				{!! Form::close() !!}
				</div>
			</div>
		</div>
		@endforeach
		@else
		- YOU HAVE NO ONLINE FRIENDS -
		@endif
		<br>
		<br>
		<br>
			{!! Session::get('message') !!}
			<ul id="messages">
			</ul>
	</div>
