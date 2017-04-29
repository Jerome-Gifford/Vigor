<!doctype html>
<html lang="en">
<head>
  @section('meta')
  @include('partials/_meta')
  @show
</head>
<body class="hub padding-top max-height"> <!-- Added background image -->
  <div class="container"> <!-- Holds the rest of the page-->
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="col-md-2 no-padding-right no-padding-left">
          <div class="logo-hub"> <!-- Added small logo  -->
           <!--Add Logo here-->
           {{ HTML::image('img/Logo 100x50.png') }} <!-- pulls logo-->
           <!---->
         </div><!--Closes logo-hub-->
         <div class="sideleft max-height max-width"> <!-- creates sidebar -->
          <div class="user-image">
            <!--Pull user image and put here 150px X 150px-->
            {{ HTML::image('users/user/' . Auth::User()->id . '/profile/' . Auth::User()->profile_image, 'Upload a profile picture', ['width' => '100%', 'class' => 'img-round'])}} <!-- pulls user image -->
            <!---->
          </div><!--Closes user-image-->
          <div class="rank">
            <!--Add User Rank Here-->
            <div class="chart-wrapper">
              <script> var rankData=[{value:{{ UserRank::xpCalculator()}},color:"rgba(59, 103, 106, 0.2)"},{value:{{ UserRank::calcCalsBurned()}},color:"#3B676A"}];rankOptions={percentageInnerCutout:80}; 
             </script> <!-- holds rank chart data-->
             <canvas id="rank" width="180" height="100"> Rank </canvas> <!-- Creates the chart -->
             <div class="chart-inner-wrapper">
              <div class="chart-table"> <!-- Adds text to the middle  -->
                <div class="chart-cell">
                  <div id="bold-chart-text">Rank</div>  <!-- rank text -->
                  <div id="bold-chart-text"> {{ UserRank::rankCalculator() }} </div> <!-- pulls user rank -->
                </div>
              </div>
            </div>
          </div>
          <!---->
        </div><!--Closes rank height-auto-->
      </div><!--Closes sideleft max-height max-width-->
      <!-- All the tabs on the side -->
      <div class="btn-group-vertical max-width" role="group" aria-label="...">
        <a href="{{ route('day') }}" type="button" class="btn btn-default btn-sidebar">
          <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
          <br>Day</a>
          <a href="{{ route('progress') }}" type="button" class="btn btn-default btn-sidebar">
            <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
            <br>Progress</a>
            <a href="{{ route('leaderboard') }}" type="button" class="btn btn-default btn-sidebar">
              <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
              <br>Leaderboard</a>
              <a href="{{ route('badges') }}" type="button" class="btn btn-default btn-sidebar">
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                <br>Badges</a>
                <a href="{{ route('friends') }}" type="button" class="btn btn-default btn-sidebar">
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                  <br>Friends</a>
                  <a href="{{ route('contact') }}" type="button" class="btn btn-default btn-sidebar">
                    <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
                    <br>FAQ
                  </a>
                </div><!--Closes btn-group-vertical max-width-->
              </div><!--Closes col-md-2 no-padding-left no-padding-right-->
              <div class= "col-md-10 no-padding-left no-padding-right">
                <div class="section-gray large-width">
                  <!--Put Week chart here-->

                  <!---->
                </div><!--Closes section-gray large-width-->
                <div class="section-gray small-width a">
                  {{ link_to_route('profile.edit', 'Edit Profile') }}<p> | </p> {{ link_to_route('logout', 'Log-Out') }}
                </div><!--Closes section-gray small-width-->
              </div><!--Closes col-md-10 no-padding-left no-padding-right-->
            </div><!--Closes row-fluid-->
            <div class="row-fluid">
              <div class="col-md-2 no-padding-left no-padding-right">
                <div role="group" aria-label="...">
                  <button type="text" class="btn btn-default btn-data btn-no-hover">
                    Workouts<br> Completed:
                    <br>

                    <p>{{ BannerTabs::totalWorkouts()}}</p>
                    <!---->
                  </button>
                </div><!--Closes group-->
              </div><!--Closes col-md-2 no-padding-left no-padding-right-->
              <div class="col-md-1  no-padding-left no-padding-right">
                <div role="group" aria-label="...">
                  <button type="button" class="btn btn-default btn-data btn-no-hover">
                    Current <br> Weight
                    <br>
                    <!--Grab User Data-->
                    <p>{{ BannerTabs::currentWeight()}}</p>
                    <!---->
                  </button>
                </div><!--Closes group-->
              </div><!--Closes col-md-12 no-padding-left no-padding-right-->
              <div class="col-md-1  no-padding-left no-padding-right">
                <div role="group" aria-label="...">
                  <button type="button" class="btn btn-default btn-data btn-no-hover">
                    Goal <br> Weight
                    <br>
                    <p>{{ BannerTabs::goalWeight()}}</p>
                    <p>5</p>
                    <!---->
                  </button>
                </div><!--Closes group-->
              </div><!--Closes col-md-12 no-padding-left no-padding-right-->
              <div class="col-md-2  no-padding-left no-padding-right">
                <div role="group" aria-label="...">    
                  <button type="button" class="btn btn-default btn-data btn-no-hover">
                    Time Since Last<br> Workout:

                    <!--Grab User Data-->
                    <p id="last-workout-data-button">{{ BannerTabs::lastWorkout()}}</p>
                    <!---->
                  </button>
                </div><!--Closes group-->
              </div><!--Closes col-md-2 no-padding-left no-padding-right-->
              <div class="col-md-2 no-padding-left no-padding-right">
                <div role="group" aria-label="...">    
                  <button type="button" class="btn btn-default btn-data btn-no-hover">
                    Calories Ingested<br> Today:
                    <br>
                    <!--Grab User Data-->
                    <p>{{ BannerTabs::caloriesIngested()}}</p>
                    <!---->
                  </button>
                </div><!--Closes group-->
              </div><!--Closes col-md-2 no-padding-left no-padding-right-->
              <div class="col-md-2 no-padding-left no-padding-right">
                <div role="group" aria-label="...">    
                  <button type="button" class="btn btn-default btn-data btn-no-hover">
                    Calories Burned<br> Today:
                    <br>
                    <!--Grab User Data-->
                    <p>{{ BannerTabs::caloriesBurned()}}</p>
                    <!---->
                  </button>
                </div><!--Closes group-->
              </div><!--Closes col-md-2 no-padding-lrft no-padding-right-->
            </div><!--Closes row-fluid-->
            <div class="row-fluid col-md-10 no-padding-left no-padding-right">
              <div class= "section-white-gray chart-holder container-fluid full-width has-inner">
                <div id="tabmenu">
                  <div class="row row-no-gutter">
                    <div class="col-md-8 col-md-push-2">
                      <ul id="nav">
                        <li><a href="#" class="active">Add a Meal</a></li>
                        <li><a href="#">Record a Workout</a></li>
                      </ul>
                    </div><!--Closes col-md-8 col-md-push-2-->
                  </div><!--Closes row-->
                  <div id="tab-content">
                    <div id="addmeal" class="tab">
                      {{ Form::open(['route' => 'userfoods'])}}
                      <div class="row row-no-gutter">
                        <div class="col-md-8 col-md-push-2">
                          <div id="event-tracker inner">
                            <div class="row row-no-gutter">
                              <div class="col-md-12 no-padding-right">
                                <div class="form-food inner">
                                  <input type="text" class="form-control foods" placeholder="Meal Item..." name="food_name"/>
                                </div><!--Closes form-food inner-->
                              </div><!--Closes col-md-12 no-padding-right-->
                            </div><!--Closes row row-no-gutter-->
                            <div class="row row-no-gutter">
                              <div class="col-md-4">
                                <div class="form-servings inner">
                                  <input type="text" class="form-control" id="txt-servings" placeholder="Number of Servings..." name="food_servings"/>
                                </div><!--Closes form-servings inner-->
                              </div><!--Closes col-md-4-->
                              <div class="col-md-4 row-no-gutter">
                                <div class="form-calories inner">
                                  <input type="text" class="form-control" id="txt-calories" placeholder="Calories per Serving..." name="food_calories"/>
                                </div><!--Closes form-calories inner-->
                              </div><!--Closes col-md-4 row-no-gutter-->
                              <div class="col-md-4 row-no-gutter">
                                <div class="form-fat inner">
                                  <input type="text" class="form-control" id="txt-fat" placeholder="Grams of Fat..." name="food_fat"/>
                                </div><!--Closes form-fat inner-->
                              </div><!--Closes col-md-4 row-no-gutter-->
                            </div><!--Closes row row-no-gutter-->
                            <div class="row row-no-gutter">
                              <div class="col-md-4 row-no-gutter">
                                <div class="form-protein inner">
                                  <input type="text" class="form-control" id="txt-protein" placeholder="Grams of Protein..." name="food_protein"/>
                                </div><!--Closes form-protein inner-->
                              </div><!--Closes col-md-4-->
                              <div class="col-md-4 row-no-gutter">
                                <div class="form-carbs inner">
                                  <input type="text" class="form-control" id="txt-carbs" placeholder="Grams of Carbs..." name="food_carbs"/>
                                </div><!--Closes form-carbs inner-->
                              </div><!--Closes col-md-4 row-no-gutter-->
                              <div class="col-md-4 row-no-gutter">
                                <div class="form-food-type inner">
                                  <input type="text" class="form-control" id="txt-food-type" placeholder="Food Type..." name="food_type"/>
                                </div><!--Closes form-carbs inner-->
                              </div><!--Closes col-md-4 row-no-gutter-->

                              </div><!--Closes row row-no-gutter-->
                              <div class="row row-no-gutter">
                                <div class="col-md-8">
                                  {{ Form::submit('Add Meal', ['class' => 'btn btn-primary blue-button'])}}
                                </div><!--Closes col-md-8-->
                              </div><!--Closes row-no-gutter-->
                            </div><!--Closes event-tracker inner-->
                          </div><!--Closes col-md-8 col-md-push-2-->
                        </div><!--Closes row row-no-gutter-->
                        {{ Form::close() }}
                      </div><!--Closes addmeal tab-->
                      <div id="recordworkout" class="tab">
                        {{ Form::open(['route' => 'useractivity'])}}
                        <div class="row row-no-gutter">
                          <div class="col-md-8 col-md-push-2">
                            <div id="event-tracker inner">
                              <div class="row row-no-gutter">
                                <div class="col-md-12">
                                  <div class="form-activity inner">
                                    <input type="text" class="form-control activities" id="txt-activity" placeholder="Walk, Basketball, Yoga..." name="workout_activity"/>
                                  </div><!--Closes form-activity inner-->

                                  {{ $errors->first('workout_activity', '<div class="alert alert-danger">:message</div>') }}
                                </div><!--Closes col-md-12-->
                              </div><!--Closes row row-no-gutter-->
                              <div class="row row-no-gutter">
                                <div class="col-md-6 row-no-gutter">
                                  <div class="form-at inner">
                                    {{ Form::text('workout_at', Input::old('workout_at'), ['class' => 'form-control', 'placeholder' => 'Time Started...']) }}
                                  </div><!--Closes form-at inner-->
                                  {{ $errors->first('workout_at', '<div class="alert alert-danger">:message</div>') }}

                                </div><!--Closes col-md-4 row-no-gutter-->
                                <div class="col-md-6 row-no-gutter">
                                  <div class="form-for inner">
                                    {{ Form::text('workout_length', Input::old('workout_length'), ['class' => 'form-control', 'placeholder' => 'Length In Minutes...']) }}
                                  </div><!--Closes for-for inner-->
                                  {{ $errors->first('workout_length', '<div class="alert alert-danger">:message</div>') }}

                                </div><!--Closes col-md-4 row-no-gutter-->
                              </div><!--Closes event-tracker inner-->
                              <div class="row row-no-gutter">
                                <div class="col-md-12">
                                  <div class="form-comment inner">
                                    {{ Form::text('workout_comment', Input::old('workout_comment'), ['class' => 'form-control', 'placeholder' => 'Add A Comment...']) }}
                                    <!-- <input type="text" class="form-control" placeholder="Add A Comment..." name="workout_comment"/> -->
                                  </div><!--Closes form-comment inner-->
                                  {{ $errors->first('workout_comment', '<div class="alert alert-danger">:message</div>') }}
                                </div><!--Closes col-md-12-->
                              </div><!--Closes row row-no-gutter-->
                              <div class="row row-no-gutter">
                                <div class="col-md-8">
                                  {{ Form::submit('Add Workout', ['class' => 'btn btn-primary blue-button'])}}
                                </div><!--Closes col-md-8-->
                              </div><!--Closes row row-no-gutter-->
                            </div><!--Closes col-md-8 col-md-push-2-->
                          </div><!--Closes row row-no-gutter-->
                        </div><!--Closes recordworkout tab-->
                        {{ Form::close() }}
                      </div><!--Closes tab-content-->
                    </div><!--Closes tab_menu-->
                  </div><!--Closes section-white-gray chart-holder container-fluid full-width has-inner-->
                </div><!--Closes row-fluid col-md-10 no-padding-left no-padding-right-->



                {{ HTML::script('bower_components/jquery/dist/jquery.min.js') }}
                {{ HTML::script('bower_components/typeahead.js/dist/typeahead.bundle.min.js')}}
                {{ HTML::script('bower_components/chartjs/Chart.min.js') }}
                {{ HTML::script('js/charts/rank.js') }}
                {{ HTML::script('js/tabs.js') }}
                {{ HTML::script('js/foods.js') }}
                {{ HTML::script('js/dropdown.js') }}


                @yield('main')

                @section('footer')
                @include('partials/_footer')
                @show
              </body>
              </html>
