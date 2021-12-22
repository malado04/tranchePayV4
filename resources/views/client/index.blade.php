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
  <header id="header" class="fixed-top d-flex align-items-center bg-white">
    <div class="container d-flex align-items-center justify-content-between">

     
      <div class="logo">
        <!-- <h1><a href="index.html"><span>TranchePay logo</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="index.html"><img id="logo" src="{{asset ('image/logo1.png')}}" alt="" class="img-fluid"></a>
      </div>
            @php
                    $mtmontantverset=0;
                    $mttoutcommmande=0;
                    $mtversetclient=0;
                @endphp
                <!-- Calcul montant total verset du client et le motant total des commandes du client  -->
                @foreach ($listecommandesclient as $commandes)
                    @if(Auth::user()->id == $commandes->client_id)
                        @php
                            $mtmontantverset = $mtmontantverset + $commandes->montantverset;
                            $mttoutcommmande = $mttoutcommmande + $commandes->montantpayer;
                        @endphp
                    @endif
                @endforeach 
                <!-- Calcul montant total des versement du client -->
                @foreach ($listeversement as $versement)
                    @if(Auth::user()->id == $versement->user_id)
                        @php
                            $mtversetclient = $mtversetclient + $versement->verset;
                        @endphp
                    @endif
                @endforeach
                    
                    <div class="d-sm-inline-block form-inline navbar-search btn btn-danger" style="width:250px">
                        Montant dû = {{$mttoutcommmande - $mtmontantverset - $mtversetclient}} F CFA
                    </div>
                <!-- Declaration des variables globale -->
               

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</span>
                                @if(Auth::user()->image=='')
                                    <img class="img-profile rounded-circle" src="{{asset ('template/img/undraw_profile.svg')}}">
                                @else
                                    <img src="{{asset ('logo/'.Auth::user()->image)}}" class="img-profile rounded-circle">
                                @endif
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('modifiermdp') }}">
                                    <i class="fas fa-lock fa-sm fa-fw mr-2 fas fa-sm fa-fw mr-2 text-gray-400" ></i>
                                    Modifier mot de passe
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Deconnecter
                                </a>
                            </div>
                        </li>

                    </ul>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero1">
    <div class="container">
        <h2>Commandes</h2>
        <!-- <div class="bg-rgba p-3 col-lg-12 order-1 order-lg-2 hero-img"> -->
      <div class="row justify-content-between">
        <div class="col-lg-2 text-center pt-1 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <div class="list-group text-white" style="border-radius: 25px; background-color: rgb(2,248,255);" id="myList" role="tablist">
            <img style="width: 26%; margin-left: 38%;" src="{{asset ('image/logo1.png')}}" alt="" class="img-fluid">
            <hr class="sidebar-divider">
                <a style=" background-color: rgb(2,248,255);" class="nav-link collapsed" href="{{ route('listeversement') }}" >
                    <span>Mon compte </span>
                </a> 
            <hr class="sidebar-divider">
                <a style=" background-color: rgb(2,248,255);" class="nav-link collapsed" href="{{ route('listeversement') }}" >
                    <span>Profil </span>
                </a> 
            <hr class="sidebar-divider">
                <a style=" background-color: rgb(2,248,255);" class="nav-link collapsed" href="{{ route('mescommandes') }}" >
                    <span>Commandes </span>
                </a> 
            <hr class="sidebar-divider">
                <a style=" background-color: rgb(2,248,255);" class="nav-link collapsed" href="{{ route('listeversement') }}" >
                    <span>Payements </span>
                </a> 
            <hr class="sidebar-divider">
                <a style=" background-color: rgb(2,248,255);" class="nav-link collapsed" href="{{ route('listeversement') }}" >
                    <span>Liste des achats </span>
                </a> 
            <hr class="sidebar-divider">
             
            </div> 
          </div>
        </div>
        <div class="col-lg-10 order-1 order-lg-2 hero-img bg-white" data-aos="zoom-out" data-aos-delay="300" style="border-radius: 25px; "> 
            @foreach ($listecategorie as $categorie)
            <a href="{{route('listepartenaire',['categorie'=>$categorie->id])}}" > 
                <div style="display: inline-flex;width:49% ;">
                    <div style ="height:100%; width:100% ;  margin:10px; border: 5px solid silver; text-align:center; background-color: rgb(0, 0, 0);" >
                        <span  class="text-center listecategorie " > {{$categorie->libelle}} </span>
                        <img src="{{asset ('icon/'.$categorie->icon)}}" width="100%" height="250px">
                    </div> 
                </div>  
            <a>         
            @endforeach
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