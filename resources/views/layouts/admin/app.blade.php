<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin - AYUNDA</title>
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
    @yield('css')
    @livewireStyles

    <!-- Template Stylesheet -->
    <link href="{{ asset('SqvNR7QrAdmin') }}/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://kit.fontawesome.com/31ea8a612f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.jqueryui.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<style>.avatar {
    height: 50px;
    width: 50px;
}
.list-group-item:hover, .list-group-item:focus {
    background: rgba(24,32,23,0.37);
    cursor: pointer;
}
.chatbox {
    height: 80vh !important;
    overflow-y: scroll;
}
.message-box {
    height: 70vh !important;
    overflow-y: scroll;display:flex; flex-direction:column-reverse;
}
.single-message {
    background: #f1f0f0;
    border-radius: 12px;
    padding: 10px;
    margin-bottom: 10px;
    width: fit-content;
}
.received {
    margin-right: auto !important;
}
.sent {
    margin-left: auto !important;
    background :#3490dc;
    color: white!important;
}
.sent small {
    color: white !important;
}
.link:hover {
    list-style: none !important;
    text-decoration: none;
}
.online-icon {
    font-size: 11px !important;
}
#file-area {
    cursor: pointer;
}
#file-area > label > input {
    display: none !important;
}</style>
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
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <x-livewire-alert::scripts />
</body>

</html>
