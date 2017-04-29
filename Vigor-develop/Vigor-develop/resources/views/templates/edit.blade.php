<!doctype html>
<html lang="en">
<head>
  @section('meta')
  @include('partials._meta')
  @show
</head>
<body class="body-vh max-vw">
<div class="five-vw max-height float-left blue-gradient">
        @include('partials._nav')
      </div>
      <div class="fifteen-vw max-height float-left drk-blue-gradient">
        @include('partials._userimg')
        @include('partials._userinfo')
      </div>
      <div class="seventy-vw max-height float-left">
        @yield('content')
      </div>
      <div class="ten-vw yellow max-height float-left">
        @include('partials._feed')
      </div>
</body>
</html>