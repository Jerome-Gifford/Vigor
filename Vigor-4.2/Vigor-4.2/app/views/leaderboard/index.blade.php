
@extends('templates.tabs')


@section('main')
<!--extened from templates.tabs-->
<!--extened from templates.tabs-->
<!--extened from templates.tabs-->
<div class="row-fluid col-md-12 no-padding-right no-padding-left section-white-gray max-height"> <!-- creates a new row that has no padding and is white/gray -->
  <div class="tab-section-divider-gray max-width clear-right"> <!-- Holds the header text  -->
    <p>Leaderboard: See where you stack up against friends</p>
  </div>
  <br>
  <!---->
  <div class="col-md-12">
    <div class="col-md-4">
      <div class="table-responsive"> <!-- Creates the leaderboard table -->
        <table class="table">
          <tr class="leaderboard"> <!-- row titles -->
            <th>Name</th>
            <th>Overall Rank</th>
          </tr>
          @foreach($users as $user) <!-- pulls top ten users for the db based of the field (same as below)-->
          <tr class="leaderboard"> 
            <td id="name-cell"><p id="leaderboard-text-name">{{ $user->first_name }} {{ $user->last_name }}</p></td> <!-- pulls name (same as below) -->
            <td><p id="leaderboard-text">{{$user->rank}}</p></td> <!-- pulls compared field (same as below) -->
          </tr>
          @endforeach
        </table>
      </div>
    </div>
    <div class="col-md-4">
      <div class="table-responsive">
        <table class="table">
          <tr class="leaderboard">
            <th>Name</th>
            <th>Badges Unlocked</th>
          </tr>
          @foreach($users as $user)
          <tr class="leaderboard">
            <td id="name-cell"><p id="leaderboard-text-name">{{ $user->first_name }} {{ $user->last_name }}<p></td>
            <td><p id="leaderboard-text">{{$user->unlocked_badges}}</p></td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
    <div class="col-md-4">
      <div class="table-responsive">
        <table class="table">
          <tr class="leaderboard">
            <th>Name</th>
            <th>Workouts Completed</th>
          </tr>
           @foreach($users as $user)
          <tr class="leaderboard">
            <td id="name-cell"><p id="leaderboard-text-name">{{ $user->first_name }} {{ $user->last_name }}<p></td>
            <td><p id="leaderboard-text">{{$user->workout_completed}}</p></td>
          </tr>
           @endforeach
        </table>
      </div>
    </div>
  </div>



</div><!-- Ends from what is extened from templates.tabs-->
</div><!-- Ends from what is extened from templates.tabs-->
</body><!-- Ends from what is extened from templates.tabs-->
@stop