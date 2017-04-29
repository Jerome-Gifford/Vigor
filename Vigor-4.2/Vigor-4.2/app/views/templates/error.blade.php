<!doctype html> <!-- provides the tempate for the error page -->
<html lang="en" class="max-height">
    <head>
        @section('meta')
            @include('partials/_meta')
        @show
    </head>

    <body class="error max-height">
        @show

        @yield('banner')

        @yield('main')

        @section('footer')
        @show
    </body>
</html>