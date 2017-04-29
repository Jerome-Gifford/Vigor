<!doctype html> <!-- provides basic page template-->
<html lang="en">
    <head>
        @section('meta')
            @include('partials/_meta')
        @show
    </head>

    <body class="app">
       {{-- @section('header')
            @include('partials/_header')
        @show--}}

        @yield('banner')

        @yield('main')

        @section('footer')
            @include('partials/_footer')
        @show
    </body>
</html>