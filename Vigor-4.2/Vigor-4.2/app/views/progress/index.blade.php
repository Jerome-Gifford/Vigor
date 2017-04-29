
@extends('templates.tabs')


@section('main')
<!-- pulls cals burned data and creates chart -->
<script>
var labels = ["{{ implode('","', $user['flat']['chart_labels'])  }}"],
    caloriesData = {
        labels: labels,
        datasets: [
            {
                label: 'Calories Burned',
                fillColor : "rgba(128, 128, 128, .3)",
                strokeColor : "rgba(128, 128, 128, 1)",
                data : ["{{ implode('","', $user['flat']['calories_burned']) }}"]
            }
        ]
    },
    caloriesOptions = {
        responsive: true
    };

// workout chart
var workoutsData = {
    labels: labels,
    datasets : [
        {
            label: 'Workout Hours',
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(50, 50, 153, 1)",
            data: ["{{ implode('","', $user['flat']['workout_hours']) }}"]
        }
    ]
},
workoutOptions = {
    barDatasetSpacing : 25,
    barValueSpacing: 5,
    responsive: true
};

// total badges chart
var totalbadgesData = [
  {
      label: 'Locked',
      value: {{ $badges->locked }},
      color: "rgba(59, 103, 106, 0.2)"
  },
  {
      label: 'Unlocked',
      value: {{ $badges->unlocked }},
      color: "#3B676A"
  }
],
totalbadgesOptions = {
    segmentShowStroke : false,
    animateScale : true,
    responsive: true
};
</script>

<!--extened from templates.tabs-->
<!--extened from templates.tabs-->
<!--extened from templates.tabs-->
<div class="row-fluid col-md-12 no-padding-right no-padding-left section-white-gray"> <!-- creates row with no padding and white/gray background -->
  <div class="tab-section-divider-gray max-width clear-right"> <!-- Holds the header -->
    <p>Progress: Track Your Recent Fitness</p>
  </div>
  <br>
  <div class="row row-no-gutter">
    <div class="col-md-12">
      <div class= "clear-right section-light-blue col-md-3"> <!-- Holds the chart (same as below) -->
        <script> //var caloriesData = [] </script>
        <div>
          <p id="blue-text">Calorie Count For The Week</p>  <!-- the chart name (same as below) -->
        </div>
        <div class="col-md-11 col-md-push-1">
          <canvas id="calories" width="210" height="250"> <input type="hidden" id="user" data-name="<? $user; ?>"></canvas> <!-- creates the chart (same as below) -->
          <div id="calories-legend" class="col-md-11 col-md-push-1"></div> <!-- creates the chart legend (same as below) -->
          {{ HTML::script('bower_components/chartjs/Chart.min.js') }}
          {{ HTML::script('js/charts/calories.js') }}
        </div>
      </div>
      <div class= "clear-right section-light-blue col-md-3 col-md-push-1">
        <script> //var workoutsData = [] </script>
        <div>
          <p id="blue-text">Workouts For The Week (Hours)</p>
        </div>
        <div class="col-md-11 col-md-push-1">
          <canvas id="workouts" width="210" height="300"><input type="hidden" id="user" data-name="<? $user; ?>"></canvas>
          {{ HTML::script('bower_components/chartjs/Chart.min.js') }}
          {{ HTML::script('js/charts/workouts.js') }}
        </div>
      </div>
      <div class= "clear-right section-light-blue col-md-3 col-md-push-2">
        <script> //var workoutsData = [] </script>
        <div>
          <p id="blue-text">Total Badges Unlocked</p>
        </div>
        <div class="col-md-11 col-md-push-1">
          <canvas id="totalbadges" width="210" height="280"></canvas>
          <div id="badges-legend" class="col-md-10 col-md-push-2"></div>
          {{ HTML::script('bower_components/chartjs/Chart.min.js') }}
          {{ HTML::script('js/charts/totalbadges.js') }}
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<script src="https://code.jquery.com/jquery.js"></script>
</div><!-- Ends from what is extened from templates.tabs-->
</div><!-- Ends from what is extened from templates.tabs-->
</body><!-- Ends from what is extened from templates.tabs-->
@stop