<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin - Pelayanan Kependudukan</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img') }}/tebo.ico" type="image/x-icon" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('SqvNR7QrAdmin') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('SqvNR7QrAdmin') }}/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css"
        rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('SqvNR7QrAdmin') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('SqvNR7QrAdmin') }}/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.jqueryui.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        @include('layouts.admin.sidebar')

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('layouts.admin.navbar')
            <!-- Navbar End -->
            @yield('content')
            @include('sweetalert::alert')


        </div>
        <!-- Content End -->



    </div>

    <!-- JavaScript Libraries -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('SqvNR7QrAdmin') }}/lib/chart/chart.min.js"></script>
    <script src="{{ asset('SqvNR7QrAdmin') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('SqvNR7QrAdmin') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('SqvNR7QrAdmin') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('SqvNR7QrAdmin') }}/lib/tempusdominus/js/moment.min.js"></script>
    <script src="{{ asset('SqvNR7QrAdmin') }}/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{ asset('SqvNR7QrAdmin') }}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.jqueryui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script>  --}}
    @stack('scripts')

    <!-- Template Javascript -->
    <script src="{{ asset('SqvNR7QrAdmin') }}/js/main.js"></script>
</body>

</html>
