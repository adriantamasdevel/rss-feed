<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/floating-labels.css')}}">


    <title>Adzooma - @yield('title')</title>
  </head>
  <body>

  <nav class="navbar sticky-top navbar-light bg-light box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a href="{{ route('dashboard') }}">RSS Feed</a></h5>
      <nav class="my-2 my-md-0 mr-md-3">
      @if (Auth::check())
        <a class="p-2 text-dark" href="{{ route('dashboard') }}">Dashboard</a>
        <a class="p-2 text-dark" href="{{ route('feeds') }}">My Feeds</a>
      @endif
       
      </nav>
      @if (Auth::check())
      <a class="btn btn-outline-primary" href="{{ route('logout') }}">Logout</a>
      @endif
     
  </nav>
  
    <div class="container">
            @yield('content')
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/main.js')}}"></script>
  </body>
</html>