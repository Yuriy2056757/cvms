<!DOCTYPE html>

<html lang="nl">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>CVMS - @yield('title', 'Default Title')</title>

    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset(mix('css/app.css')) }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset(mix('css/mdb.css')) }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset(mix('css/cvms/cvms.css')) }}">
    <link rel="stylesheet" type="text/css" media="screen" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body class="grey lighten-3">
    <div id="app">
      <div class="container-fluid mh-100">
        <div class="row mh-100">

          {{-- Side nav --}}
          <div id="sideNav" class="sidebar-nav col p-0 mh-100">
            <div class="card mh-100 rounded-0">
              <div class="card-body p-0 mh-100">
                <div id="sideNavLogo">
                  <h5>CVMS dashboard</h5>
                </div>

                <div class="sidenav-category">
                  <h5 class="sidenav-category-title">Category</h5>

                  <ul>
                    <li>
                      <a href="{{ route('home') }}">Home</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          {{-- Navbar --}}
          <div class="col p-0">
            <nav class="navbar navbar-expand-lg navbar-dark primary-color position-absolute w-100">
              <a class="navbar-brand" href="#">{{ ucfirst(Route::getCurrentRoute()->getName()) }}</a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                                                                                  aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true"
                                                                                                                aria-expanded="false">
                      <i class="fa fa-user"></i> placeholder@email.com
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                      <a class="dropdown-item" href="#">Mijn account</a>
                      <a class="dropdown-item" href="#">Uitloggen</a>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>

            <div class="container-fluid mh-100 offset-navigation">
              <div class="row mh-100 scrollable-panel">

                {{-- Page content --}}
                <div class="col">
                  @yield('content')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset(mix('js/app.js')) }}"></script>
  </body>

</html>
