<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  {{-- SEO title --}}
  <title>@yield('title', 'CVMS')</title>

  {{-- SEO description --}}
  <meta name="description" content="@yield('description', 'Curriculum Vitae Management System')">

  {{-- Robots --}}
  <meta name="robots" content="@yield('robots', 'noindex, nofollow')">

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

        {{-- Page content --}}
        <div class="container-fluid mh-100 offset-navigation">
          <div class="row mh-100 scrollable-panel">
            <div class="col content-section pb-5">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Scripts --}}
  <script src="{{ asset(mix('js/cvms/cvms.js')) }}"></script>
</body>

</html>
