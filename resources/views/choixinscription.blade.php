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
  <link href="{{asset('templateindex/assets/vendor/aos/aos.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('templateindex/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('templateindex/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('templateindex/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('templateindex/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('templateindex/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('templateindex/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css">


  <!-- Template Main CSS File -->
  <link href="{{asset('templateindex/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bootslander - v4.7.0
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="background-color: rgba(102,172,174,1);">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center  bg-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <!-- <h1><a href="index.html"><span>TranchePay logo</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="index.html"><img src="{{asset ('image/logo2.png')}}" alt="" class="img-fluid"></a>
      </div>

     
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
 	
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact"><br><br>
      <div class="container bg-white" style="width: 50%; border-radius: 15px;">

        <div class="section-title" data-aos="fade-up"><br><br>
          <h4>Sélectionner votre profil utilisateur </h4>



        </div>

        <div class="row">
          <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
            	<div class="form-check">
                <a class="nav-link scrollto" href="{{ url('register') }}"> <i class="fa fa-user"></i>S'incrire en tant que commercant</a> <br>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              </div>
              <div class="form-check">
                <a class="nav-link scrollto" href="{{url('registercommercant')}}"> <i class="fa fa-user"></i>S'incrire en tant que particulier</a>
              <br> <br>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            </div>
          </div>

        </div>
 <br> <br>
      </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

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