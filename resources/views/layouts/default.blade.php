<!DOCTYPE html>
<html>
  <head>
    <title>@yield('title', '玖万科技')</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    @include('layouts._header');
    @include('layouts._navigation');

    <div class="container">
      @include('shared._messages');
      @yield('content')
      @include('layouts._footer');   
    </div> 
    <script src="/js/app.js"></script>  
  </body>
</html>
