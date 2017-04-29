@extends('templates.home')

@section('content')
<div class="page-contents">
    <div class="login-signup">
        @section('signup-login-tabs')
        @include('partials._signup-login-tabs')
        @show
    </div>
</div>
@stop