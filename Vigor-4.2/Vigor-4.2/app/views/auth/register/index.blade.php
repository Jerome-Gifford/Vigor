@extends('templates.blank')

@section('main')
<section id="register" class="section"><!--Creates the register section-->
    <div class="container"> <!--Holds the register section-->
        <div class="row"> <!--Adds a new row-->
            <div class="col-md-4 col-lg-push-4"> <!--Creates a 4 by something ( total of 12) -->
                <div class="logo logo-center"> <!--Holds logo and styles it -->
                    {{ HTML::image('img/logo.png') }} <!--Pulls the logo via blade syntax-->
                </div>

                <!--Creates the for for register-->
                {{ Form::open(['route' => 'register', 'class' => 'register-form section-form']) }}

                <!--Creates the first name form -->
                <div class="form-group">
                    {{ Form::label('first_name', 'First Name', ['class' => 'control-label']) }}
                    {{ Form::text('first_name', Input::old('first_name'), ['class' => 'form-control']) }}
                    {{ $errors->first('first_name', '<div class="alert alert-warning">:message</div>') }}
                </div>

                <!--Creates the last name form -->
                <div class="form-group">
                    {{ Form::label('last_name', 'Last Name', ['class' => 'control-label']) }}
                    {{ Form::text('last_name', Input::old('last_name'), ['class' => 'form-control']) }}
                    {{ $errors->first('last_name', '<div class="alert alert-warning">:message</div>') }}
                </div>

                <!--Ask for an email and creates the form -->
                <div class="form-group">
                    {{ Form::label('email', 'Email', ['class' => 'control-label']) }}
                    {{ Form::email('email', Input::old('email'), ['class' => 'form-control']) }}
                    {{ $errors->first('email', '<div class="alert alert-warning">:message</div>') }}
                </div>

                <!--Creates the password form -->
                <div class="form-group">
                    {{ Form::label('password', 'Password', ['class' => 'control-label']) }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                    {{ $errors->first('password', '<div class="alert alert-warning">:message</div>') }}
                </div>

                <!--Creates the password confirmation and confirms that it matches-->
                <div class="form-group">
                    {{ Form::label('password_confirmation', 'Password Confirmation', ['class' => 'control-label']) }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                    {{ $errors->first('password_confirmation', '<div class="alert alert-warning">:message</div>') }}
                </div>

                <!--Creates the submit button-->
                <div class="form-group">
                    {{ Form::submit('Register', ['class' => 'btn btn-primary btn-block']) }}
                </div>

                <!--Ends the form-->
                {{ Form::close() }}
            </div>
        </div>
    </div>
</section>
@stop