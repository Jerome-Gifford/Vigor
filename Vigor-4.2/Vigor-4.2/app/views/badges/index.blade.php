
@extends('templates.tabs')


@section('main')

<div class="row-fluid col-md-12 no-padding-right no-padding-left section-white-gray"> <!--Creates a new row with a width of 12 and no padding. Also addes a gradient background-->
  <div class="tab-section-divider-gray max-width clear-right"> <!-- Creates the text title holder-->
    <p>Badges: View Your Milestones and Upcoming Milestones</p>
  </div>
  <br> <!--line break -->
  <div id="badge-tab-menu no-padding-left"> <!--Created the tabs -->
    <ul id="badge-nav">
      <div class="col-md-6"> <!--Gives the tab a width of 6 out of 12-->
        <li><a href="#" class="active">Fitness</a></li>
      </div>
      <div class="col-md-6 "><!--Gives teh tab a width of 6 out of 12-->
        <li><a href="#">Nutrition</a></li>
      </div>
    </ul>
  </div><!--Closes col-md-8 col-md-push-2-->
  <div id="badge-tab-content"> <!--creates the tab conent holder-->
    <div id="fitness" class="badges-tab"> <!--holds the fitness tab-->
      <div class="row row-no-gutter padding-right padding-left">
        <div class="col-md-12"> <!--gives max width (same for the rest of the sections below in the fitness and nutrition id)-->
          <div class="row"> <!-- creates a new row (same for the rest of the sections below in the fitness and nutrition id)-->
            <div class="col-md-2"> <!--gives a width of 2 out of 12 (same for the rest of the sections below in the fitness and nutrition id)-->
              <div class= "clear-right section-light-blue col-md-4 badges"> <!--Creates the light blue background behind the badges (same for the rest of the sections below in the fitness and nutrition id)-->
                <div id="fade" width="100%"> 
                  {{ HTML::image(Badge::unlockedFlag(1))}} <!--Pulls the bades picture (same for the rest of the sections below in the fitness and nutrition id)-->
                </div>
                <p id="vanish">Goal Weight</p> <!--Badge Name (same for the rest of the sections below in the fitness and nutrition id) -->
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Achieve your goal weight</p> <!--Badge description (same for the rest of the sections below in the fitness and nutrition id) -->
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(2))}}
                </div>
                <p id="vanish">Session Streak</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Log 5 sessions on 5 consecutive days </p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(3))}}
                </div>
                <p id="vanish">Becoming Fit</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Log your first session</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(4))}}
                </div>
                <p id="vanish">My Routine</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Log the same routine 20 times</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(5))}}
                </div>
                <p id="vanish">Back in action</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Log a session after missing at least one week of workouts</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(6))}}
                </div>
                <p id="vanish">Dedication</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Log at least 1 workout for 7 consecutive days</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row row-no-gutter row-no-gutter padding-right padding-left">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(7))}}
                </div>
                <p id="vanish">Results</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Record weight loss 5 times</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(8))}}
                </div>
                <p id="vanish">Consistent </p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Workout for 5 hours a week for 2 weeks</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(9))}}
                </div>
                <p id="vanish">Change</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Log 10 different kinds of workouts</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(10))}}
                </div>
                <p id="vanish">Farther</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Beat your longest run (After recording 30 sessions)</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(11))}}
                </div>
                <p id="vanish">200 hours</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Record 200 hours of workouts</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(12))}}
                </div>
                <p id="vanish">1000 hours</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Record 1000 hours of workouts</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="nutrition" class="badges-tab"> <!--Created the holder for the nutrition content -->
      <div class="row row-no-gutter padding-right padding-left">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(13))}}
                </div>
                <p id="vanish">Maintain Diet</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Stay under your max calorie intake for 14 days</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(14))}}
                </div>
                <p id="vanish">Eat less</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Record a drop in your calorie intake 5 times</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(15))}}
                </div>
                <p id="vanish">Balance</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Eat an assortment of foods</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(16))}}
                </div>
                <p id="vanish">Less Fat</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Take in less than 75g of fat a day</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(17))}}
                </div>
                <p id="vanish">Good BMI</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Have  A BMI in the 18.5-24.9 range</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(18))}}
                </div>
                <p id="vanish">Fruits & Veggies</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Eat 5 or more servings of fruits and vegetables in a day</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row row-no-gutter padding-right padding-left">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(19))}}
                </div>
                <p id="vanish">Variety</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Eat a new kind of meal once a week for 10 weeks</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(20))}}
                </div>
                <p id="vanish">Meatless</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Eat a meal with no meat (At least 5 times)</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(21))}}
                </div>
                <p id="vanish">The Daily Goal</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Eat 2000 or less calories for a whole week</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(22))}}
                </div>
                <p id="vanish">Eating healthy</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Eat no processed foods for the whole day</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(23))}}
                </div>
                <p id="vanish">Pyramid Master</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Eat equal to the food pyramid for a whole week</p>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class= "clear-right section-light-blue col-md-4 badges">
                <div id="fade" width="100%">
                  {{ HTML::image(Badge::unlockedFlag(24))}}
                </div>
                <p id="vanish">Fishy</p>
                <div class= "clear-right section-light-blue col-md-4 badges overlay">
                  <p>Eat three different types of fish.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    {{ HTML::script('bower_components/jquery/dist/jquery.min.js') }}
    {{ HTML::script('js/badges.js') }}

  </body><!-- Ends from what is extened from templates.tabs-->
  @stop