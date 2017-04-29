@extends('templates.tabs')

@section('main')
<!--extened from templates.tabs-->
  <!--extened from templates.tabs-->
    <!--extened from templates.tabs-->
        <div class="row-fluid col-md-12 no-padding-right no-padding-left section-white-gray max-height"> <!-- Creates new row with no padding and white/gray background -->
            <div class="tab-section-divider-gray max-width clear-right"> <!-- Holds the header-->
                <p>Edit or Update Your Profile</p>
            </div>
            <div class="row-fluid col-md-12 section-white-gray">
            <br>
                <div class="row row-no-gutter">
                    <div class="col-md-12"> <!-- created the area for profile update -->
                        @if (Session::has('success'))
                        <div class="alert alert-success">Profile Updated!</div>
                        @endif 
                        <!-- creates the fields -->
                            {{ $errors->first('email', '<div class="alert alert-danger">:message</div>') }}
                            {{ $errors->first('password', '<div class="alert alert-danger">:message</div>') }}
                            {{ $errors->first('first_name', '<div class="alert alert-danger">:message</div>') }}
                            {{ $errors->first('last_name', '<div class="alert alert-danger">:message</div>') }}
                            {{ $errors->first('calorie_count', '<div class="alert alert-danger">:message</div>') }}
                            {{ $errors->first('current_bmi', '<div class="alert alert-danger">:message</div>') }}
                            {{ $errors->first('current_weight', '<div class="alert alert-danger">:message</div>') }}
                            {{ $errors->first('goal_weight', '<div class="alert alert-danger">:message</div>') }}
                    </div>
                </div>

                <div class="row row-no-gutter">
                    <div class="col-md-6">
                    <div class="profile-centered">
                        <div class="userimg"> <!-- holds profile image -->
                            {{ HTML::image('users/user/' . Auth::user()->id . '/profile/' . Auth::user()->profile_image, 'Profile Image', ['width' => '100%']) }} <!-- pulls user profile image -->
            
                            <div class="updateimg">
                            {{ Form::open(['route' => 'profile.upload.file', 'files' => true]) }} <!-- adds open file-->
                                <div class="controls">
                                {{ Form::file('image') }} 
                                {{ Form::submit('Submit', array('class'=>'send-btn')) }} <!-- Adds submit button -->
                                </div>

                             <div id="success"> </div> <!-- throws errors -->
                                 <p class="errors">{{$errors->first('image')}}</p>
                                 @if(Session::has('error'))
                                 <p class="errors">{{ Session::get('error') }}</p>
                                @endif
                             {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                        {{ Form::model($user, ['route' => 'profile.update', 'method' => 'patch']) }}

                            <div class="form-group-profile"> <!-- email field  -->
                                {{ Form::label('email', 'Email:', ['class' => 'control-label']) }}
                                {{ Form::text('email', Input::old('email'), ['class' => 'form-control']) }}
                                {{ $errors->first('email', '<div class="alert alert-danger">:message</div>') }}
                            </div>

                            <div class="form-group-profile"> <!-- password field -->
                                {{ Form::label('password', 'Password:', ['class' => 'control-label']) }}
                                {{ Form::password('password', ['class' => 'form-control']) }}
                                {{ $errors->first('password', '<div class="alert alert-danger">:message</div>') }}
                            </div>

                            <div class="form-group-profile"> <!-- first name field -->
                                {{ Form::label('first_name', 'First Name:', ['class' => 'control-label']) }}
                                {{ Form::text('first_name', Input::old('first_name'), ['class' => 'form-control']) }}
                                {{ $errors->first('first_name', '<div class="alert alert-danger">:message</div>') }}
                            </div>


                            <div class="form-group-profile"> <!-- last name field -->
                                {{ Form::label('last_name', 'Last Name:', ['class' => 'control-label']) }}
                                {{ Form::text('last_name', Input::old('last_name'), ['class' => 'form-control']) }}
                                {{ $errors->first('last_name', '<div class="alert alert-danger">:message</div>') }}
                            </div>

                            <div class="form-group-profile"> <!-- cals field -->
                                {{ Form::label('calorie_count', 'Calorie Count:', ['class' => 'control-label']) }}
                                {{ Form::text('calorie_count', Input::old('calorie_count'), ['class' => 'form-control']) }}
                                {{ $errors->first('calorie_count', '<div class="alert alert-danger">:message</div>') }}
                            </div>

                            <div class="form-group-profile"> <!-- bmi field -->
                                {{ Form::label('current_bmi', 'Current BMI:', ['class' => 'control-label']) }}
                                {{ Form::text('current_bmi', Input::old('current_bmi'), ['class' => 'form-control']) }}
                                {{ $errors->first('cureent_bmi', '<div class="alert alert-danger">:message</div>') }}
                            </div>
 
                            <div class="form-group-profile"> <!-- current weigth field  -->
                                {{ Form::label('current_weight', 'Current Weight:', ['class' => 'control-label']) }}
                                {{ Form::text('current_weight', Input::old('current_weight'), ['class' => 'form-control']) }}
                                {{ $errors->first('current_weight', '<div class="alert alert-danger">:message</div>') }}
                            </div>

                            <div class="form-group-profile"> <!-- goal weight field  -->
                                {{ Form::label('goal_weight', 'Goal Weight:', ['class' => 'control-label']) }}
                                {{ Form::text('goal_weight', Input::old('goal_weight'), ['class' => 'form-control']) }}
                                {{ $errors->first('goal_weight', '<div class="alert alert-danger">:message</div>') }}
                            </div>

                            <div class="form-group-profile"> <!-- update button  -->
                                {{ Form::submit('Update Profile!', ['class' => 'btn btn-primary']) }}
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                <br>
                

                <style>
                .userimg {
                    background: #000000;
                    width: 250px;
                    height: 250px;
                    float: left;
                }
                .updateimg {
                    width: 250px;
                    height: 50px;
                    text-align: center;
                    background: #e6e6e6;
                    position: relative;
                    top: -50px;
                    opacity: 0.75;
                }
                .controls {
                    width: 250px;
                    padding: 2px 25px;
                }
                </style>




                </div>
            </div>
</div><!-- Ends from what is extened from templates.tabs-->
</div><!-- Ends from what is extened from templates.tabs-->
</body><!-- Ends from what is extened from templates.tabs-->
@stop