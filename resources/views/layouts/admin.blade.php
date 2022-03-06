<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Coupon Crush</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

</head>
<body class="g-sidenav-show bg-gray-200 container">
  <div class="row"> 
    <div class="col-xs-6 myNav">
      @include('layouts.inc.sidebar')
    </div>
    <div class="col-xs-6 content">
      <ol>
          <li>
              @yield('content')
              </div>
            </div>
          </li>
        </ol>
    </div>
  </div>
    
    <script src="{{ asset('admin\js\popper.min.js') }}" defer></script>
    <script src="{{ asset('admin\js\bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('admin\js\perfect-scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('admin\js\smooth-scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('admin\js\bootstrap.bundle.min.js') }}" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      var win = navigator.platform.indexOf("Win") > -1;
      if (win && document.querySelector("#sidenav-scrollbar")) {
        var options = {
          damping: "0.5",
        };
        Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
    @yield('scripts')
    @if(session('status'))
      <script>
        swal("{{ session('status') }}")
      </script>
    @endif
    

</body>
</html>
''