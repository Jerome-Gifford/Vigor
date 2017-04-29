@extends('templates.tabs')

@section('main')
   <div class="tab-section-divider-gray max-width clear-right">
    <p>Edit or Update Your Profile</p>
    </div>
                @if (Session::has('success'))
                    <div class="alert alert-success">Profile Updated!</div>
                @endif

            
                {{ Form::open(array('url'=>'apply/upload','method'=>'POST', 'files'=>true)) }}
                    <div class="control-group">
                    <div class="controls">
                    {{ Form::file('image') }}
                 <p class="errors">{{$errors->first('image')}}</p>
                 @if(Session::has('error'))
                    <p class="errors">{{ Session::get('error') }}</p>
                         @endif
                    </div>
                    </div>
                    <div id="success"> </div>
                  {{ Form::submit('Submit', array('class'=>'send-btn')) }}
                   {{ Form::close() }}

</div>
@stop