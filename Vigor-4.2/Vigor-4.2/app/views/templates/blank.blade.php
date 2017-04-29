<!doctype html> <!-- empty page template -->
<html lang="en"> 
    <head>
        @section('meta')
            @include('partials/_meta')
        @show
    </head>

    <body class="blank">
        @yield('main')

        @yield('script')
    </body>
</html>