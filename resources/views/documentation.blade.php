<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Accueil | TRANCHE PAY</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
   <link rel="icon" href="{{asset ('image/logo1.png')}}">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('templateindex/assets/vendor/aos/aos.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('templateindex/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('templateindex/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('templateindex/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('templateindex/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('templateindex/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('templateindex/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css">


  <style type="text/css">
    .bg-rgba{
      background-color: rgba(0,0,0,0.5);
      border-radius: 15px;
    }
  </style>
  <!-- Template Main CSS File -->
  <link href="{{asset('templateindex/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bootslander - v4.7.0
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

     
      <div class="logo">
        <!-- <h1><a href="index.html"><span>TranchePay logo</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="index.html"><img id="logo" src="{{asset ('image/logo2.png')}}" alt="" class="img-fluid"></a>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{route('dashboard')}}">Acceuil</a></li>
          <li><a class="nav-link scrollto active" href="{{url('documentation')}}">Documentation</a></li>
          <li><a class="nav-link scrollto " href="{{url('commercant')}}">Commercant</a></li>
          <li><a class="nav-link scrollto" href="{{url('particulier')}}">Particulier</a></li>
          <li><a class="nav-link scrollto" href="{{url('contact')}}">Contact</a></li>
          <li><a class="nav-link scrollto" href="{{route('login')}}">Connexion</a></li>
          <li><a class="nav-link scrollto" href="{{url('choixinscription')}}">creer compte</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
        <!-- <div class="bg-rgba p-3 col-lg-12 order-1 order-lg-2 hero-img"> -->
          <div  class="bg-rgba p-3" data-aos="zoom-out" data-aos-delay="300">
        	<div class="row">
          <div class="col-md-9"><span style="float: left; font-size: 35px; " > <b class="text-white">Documentations</b> </span> </div>
          <div class="col-md-3"><input type="search" class="form-control" name="" placeholder=" Rechercher "></div>
            </div>
          <!-- <h6> <span style="float: right; font-size: 25px; "></span> </h6> -->
        </div> <br>
      <div class="row justify-content-between">
        <div class="col-lg-3 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out bg-danger">
            <div class="list-group" id="myList" role="tablist" style="width: 100%">
			  <a class="list-group-item list-group-item-action text-white" id="bg-tranche" data-toggle="list" href="#home" role="tab">Que voulez-vous savoir ?</a>
			  <a class="list-group-item list-group-item-action text-center" data-toggle="list" href="#profile" role="tab">Présentation <span style="float: right; font-size: 25px; ">></span> </a>
			  <a class="list-group-item list-group-item-action text-center" data-toggle="list" href="#service" role="tab">Services <span style="float: right; font-size: 25px; ">></span></a>
			  <a class="list-group-item list-group-item-action text-center" data-toggle="list" href="#api" role="tab">L'API <span style="float: right; font-size: 25px; ">></span></a>
			  <a class="list-group-item list-group-item-action text-center" data-toggle="list" href="#com" role="tab">Commerçant <span style="float: right; font-size: 25px; ">></span></a>
			  <a class="list-group-item list-group-item-action text-center" data-toggle="list" href="#part" role="tab">Particulier <span style="float: right; font-size: 25px; ">></span></a>
			  <a class="list-group-item list-group-item-action text-center" data-toggle="list" href="#partenaire" role="tab">Partenaire <span style="float: right; font-size: 25px; ">></span></a>
			</div>
			<script>
			  $(function () {
			    $('#myList a:last-child').tab('show')
			  })
			</script>
          </div>
        </div>
        <div class="col-lg-9 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
        	<h1>Lorem ipsum dolor sit amet</h1> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          <!-- <img src="{{asset('templateindex/assets/img/hero-img.png')}}" class="img-fluid animated" alt=""> -->
        </div>
      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->
  <!-- ======= Hero Section ======= -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Bootslander</h3>
              <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em></p>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Bootslander</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset ('templateindex/assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset ('templateindex/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset ('templateindex/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset ('templateindex/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset ('templateindex/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset ('templateindex/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset ('templateindex/assets/js/main.js')}}"></script>

</body>

</html>