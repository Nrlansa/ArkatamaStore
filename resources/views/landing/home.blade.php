<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="{{ url('public') }}/img/Logoarkatama.png" type="image/gif" style="width: 45px; hight:45px" />
    <title>Arkatama Store</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('public') }}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ url('public') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('public') }}/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: BizPage
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container-fluid">

            <div class="row justify-content-center align-items-center">
                <div class="col-xl-11 d-flex align-items-center justify-content-between">
                    <h1 class="logo" style="font-size: 25px; color:white;">Arkatama Store</h1>


                    <nav id="navbar" class="navbar">
                        <ul>
                            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                            <li><a class="nav-link scrollto" href="{{ url('/register') }}">Daftar</a></li>
                            <li><a class="nav-link scrollto" href="{{ url('/login') }}">Login</a></li>
                        </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav><!-- .navbar -->
                </div>
            </div>

        </div>
    </header><!-- End Header -->

    <!-- ======= hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
                <ol id="hero-carousel-indicators" class="carousel-indicators"></ol>
                @foreach ($list_slider as $slider)
                    @if ($slider->is_active === 'aktif')
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"
                                style="background-image: url('{{ url('public/' . $slider->banner) }}');"></div>
                            <div class="carousel-container">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
        </div>
    </section><!-- End Hero Section -->

    <main id="main">

        <!-- ======= Services Section ======= -->
        <section id="services">
            <div class="container" data-aos="fade-up">

                <header class="section-header wow fadeInUp">
                    <h3>Kategori</h3>
                </header>
                <div class="row">
                    @foreach ($list_kategori as $kategori)
                        <div class="col-3">
                            <h4 class="title d-inline">{{ $kategori->nama }}</h4>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <section id="portfolio" class="section-bg">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h3 class="section-title">Produk</h3>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100"">

                </div>
                <div class="row" style="display: flex; flex-wrap: wrap;">
                    @foreach ($list_produk as $produk)
                        @if ($produk->status === 'disetujui')
                            <div class="col-3" style="flex: 1 0 25%; padding: 10px;">
                                <div class="card" style="height: 100%; display: flex; flex-direction: column;">
                                    <img src="{{ url('public/' . $produk->gambar) }}" class="card-img-top"
                                        alt="..." style="flex: 1;">
                                    <div class="card-body"
                                        style="display: flex; flex-direction: column; justify-content: space-between;">
                                        <h6 class="card-title">{{ $produk->nama }}</h6>
                                        <p class="card-text">{{ $produk->formatted_price }}</p>
                                        <a href="{{ url('/landing', $produk->id) }}"
                                            class="btn btn-primary mt-auto">Detail Produk</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-info">
                            <h3>Arkatama Store</h3>
                            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna
                                derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque
                                felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                                <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
                                <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
                                <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
                                <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h4>Contact Us</h4>
                            <p>
                                A108 Adam Street <br>
                                New York, NY 535022<br>
                                United States <br>
                                <strong>Phone:</strong> +1 5589 55488 55<br>
                                <strong>Email:</strong> info@example.com<br>
                            </p>

                            <div class="social-links">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>

                        </div>

                        <div class="col-lg-3 col-md-6 footer-newsletter">
                            <h4>Our Newsletter</h4>
                            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam
                                illum dolore legam minim quorum culpa amet magna export quem marada parida nodela
                                caramase seza.</p>
                            <form action="" method="post">
                                <input type="email" name="email"><input type="submit" value="Subscribe">
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong>Arkatama Store</strong>. All Rights Reserved
                </div>

            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
        <!-- Uncomment below i you want to use a preloader -->
        <!-- <div id="preloader"></div> -->

        <!-- Vendor JS Files -->
        <script src="{{ url('public') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="{{ url('public') }}/assets/vendor/aos/aos.js"></script>
        <script src="{{ url('public') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ url('public') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="{{ url('public') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="{{ url('public') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="{{ url('public') }}/assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="{{ url('public') }}/assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="{{ url('public') }}/assets/js/main.js"></script>

</body>

</html>
