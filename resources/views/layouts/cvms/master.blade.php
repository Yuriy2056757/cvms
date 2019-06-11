<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>CVMS - @yield('title', 'No title found')</title>

  {{-- Disallow robots --}}
  <meta name="robots" content="noindex, nofollow">

  {{-- CSRF token --}}
  <meta name="csrf-token" content="{{ csrf_token() }}">

  {{-- Styles --}}
  <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/cvms/mdb-bootstrap.css')) }}">
  <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/cvms/mdb.css')) }}">
  <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/cvms/custom.css')) }}">
  <link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="grey lighten-3">
  <div id="app">
    <div class="container-fluid mh-100">
      <div class="row mh-100">

        {{-- Side nav --}}
        <div id="sideNav" class="d-lg-block sidebar-nav col p-0 mh-100">
          <div class="card mh-100 rounded-0">
            <div class="card-body p-0 mh-100">
              <div id="sideNavLogo">
                <h5>CVMS DASHBOARD</h5>
              </div>

              <div class="sidenav-category">
                <p class="sidenav-category-title">GENERAL</p>

                <ul>
                  <li>
                    <a href="{{ route('home') }}">Home</a>
                  </li>
                </ul>
              </div>

              <div class="sidenav-category">
                <p class="sidenav-category-title">CONTENT</p>

                <ul>
                  <li>
                    <a href="{{ route('articles.index') }}">Articles</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        {{-- Navbar --}}
        <div class="col p-0">
          <nav class="navbar navbar-expand-lg navbar-dark color-default position-absolute w-100">
            <div id="hamburgerContainer" class="text-center h-100 rounded waves-effect waves-light">
              <span id="hamburger" class="navbar-toggler-icon"></span>
            </div>

            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link rounded" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}

                  @if (Auth::user()->image)
                    <img
                      width="40"
                      height="40"
                      src="{{ asset('storage/' . Auth::user()->image) }}"
                      alt="Image"
                      class="rounded-circle img-fluid"
                    >
                  @else
                    <img
                      width="40"
                      height="40"
                      src="http://lorempixel.com/256/256/"
                      alt="Image"
                      class="rounded-circle img-fluid"
                    >
                  @endif
                </a>

                <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>

                  <a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">Profile</a>

                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                </div>
              </li>
            </ul>
          </nav>

          {{-- Page content --}}
          <div class="container-fluid mh-100 offset-navigation">
            <div class="row mh-100 scrollable-panel">
              <div class="col content-section pb-5">
                {{ Breadcrumbs::render() }}

                @yield('content')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Scripts --}}
  <script src="{{ asset(mix('js/cvms/cvms.js')) }}"></script>
  <script src="{{ asset(mix('js/cvms/custom.js')) }}"></script>
</body>

</html>
