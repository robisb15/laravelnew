<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AYUNDA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img') }}/tebo.ico" type="image/x-icon" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('ioekHH56home') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('ioekHH56home') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('ioekHH56home') }}/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('ioekHH56home') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('ioekHH56home') }}/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <style>
        @keyframes slideInFromLeft {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .animated-text {
            animation: slideInFromLeft 1s ease-out forwards;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light d-none d-lg-block">
        <div class="row align-items-center top-bar">
            <div class="col-lg-3 col-md-12 text-center text-lg-start">
                <a href="" class="navbar-brand m-0 p-0">
                    <h1 class="text-primary m-0">AYUNDA</h1>

                </a>
            </div>
            <div class="col-lg-9 col-md-12 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="fa fa-map-marker-alt text-primary me-2"></i>
                    <p class="m-0">Sungai Alai, Kec. Tebo Tengah, Kabupaten Tebo, Jambi 37571</p>
                </div>

            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 py-lg-0 px-lg-4">
            <a href="" class="navbar-brand d-flex align-items-center m-0 p-0 d-lg-none">
                <h1 class="text-primary m-0">AYUNDA</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto">
                    <a href="/" class="nav-item nav-link active">Home</a>

                </div>
                <div class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 bg-primary d-flex align-items-center">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                        style="width: 45px; height: 45px;">
                        <i class="fa fa-user text-primary"></i>
                    </div>
                    <div class="ms-3">
                        @auth
                            <a href="{{ url('/cek') }}" class="m-0 text-white">Dashboard</a>
                        @else
                            <a href="{{ url('/login') }}" class="m-0 text-white">Login</a>
                        @endauth

                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="position-relative">
            <div class="position-relative">
                <img class="img-fluid" src="{{ asset('ioekHH56home') }}/img/dukcapil.png" alt=""
                    style="width: 100%; height: 100%;">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                    style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h1 class="text-white text-uppercase mb-1 animated-text"
                                    style="font-family: 'Montserrat', sans-serif; font-size: 3rem; font-weight: bold;">
                                    Selamat Datang di AYUNDA</h1>

                                <p class="fs-5 fw-medium text-white mb-4 pb-2"
                                    style="font-family: 'Open Sans', sans-serif; font-size: 1.2rem;">Aplikasi Pelayanan
                                    Kependudukan di Desa</p>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2"
                                    style="font-family: 'Roboto', sans-serif; font-size: 1.2rem;">Kami memberikan
                                    pelayanan terbaik dalam mengelola data kependudukan.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Carousel End -->





    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">Pemerintah</h6>
                    <h1 class="mb-4">Dukcapil Tebo</h1>
                    <p class="mb-4">Dinas Kependudukan dan Pencatatan Sipil (Dukcapil) Tebo adalah lembaga pemerintah
                        yang bertanggung jawab atas manajemen
                        dan pengelolaan data kependudukan serta perekaman peristiwa sipil di Kabupaten Tebo. Dukcapil
                        Tebo memiliki peran
                        penting dalam menyediakan layanan administrasi kependudukan untuk warga Kabupaten Tebo.</p>

                </div>
                <div class="col-lg-6 pt-4" style="min-height: 500px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100"
                            src="{{ asset('ioekHH56home') }}/img/dukcapil.webp"
                            style="object-fit: cover; padding: 0 0 50px 100px;" alt="">
                        <!-- <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="img/about-2.jpg" style="object-fit: cover;" alt=""> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start -->
    <div class="container-fluid fact bg-dark my-5 py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-check fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">{{ $totalTotal }}</h2>
                    <p class="text-white mb-0">Total Pengajuan</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-list fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">{{ $totalSelesai }}</h2>
                    <p class="text-white mb-0">Pengajuan Selesai</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-layer-group fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">{{ $totalProses }}</h2>
                    <p class="text-white mb-0">Pengajuan Diproses</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fa fa-file-excel fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">{{ $totalTolak }}</h2>
                    <p class="text-white mb-0">Pengajuan Ditolak</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->


    <!-- Service Start -->
    <div class="container-fluid py-5 px-4 px-lg-0">
        <div class="row g-0">
            <div class="col-lg-3 d-none d-lg-flex">
                <div class="d-flex align-items-center justify-content-center bg-primary w-100 h-100">
                    <h1 class="display-3 text-white m-0" style="transform: rotate(-90deg);">Layanan</h1>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">
                <div class="ms-lg-5 ps-lg-5">
                    <div class="text-center text-lg-start wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="text-secondary text-uppercase">Layanan Kami</h6>
                    </div>
                   <div class="owl-carousel service-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
    @foreach ($layanan as $item)
        <div class="item bg-light p-4">
            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4" style="height: 150px;">
                <img src="{{ asset('img/layanan.png') }}" alt="" style="max-width: 100%; max-height: 100%;">
            </div>
            <h4 class="mb-3">{{ $item->nama_layanan }}</h4>
            <p>{{ $item->keterangan }}</p>
        </div>
    @endforeach
</div>

                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Alamat</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Sungai Alai, Kec. Tebo Tengah,
                        Kabupaten Tebo, Jambi 37571</p>
                    <!-- <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p> -->
                    <!-- <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p> -->
                    <!-- <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div> -->
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Jam Kerja</h4>
                    <h6 class="text-light">Senis - Kamis:</h6>
                    <p class="mb-4">08.00 - 14.00 </p>
                    <h6 class="text-light">Jumat:</h6>
                    <p class="mb-0">08.00 - 11.30 </p>
                </div>
                <div class="col-lg-6 col-md-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.5174425672776!2d102.35689367425047!3d-1.463157635843503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2ebe6dead9cc5b%3A0x6d1da470bf121deb!2sDINAS%20DUKCAPIL%20TEBO!5e0!3m2!1sid!2sid!4v1707184902453!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Dukcapil Tebo</a>, All Right Reserved.
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('ioekHH56home') }}/lib/wow/wow.min.js"></script>
    <script src="{{ asset('ioekHH56home') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('ioekHH56home') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('ioekHH56home') }}/lib/counterup/counterup.min.js"></script>
    <script src="{{ asset('ioekHH56home') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('ioekHH56home') }}/lib/tempusdominus/js/moment.min.js"></script>
    <script src="{{ asset('ioekHH56home') }}/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{ asset('ioekHH56home') }}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('ioekHH56home') }}/js/main.js"></script>
</body>

</html>
