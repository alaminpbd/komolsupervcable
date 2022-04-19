<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <link href=" {{ asset('img/logo/logonew.png') }} " rel="icon"> --}}
    <title> Bill Collection </title>
    <link href="{{ asset('vendor/fontawesome-5.13/css/all.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('vendor/bootstrap-4.5.0/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ asset('css/admin-style.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('vendor/jquery-ui-themes/jquery-ui.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/style.css') }} ">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- left Sidebar -->
    @include('backend.partials.left_sidebar')

    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

        <!-- TopBar -->
        @include('backend.partials.nav')
        <!-- Topbar -->

        <!-- Main panels -->
            @yield('content')
        <!--- Main panels -->

      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script>
              <b><a href="#" target="_blank">কমল সুপার ক্যাবল নেটওয়ার্ক</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src=" {{ asset('vendor/jquery/jquery.min.js') }} "></script>
  <script src=" {{ asset('vendor/bootstrap-4.5.0/js/bootstrap.bundle.min.js') }} "></script>
  <script src=" {{ asset('vendor/jquery-easing/jquery.easing.min.js') }} "></script>
  <script src=" {{ asset('vendor/chart.js/Chart.min.js') }} "></script>
  <script src=" {{ asset('js/admin.min.js') }} "></script>
  <script src=" {{ asset('js/demo/chart-area-demo.js') }} "></script>
  <script src=" {{ asset('js/main.js') }} "></script>
  <script src=" {{ asset('vendor/jquery-ui/jquery-ui.js') }} "></script>
  <script src=" {{ asset('vendor/pdfmake.min.js') }} "></script>
  <script src=" {{ asset('vendor/html2canvas.min.js') }} "></script>
</body>

</html>