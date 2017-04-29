<!doctype html>
<html lang="en">
<head>
  @section('meta')
  @include('partials._meta')
  @show
</head>
<body>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-1 no-padding-right no-padding-left no-margin-right no-margin-left blue-gradient max-height">
        <div class="col-md-12">
          <div class="col-md-6">
            @section('nav')
            @include('partials._nav')
            @show
          </div>
        </div>
      </div>
      <div class="col-md-2 no-padding-right no-padding-left no-margin-right no-margin-left drk-blue-gradient user-info">
        <div class="container-fluid">
          <div class="container-fluid">
            <div class="container-fluid">
            @section('sidebar')
            @include('partials._friends')
            @show
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-7 no-padding-right no-padding-left no-margin-right no-margin-left max-height">
        @yield('content')
      </div>
      <div class="col-md-2 no-padding-right no-padding-left no-margin-right no-margin-left feed">
        @section('feed')
        @include('partials._feed')
        @show
      </div>
    </div>
    <div class="row">
      @section('footer')
      @include('partials._footer')
      @show
    </div>
  </div>
  <script src="/js/jQuery/dist/jquery.js"></script>
  <script src="/js/messenger.js"></script>
</body>
</html>