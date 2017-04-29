@extends('templates.hub')

@section('main')
<!--Creating the log in area-->
<section id="login" class="section">
    <div class="container"> <!--Holds the log in-->
        <div class="row"><!--starts a new row-->
            <div class="col-md-4 col-lg-push-4"><!--divides the row into a 4 by something (out of 12) and pushes the 4 wide section over 4 sections-->
                <div class="logo logo-center"><!--Div to hold the logo and give it styling -->
                    {{ HTML::image('img/logo.png') }} <!--Pulls imgage via blade php syntax-->
                </div><!--Closes Log Holder-->

                {{ Form::open(['route' => 'login', 'class' => 'section-form']) }} <!--Starts the log in form-->

                <div class="form-group"> <!--User email goes here and is verified by the account-->
                    {{ Form::label('email', 'Email', ['class' => 'control-label']) }} 
                    {{ Form::email('email', Input::old('email'), ['class' => 'form-control']) }}
                    {{ $errors->first('email', '<div class="alert alert-warning">:message</div>') }}
                </div><!--Closes the email form-->

                <div class="form-group"> <!--User password goes here and is verified by the account-->
                    {{ Form::label('password', 'Password', ['class' => 'control-label']) }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                    {{ $errors->first('password', '<div class="alert alert-warning">:message</div>') }}
                </div><!--Closes the password form -->

                <div class="form-group"> <!--Creates the remember me text area and adds the redirect-->
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('remember_me', Input::old('remember_me'), true) }} Remember me
                        </label>
                    </div>
                </div><!--Closes the remember me section -->

                <div class="form-group"> <!--Creates the log in button and the submit function-->
                    {{ Form::submit('Login', ['class' => 'btn btn-primary btn-block']) }}
                </div><!--Closes the log in button section-->

                {{ $errors->first('invalid', '<div class="alert alert-warning">:message</div>') }} <!--Displays an invalid error-->

                {{ Form::close() }} <!--Closes the form-->

                <div class="login-forgot"> <!--Creates the Forgot log in section and links the redirect-->
                    {{ link_to_route('remind', 'Forgot login details?', null, ['class' => 'btn-small btn-link']) }}
                </div>
            </div>
        </div>
    </div>
</section>
@stop