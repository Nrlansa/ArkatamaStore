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

<style>
    @import url('https://fonts.googleapis.com/css?family=PT+Sans');
@import url('https://fonts.googleapis.com/css?family=Oswald');

:root {
  --blue: #457b8c;
  --gray: #f0f0f0;
  --red: #ce4034;
  --green: #08b8b8;
  --primary-font-color: #798796;
  --secondary-font-color: #595556;
}

body {
  font-family: 'PT Sans', sans-serif;
}

h1 {
  font-family: 'Oswald', sans-serif;
  text-transform: uppercase;
  color: var(--primary-font-color);
  font-size: 2.5rem;
}

h5 {
  font-family: 'Oswald', sans-serif;
  text-transform: uppercase;
  color: var(--primary-font-color);
  font-size: 1.563rem;
}

.fullwidth {
  max-width: 60%;
  height: 40%;
}

.-spacing-a {
  margin-top: 3.125rem;
}

.-spacing-b {
  margin-top: 1.875rem;
}

.-typo-copy {
  margin-bottom: 1.875rem;
  color: var(--secondary-font-color);
  font-size: 1rem;
}

.-typo-copy--blue {
  color: var(--primary-font-color);
}

.profile-image {
  overflow: hidden;
  /* display: flex; */
}

.profile-image:hover .edit-profile-image {
  opacity: 1;
}

.edit-profile-image {
  width: auto;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0.9375rem;
  right: 0.9375rem;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0.625rem;
  cursor: pointer;
  opacity: 0;
  /* background: linear-gradient(to bottom, rgba(231, 211, 116, 0.7) 0%, rgba(8, 184, 184, 0.7) 100%); */
  transition: all 0.2s ease-in-out;
}

.edit-profile-image__information {
  color: #FFF;
  font-size: 1.125rem;
}

.edit-profile-image__label {
  margin-left: 0.5rem;
  display: inline-block;
  font-family: 'PT Sans', sans-serif;
}

.btn {
  border: none;
  background: #FFF;
  border-radius: 0;
  padding: 0.875rem 0.625rem;
  cursor: pointer;
}

.btn__label {
  font-family: 'PT Sans', sans-serif;
  margin-left: 0.5rem;
}

.btn--green {
  background: var(--green);
  color: #FFF;
}

</style>
<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container-fluid">

            <div class="row justify-content-center align-items-center">
                <div class="col-xl-11 d-flex align-items-center justify-content-between">
                    <h1 class="logo" style="font-size: 25px; color:white;">Arkatama Store</h1>


                    <nav id="navbar" class="navbar">
                        <ul>
                      <li><a class="nav-link scrollto " href="{{ url('/listproduk') }}" style="color: black;">Kembali</a></li>
                            <li><a class="nav-link scrollto {{ request()->is('/profil') ? 'active' : '' }}" href="{{ url('/profil') }}"style="color: black;">Profil</a></li>
                        </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav><!-- .navbar -->
                </div>
            </div>

        </div>
    </header><!-- End Header -->

    

    <main id="main">
        <section id="services">
            <div class="container">
                <div class="row -spacing-a">
                    <div class="col-md-12">
                        
                    <h1>Profil saya</h1>
                    <p>Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
                    </div>
                </div>
                <div class="row -spacing-a">
                    <div class="col-md-4">
                    <div class="profile-image">
                        <img src="{{ url('public') }}/img/user.png" class="fullwidth"/>
                        <div class="edit-profile-image">
                        <span class="edit-profile-image__information">
                        <span class="fa fa-camera"></span>
                        {{-- <span class="edit-profile-image__label">
                           <a href="{{ url('/editprofil') }}">Edit Profil</a> 
                        </span> --}}
                        </span>
                    </div>
                    </div>
                    
                    </div>
                    <div class="col-md-8">
                    <h5>Data Diri</h5>
                    <div class="row -spacing-b">
                        <div class="col-md-6">
                        <p class="-typo-copy">Username : {{ Auth::user()->username }} </p>
                        <p class="-typo-copy">Nama : {{ Auth::user()->nama }}</p>
                        <p class="-typo-copy">Nomor Telpon : {{ Auth::user()->no_hp}}</p>
                       
                        </div>
                        <div class="col-md-6">
                        <p class="-typo-copy">Alamat : {{ Auth::user()->alamat }}</p>
                        <p class="-typo-copy">Jenis Kelamin : {{ Auth::user()->jenis_kelamin }}</p>
                        <p class="-typo-copy">Email : {{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    </div>  
                </div>
            </div>
        </section>

        <section id="portfolio" class="section-bg">
            
        </section>
        
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
