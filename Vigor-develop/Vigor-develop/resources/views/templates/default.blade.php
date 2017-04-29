<!doctype html>
<html lang="en">
    <head>
        @section('meta')
            @include('partials._meta')
        @show
    </head>
    <body>
        @section('header')
            @include('partials._header')
        @show

        @yield('content')

        @section('footer')
            @include('partials._footer')
        @show
    </body>
</html>