@extends('templates.hub')

@section('main')
<section id="password-remind" class="section">
    <div class="container"><!--Holds the password reminder -->
        <div class="row"> <!--creates new row-->
            <div class="col-md-4 col-lg-push-4"> <!--Creates a 4 by something (out of 12) and is pushed my 4 sections to teh right-->
                <div class="logo logo-center"><!--Holds the logo and styles it -->
                    {{ HTML::image('img/logo.png') }}<!--pulls the logo via blade syntax-->
                </div>

                    <!--Opens the reminder form, creates and email field and the creates teh sumbit button. Throws an Error when needed-->
                {{ Form::open(['route' => 'remind', 'class' => 'section-form']) }} 
                    @if (Session::get('status'))
                        <div class="alert alert-success">{{ Session::get('status') }}</div>
                    @else
                        <div class="form-group">
                            {{ Form::label('email', 'Email', ['class' => 'control-label']) }}
                            {{ Form::email('email', Input::old('email'), ['class' => 'form-control']) }}

                            @if (Session::get('error'))
                                <div class="alert alert-warning">{{ Session::get('error') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            {{ Form::submit('Send Reminder', ['class' => 'btn btn-primary btn-block']) }}
                        </div>
                    @endif
                {{ Form::close() }}

            </div>
        </div>
    </div>
</section>

@stop