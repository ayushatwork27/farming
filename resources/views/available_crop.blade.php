<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kheti Kisani</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="website_assets/img/favicon.png" rel="icon">
  <link href="website_assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="website_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="website_assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="website_assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="website_assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="website_assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="website_assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="website_assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Groovin - v2.2.1
  * Template URL: https://bootstrapmade.com/groovin-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

 <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="/">Kheti Kisani</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->


    

      <a href="{{ url('/register') }}" class="get-started-btn scrollto">Get Started</a>

    </div>
  </header><!-- End Header -->


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Currently Dealing With</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Available-Crop</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Crop Id</th>
              <th scope="col">Crop Name</th>
              <th scope="col">Crop Type</th>
            </tr>
          </thead>
          <tbody>
            @foreach($crops as $crop )
              <tr>
                <th scope="row">{{ $crop->id }}</th>
                <td>{{ $crop->name  }}</td>
                <td>{{ $crop->crop_type == '0' ? "Bonus" : "Non-Bonus"  }}</td>
              </tr>
            @endforeach
            

          </tbody>
        </table>

      </div>
    </section>

  </main><!-- End #main -->

   <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6">
            <div class="footer-info">
              <h3>Kheti Kisani</h3>
              <p>Near Ambuja mall tekari raipur cg (493661)<br><br>
                <strong>Phone:</strong> 7440215965<br>
                <strong>Email:</strong> khetikishani.company@gmail.com<br>
              </p>
              <!--
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            -->
            </div>
          </div>

         


          <div class="col-lg-6 col-md-6 footer-newsletter">
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
        &copy; Copyright <strong><span>Kheti Kisani</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/groovin-free-bootstrap-theme/ -->
        Designed by <a href="#">Ayush Agrawal</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>