<!doctype html>
<html lang="en">
    <head>
        @section('meta')
            @include('partials/_meta')
        @show
    </head>
<body class="hub max-height padding-top">

<div class= "container max-height">
    <div class="container section-white-gray max-height">
        <div class="sideleft max-height">
            <div class="logo-hub">
                    <!--Add Logo here-->
                    <p class="logo">Vigor</p>
                    <!---->
            </div>
            <div class="profile-info">
                <div class="user-image">
                <!--Possibly put Vigor logo here 150px X 150px-->
                <!---->
                </div>
                <div class="rank">
                <!--Add User Rank Here-->
                <script> //var rankData = [] </script>
                <canvas id="rank" width="125" height="100"> Rank </canvas>
                {{ HTML::script('bower_components/chartjs/Chart.min.js') }}
                {{ HTML::script('js/charts/rank.js') }}

                
                <!---->
            </div>
            </div>
        <div class="btn-group-vertical max-width" role="group" aria-label="...">
            <a href="{{ route('day') }}" type="button" class="btn btn-default btn-sidebar">
                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
            <br>Day</a>
            <a href="{{ route('progress') }}" type="button" class="btn btn-default btn-sidebar">
                <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
            <br>Progress</a>
            <a href="{{ route('schedule') }}" type="button" class="btn btn-default btn-sidebar">
                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
            <br>Schedule</a>
            <a href="{{ route('badges') }}" type="button" class="btn btn-default btn-sidebar">
                <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
            <br>Badges</a>
            <a href="{{ route('contact') }}" type="button" class="btn btn-default btn-sidebar">
                <span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
            <br>FAQ</a>
        </div>
    </div>
    <div class="body">
        <div class="section-gray large-width">
        <!--Put Week chart here-->
                 
        <!---->
        </div>
        <div class="section-gray small-width">
            {{ link_to_route('profile.edit', 'Edit Profile') }} | <a href="#"> Settings </a> <p> | </p> <a href="#"> Log-out </a>
        </div>
        <div class= "btn-data max-width" role="group" aria-label="...">
            <button type="text" class="btn btn-default btn-data btn-no-hover">
                 Days Completed:
                <br>
                <!--Grab User Data-->
                <p>3</p>
                <!---->
            </button>
        </div>
        <div class= "btn-data max-width" role="group" aria-label="...">
            <button type="button" class="btn btn-default btn-data btn-no-hover">
                Sessions Completed:
                <br>
                 <!--Grab User Data-->
                 <p>5</p>
                 <!---->
            </button>
        </div>
        <div class= "btn-data max-width" role="group" aria-label="...">    
             <button type="button" class="btn btn-default btn-data btn-no-hover">
                Longest Sessions Streak:
                <br>
                 <!--Grab User Data-->
                 <p>2</p>
                 <!---->
            </button>
        </div>
        <div class= "btn-data max-width" role="group" aria-label="...">    
             <button type="button" class="btn btn-default btn-data btn-no-hover">
                 Total Minutes:
                 <br>
                 <!--Grab User Data-->
                  <p>3,600</p>
                  <!---->
            </button>
        
</div>
    </div>
</div>
    {{ HTML::script('bower_components/jquery/dist/jquery.min.js') }}
    {{ HTML::script('bower_components/typeahead.js/dist/typeahead.bundle.min.js')}}
    {{ HTML::script('js/tabs.js') }}
    {{ HTML::script('js/foods.js') }}
        @yield('main')

        @section('footer')
            @include('partials/_footer')
        @show
</html>
