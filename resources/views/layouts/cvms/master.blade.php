<!DOCTYPE html>

<html lang="en">

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
                <span id="hamburger" class="navbar-toggler-icon rounded waves-effect waves-light"></span>

                <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle rounded" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true"
                                                                                                             aria-expanded="false">
                      <i class="fa fa-user"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                      <a class="dropdown-item" href="#">My account</a>
                      <a class="dropdown-item" href="#">Logout</a>
                    </div>
                  </li>
                </ul>
            </nav>

            <div class="container-fluid mh-100 offset-navigation">
              <div class="row mh-100 scrollable-panel">

                {{-- Page content --}}
                <div class="col">
                  <div class="card m-1 mt-3">
                    <div class="card-body">
                      <div class="page-section">
                        <h3 class="page-section-header">@yield('header_title')</h3>
                        @yield('content')
                      </div>
                    </div>
                  </div>
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
