@extends('templates.blank')

@section('main')
<section id="password-reset" class="section"><!--Creates password reset area -->
    <div class="container"> <!--Holds the password reset -->
        <div class="row"> <!-- Creates a new row-->
            <div class="col-md-4 col-lg-push-4"> <!-- Creates a 4 by something (by 12 total) and then pushes it to teh right 4-->
                <div class="logo logo-center"><!--Hold the logo and styles it when needed -->
                    {{ HTML::image('img/logo.png') }}<!--Pulls the logo via blade syntax-->
                </div>

                <!--Creates the form and allows for a reset. -->
                {{ Form::open(['route' => 'reset', 'class' => 'section-form']) }}
                {{ Form::hidden('token', $token) }}

                <!--Ask for email-->
                <div class="form-group">
                    {{ Form::label('email', 'Email', ['class' => 'control-label']) }}
                    {{ Form::email('email', Input::old('email'), ['class' => 'form-control']) }}
                    {{ $errors->first('email', '<div class="alert alert-warning">:message</div>') }}
                </div>
                
                <!--Ask for new password-->
                <div class="form-group">
                    {{ Form::label('password', 'Password', ['class' => 'control-label']) }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                    {{ $errors->first('password', '<div class="alert alert-warning">:message</div>') }}
                </div>

                <!--Confirms new password-->
                <div class="form-group">
                    {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'control-label']) }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                    {{ $errors->first('password_confirmation', '<div class="alert alert-warning">:message</div>') }}
                </div>

                <!--Submits request-->
                <div class="form-group">
                    {{ Form::submit('Reset Password', ['class' => 'btn btn-primary btn-block']) }}
                </div>
            </div>
        </div>
    </div>
</section>
@stop