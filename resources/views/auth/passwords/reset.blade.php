<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('judul', 'Pedulisehat')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/gif/iconpedulisehat.png') }}" rel="icon">
    <link href="{{ asset('assets/img/gif/iconpedulisehat.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    {{-- animate.css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> --}}
    {{-- animate.css --}}

    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">


    {{-- Toaster --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        #hero {
            background: #f1f1f1;
            background-image: linear-gradient(to right, rgb(234, 245, 250), #D5F2FF);
        }


        .has-search .form-control {
            padding-left: 2.375rem;
        }

        .has-search .form-control-feedback {
            position: absolute;
            z-index: 2;
            display: block;
            width: 2.375rem;
            height: 2.375rem;
            line-height: 2.375rem;
            text-align: center;
            pointer-events: none;
            color: #aaa;
        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="{{ '/' }}" class="logo text-80">
                <img src="{{ asset('assets/img/gif/pedulisehat.png') }}" alt="" class="img-fluid">
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <strong>
                        <li class="nav-link scrollto text-danger">
                            <i class="bi bi-calendar-date"></i> &nbsp;
                            {{ \Carbon\Carbon::parse(date('l, d F Y'))->translatedFormat('l, d F Y') }}

                            &nbsp;
                            |
                            <i class="bi bi-clock-fill"></i>
                            <span id="jam"></span>:
                            <span id="menit"></span>:
                            <span id="detik"></span>
                        </li>


                        <script>
                            window.setTimeout("waktu()", 1000);

                            function waktu() {
                                var waktu = new Date();
                                setTimeout("waktu()", 1000);
                                document.getElementById("jam").innerHTML = waktu.getHours();
                                document.getElementById("menit").innerHTML = waktu.getMinutes();
                                document.getElementById("detik").innerHTML = waktu.getSeconds();
                            }
                        </script>
                    </strong>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <div class="main pt-5" style="margin-top: 40px;" data-aos="zoom-in-up">
        <div class="container col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-danger">
                                <a href="{{ route('frontend') }}">
                                    <i class="bi bi-arrow-left-circle-fill text-danger"></i>
                                </a>
                                Reset Password
                            </h4>
                        </div>
                        <div class="col-md-12 text-right mb-3">
                            <small>
                                silahkan masukan alamat email anda dengan benar..!! <br>
                            </small>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group mb-4">
                            <label for="exampleInputEmail1">Email</label>
                            <div class="form-group has-search">
                                <span class="bi bi-envelope-fill form-control-feedback"></span>

                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            </div>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="exampleInputEmail1">Password Baru</label>
                            <div class="form-group has-search">
                                <span class="bi bi-lock-fill form-control-feedback"></span>

                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                            </div>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="exampleInputEmail1">Konfirmasi Kembali Password</label>
                            <div class="form-group has-search">
                                <span class="bi bi-lock-fill form-control-feedback"></span>

                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        @if (session('message'))
                            <div class="alert alert-success small" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <button type="submit" class="btn btn-danger col-md-12 mb-2 small">
                            <i class="bi bi-lock-fill"></i> Rubah Password Sekarang
                        </button>
                    </form>
                </div>

                <div class="card-footer header text-center">
                    Silahkan Login disini <i class="bi bi-info-circle"></i>
                    <a href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </div>
    </div>


    {{-- Footer --}}
    <footer id="footer" class="mt-3">
        <section id="clients" class="clients">
            <div class="container">
                <div class="section-title pb-0">
                    <h3>Didukung Oleh:</h3>
                </div>

                <div class="row">
                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/logo_kpcpen.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-1 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/logo_kominfo.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/logo_bumn.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-3 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/logo_kemenkes.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-1 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/logo_kemendagri2.png') }}" class="img-fluid"
                            alt="">
                    </div>

                    <div class="col-lg-1 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/logo_tni.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-1 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/logo_polri.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-1 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/img/logo_kemenlu.svg') }}" class="img-fluid" alt="">
                    </div>

                </div>

            </div>
        </section><!-- End Clients Section -->

        <div class="container d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright 2022 <strong><span>Dinas Kesehatan Kabupaten Nias Selatan</span></strong>. All
                    Rights Reserved
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->


    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
</body>

</html>
