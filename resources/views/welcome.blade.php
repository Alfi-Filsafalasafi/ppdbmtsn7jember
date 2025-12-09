<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PPDB MTSN 7 Jember</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="{{ asset('img/mts7.png') }}">
  <link href="{{asset('img/mts7.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('landing_page/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('landing_page/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('landing_page/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('landing_page/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('landing_page/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('landing_page/assets/css/main.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{route('welcome')}}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{asset('img/logo_mts_7.png')}}" alt="">
        <h1 class="sitename" style="font-size: 20px">PPDB MTSN 7 Jember</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{route('welcome')}}" class="active">Home<br></a></li>
          <li><a href="#">Pengumuman</a></li>
             @if(Auth::check())
            @if(Auth::user()->role === 'admin')
                <a class="btn-getstarted" style="background: #435ebe; padding:7px 20px; color:white" href="{{ route('admin.dashboard') }}">
                    Dashboard Admin
                </a>
            @else
                <a class="btn-getstarted" style="background: #435ebe;  padding:7px 20px; color:white" href="{{ route('user.dashboard') }}">
                    Dashboard Saya
                </a>
            @endif
        @endif
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{route('pendaftaran.form')}}">Pendaftaran</a>

    </div>
  </header>

  <main class="main">
    <!-- Trainers Index Section -->
    <section id="trainers-index" class="section trainers-index">

      <div class="container">

        <div class="row justify-content-evenly text-center">
            <h2 data-aos="fade-up" data-aos-delay="100" class="content" style="margin-top: -50px">Kontak Person</h2>
            <p data-aos="fade-up" data-aos-delay="100" >Untuk Informasi Pendaftaran Lebih Lanjut, bisa menghubungi bapak/ibu dibawah ini</p>
          <div class="col-lg-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <img src="{{asset('img/pak_soim.jpg')}}" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Pak So'im</h4>
                <p>
                  0823-3474-2479
                </p>
                <a href="https://wa.me/6282334742479" class="btn-getstarted mx-0">Hubungi Lewat WA</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
             <div class="member">
              <img src="{{asset('img/bu_yatun.jpg')}}" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Bu Yatun</h4>
                <p>
                  0813-3626-7739
                </p>
                <a href="https://wa.me/6281336267739" class="btn-getstarted mx-0">Hubungi Lewat WA</a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
             <div class="member">
              <img src="{{asset('img/pak_darmani.jpg')}}" class="img-fluid" alt="">
              <div class="member-content">
                <h4>Pak Darmani</h4>
                <p>
                  0813-3682-2735
                </p>
                <a href="http://wa.me/6281336822735" class="btn-getstarted mx-0">Hubungi Lewat WA</a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Trainers Index Section -->

  </main>
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('landing_page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('landing_page/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('landing_page/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('landing_page/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('landing_page/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('landing_page/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('landing_page/assets/js/main.js')}}"></script>

</body>

</html>


