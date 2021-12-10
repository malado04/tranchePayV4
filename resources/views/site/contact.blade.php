<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Accueil | TRANCHE PAY</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="{{asset ('image/logo.jpeg')}}">
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

<body style="background-color: rgba(0,0,0,0.2);">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center  bg-white">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html"><span class=" text-primary">TranchePay Logo</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">

        <ul>
          <li><a class="nav-link scrollto text-primary " href="../">Acceuil</a></li>
          <li><a class="nav-link scrollto text-primary" href="{{route('documentation')}}">Documentation</a></li>
          <li><a class="nav-link scrollto text-primary " href="{{route('commercant')}}">Commercant</a></li>
          <li><a class="nav-link scrollto text-primary " href="{{route('particulier')}}">Particulier</a></li>
          <li><a class="nav-link scrollto text-primary active" href="{{route('contact')}}">Contact</a></li>
          <li><a class="nav-link scrollto text-primary" href="#">Connexion</a></li>
          <li><a class="nav-link scrollto text-primary" href="#">creer compte</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
 	
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact"><br><br>
          <h1 class="text-center">Lorem ipsum dolor <span class="text-primary"> sit amet</span></h1>
    	<br><br>
      <div class="container bg-white" style="width: 50%; border-radius: 15px;">

        <div class="section-title" data-aos="fade-up"><br><br>
          <h4>Lorem ipsum dolor sit amet, consectetur </h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo .
        </div>

        <div class="row">

          <!-- <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div> -->

          <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
            <form action="forms/contact.php" method="post">

            	<div class="form-check">
  <input class="form-check-input" type="radio" value="Particulier" name="tranchepay" id="tranchepay">
  <label class="form-check-label" for="tranchepay">
   Particulier
  </label>
</div><br>
<div class="form-check">
  <input class="form-check-input" type="radio" value="Commercant" name="tranchepay" id="tranchepay">
  <label class="form-check-label" for="tranchepay">
    Commerçant
  </label>
</div><br><br>
              <div class="row">
                <div class="col-md-12 form-group">
                	<label>Prénom</label><span class="text-red">*</span>
                  <input type="text" name="name" class="form-control" id="name" placeholder="" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                	<br><label>Email</label><span class="text-red">*</span>
                  <input type="email" class="form-control" name="email" id="email" placeholder="" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                <br>	<label>Téléphone</label><span class="text-red">*</span>
                  <input type="tel" class="form-control" name="tel" id="tel" placeholder="+221" required>
                </div>
              </div> 
              <div class="form-group mt-3">
              	<label>Posez-nous vos questions</label>
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
              <div class="text-center"><button type="submit" class="form-control">Envoyer votre message</button></div>
            </form>

          </div>

        </div>

      </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

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