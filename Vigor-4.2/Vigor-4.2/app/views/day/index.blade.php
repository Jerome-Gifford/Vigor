
@extends('templates.tabs')

@section('main')
  <!--extened from templates.tabs-->
  <!--extened from templates.tabs-->
  <!--extened from templates.tabs-->
  <div class="row-fluid col-md-12 no-padding-right no-padding-left section-white-gray max-height"> <!--Creates a new row with no padding that is gray/white -->
    <div class="tab-section-divider-gray max-width clear-right"> <!-- holds the header  -->
      <p>Day: View your past Activities and Post</p>
    </div>
    <div class="tab-section-divider-white max-width clear-right">
      <!--Pull The Date-->
      <?php 
        echo date ("l, F j")
      ?>
      <!---->
      <!--Pull The Users Week Number-->
      <span class="glyphicon glyphicon-time" id="week-span" aria-hidden="true"></span>
      <p id= "week">Week 10</p>
      <!---->
    </div>
    <br>
    <!--This is the User feed. Based on DB pull wither image for session, post, graph, achievement-->
    <!--These are examples for design-->
    <div class="feed">
       <!--Making post-->
      <div class="row row-no-gutter">
        <div class="col-md-8 col-md-push-2">
          <div id="event-tracker inner">
            {{ Form::open(['route' => 'userpost'])}}
            <div class="row row-no-gutter">
              <div class="col-md-12">
                <div class="form-post inner">
                  <input type="text" class="form-control" placeholder="Whats on your mind?..." name="postcomment"/>
                </div>
              </div>
            </div>
            <div class="row row-no-gutter">
              <div class="col-md-12">
                <div class="form-image inner">
                  <input type="text" class="form-control" placeholder="Image url..." name="postimage"/>
                </div>
                <div class="form-video inner">
                  <input type="text" class="form-control" placeholder="Video url..." name="postvideo"/>
                </div>
                <div class="post_button">
                  {{ Form::submit('Post', ['class' => 'btn btn-primary blue-button'])}}
                </div>
              </div>
            </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>

      <!--Post-->
      <!--Do to time constraints this portion of the web app does not pull with data, but was left in as static to show what it would look like
      when it was finished. This will work in the future of Vigor (lines 60 through 109)-->
      <div class="row">
        <div class="col-md-6">
          <div class="bubble bubble-friend clear-right">
            <!--Pull the Users Time Here-->
            <p id="time-stamp-friend"><span class="glyphicon glyphicon-time friend-push"aria-hidden="true" id="inline"></span>10:58am</p>
            <!---->
            <div class= "col-md-4"><img class="friend-img"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTI20cmxnX0Au8c_uHRDU42nMPEJyfd9Nx76jIanyQB9CfYnhoDgg"></div>
            <!--Pull the Users Comment Here-->
            <p id="post" class="col-md-8"> This is the users post. Lets talk about fitness.....</p>
            <!---->
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-md-push-6">
          <div class="bubble bubble-user clear-right">
            <!--Pull the Users Time Here-->
            <p id="time-stamp-user">10:58am <span class="glyphicon glyphicon-time user-push"aria-hidden="true"></span></p>
            <!---->
            <!--Pull the Users Comment Here-->
            <p id="post" class="col-md-8"> This is the users post. Lets talk about fitness.....</p>
            <!---->
            <div class= "col-md-4"><img class="user-img"src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTI20cmxnX0Au8c_uHRDU42nMPEJyfd9Nx76jIanyQB9CfYnhoDgg"></div>
          </div>
        </div>
      </div>
    </div>
    <!--Session Post -->
    <div class="row row-no-gutter">
      <div class="col-md-12 max-width">
        <img class="sessions-image clear-right" src="img/hiking2.jpg" width="95%" height="95%">
      </div>
    </div>
    <!---->
    <!--Badges Post-->
    <div class="row row-no-gutter">
      <div class= "col-md-8 col-md-push-4">
        <div class= "badge-feed-holder">
          <div class="row">
            <p> Badge Unlocked:</p>
            <p id="feed-badge-name"> GOAL WEIGHT </p>
          </div>
          <div class="row">
            <div class= "clear-right col-md-12 col-md-push-3 badge-display">
              {{ HTML::image('img/Goal Weight.png') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div><!-- Ends from what is extened from templates.tabs-->
</div><!-- Ends from what is extened from templates.tabs-->
</body><!-- Ends from what is extened from templates.tabs-->

@stop