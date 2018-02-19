<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    <!-- Styles -->
    <link href="{{ mix('/css/vendor.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @yield('custom-css')

  </head>
  <body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
          <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              @guest
              <li class="nav-item {{ URL::current() == route('login') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('login') }}">Login <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item {{ URL::current() == route('register') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
              </li>
              @else
                @include('layouts.nav')
              <li class="nav-item dropdown {{ URL::current() == route('users.index') ? 'active' : '' }}">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('users.index') }}">Admin</a>
                  <a href="{{ route('logout') }}"
                     class="dropdown-item"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      Logout
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                </div>
              </li>
              @endguest
            </ul>
          </div>
        </nav>

        <div class="body">
            @include('layouts.errors')
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
    @yield('custom-js')
</body>
</html>
