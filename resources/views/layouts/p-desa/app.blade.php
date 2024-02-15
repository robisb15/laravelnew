<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Pegawai Desa | Dukcapil</title>

    <meta name="description" content="" />

    <!-- Favicon -->
   <link href="{{ asset('img') }}/tebo.ico" type="image/x-icon" rel="icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('GP8JKaiUUser') }}/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('GP8JKaiUUser') }}/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('GP8JKaiUUser') }}/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('GP8JKaiUUser') }}/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('GP8JKaiUUser') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="{{ asset('GP8JKaiUUser') }}/assets/vendor/libs/apex-charts/apex-charts.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('GP8JKaiUUser') }}/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('GP8JKaiUUser') }}/assets/js/config.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.jqueryui.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout">
      <div class="layout">
    

        <!-- Layout container -->
        <div class="layout">
          <!-- Navbar -->

         @include('layouts.p-desa.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content">
            <!-- Content -->

            <div class="container flex-grow-1 container-p-y">
              @yield('content')
              @include('sweetalert::alert')
            </div>
            <!-- / Content -->

            <!-- Footer -->
           
            <!-- / Footer -->

          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('GP8JKaiUUser') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('GP8JKaiUUser') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('GP8JKaiUUser') }}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('GP8JKaiUUser') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('GP8JKaiUUser') }}/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('GP8JKaiUUser') }}/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="{{ asset('GP8JKaiUUser') }}/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="{{ asset('GP8JKaiUUser') }}/assets/js/dashboards-analytics.js"></script>
     <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.jqueryui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script>  --}}
    @stack('scripts')

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
