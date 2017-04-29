<!doctype html> <!-- Basic page template with background image -->
<html lang="en" class="max-height">
    <head>
        @section('meta')
            @include('partials/_meta')
        @show
    </head>

    <body class="hub max-height">
        @show

        @yield('banner')

        @yield('main')

        @section('footer')
        @show
    </body>
</html>