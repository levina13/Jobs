<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jobs - CV</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/cv.css" rel="stylesheet">
  <link href="assets/css/lightbox.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars - v4.10.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="{{route('home')}}"><img src="{{asset('assets/img/logojobs.png')}}" alt="Image" class="img-fluid" style="width: auto;height:50px;"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="{{route('home')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="#findjobs">Find Jobs</a></li>
          <li><a class="nav-link scrollto" href="#myjobs">My Jobs</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">CV</a></li>
          <!--
          <li><a class="nav-link scrollto" href="#team">Login</a></li>
          -->
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          @guest
          <li><a class="getstarted scrollto" href="{{route('loginView')}}">Get Started</a></li>
          @else
          <li>
            <a class="getstarted scrollto"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" >{{ __('Logout') }}</a>
            <form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">@csrf</form>
          </li>
          @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
    </header><!-- End Header -->
<body>
    <div class="section">
        <span class="section-title">Free CV Template</span>
        <div class="text">
            <center>
                <h4>
                    Increase your chances of getting a job and create a CV with one of our professional CV templates.</h4>
                <h4>Curious how this template can help you? Check out the various examples of CVs below that will give you inspiration.</h4>
            </center>
        </div>
        <a href="{{route('cvform')}}"
        style="background: -webkit-linear-gradient(right,#003366,#004080,#0059b3, #0073e6); width: 188px; height: 76px; border-radius: 15px; overflow: hidden; position: relative; top: 300px;
        transition: all 0.4s ease; font-weight:500; margin-top:35px; color:rgba(255,255,255,1); font-family: Poppins; font-weight: Medium; font-size: 18px; opacity: 1;
        text-align: center;padding: 22px 10px;display:inline-block;border-radius:15px;">
        Build your CV now </a>
    </div>

    <div class="container" id="CV">
        <div class="image-container">

            <div class="image">
                <a href="assets/img/CVtemplate/creative-cv-template-1.png" data-lightbox="models" data-title="Creative-1">
                    <img src="assets/img/CVtemplate/creative-cv-template-1.png" alt="">
                </a>
            </div>
            <div class="image">
                <a href="assets/img/CVtemplate/creative-cv-template-2.png" data-lightbox="models" data-title="Creative-2">
                    <img src="assets/img/CVtemplate/creative-cv-template-2.png" alt="">
                </a>
            </div>
            <div class="image">
                <a href="assets/img/CVtemplate/creative-cv-template-3.png" data-lightbox="models" data-title="Creative-3">
                    <img src="assets/img/CVtemplate/creative-cv-template-3.png" alt="">
                </a>
            </div>
            <div class="image">
                <a href="assets/img/CVtemplate/modern-cv-template-1.png" data-lightbox="models" data-title="Modern-1">
                    <img src="assets/img/CVtemplate/modern-cv-template-1.png" alt="">
                </a>
            </div>
            <div class="image">
                <a href="assets/img/CVtemplate/moder-cv-template-2.png" data-lightbox="models" data-title="Modern-2">
                    <img src="assets/img/CVtemplate/moder-cv-template-2.png" alt="">
                </a>
            </div>
            <div class="image">
                <a href="assets/img/CVtemplate/modern-cv-template-3.png" data-lightbox="models" data-title="Modern-3">
                    <img src="assets/img/CVtemplate/modern-cv-template-3.png" alt="">
                </a>
            </div>
            <div class="image">
                <a href="assets/img/CVtemplate/simple-cv-template-1.png" data-lightbox="models" data-title="Simple-1">
                    <img src="assets/img/CVtemplate/simple-cv-template-1.png" alt="">
                </a>
            </div>
            <div class="image">
                <a href="assets/img/CVtemplate/simple-cv-template-2.png" data-lightbox="models" data-title="Simple-2">
                    <img src="assets/img/CVtemplate/simple-cv-template-2.png" alt="">
                </a>
            </div>
            <div class="image">
                <a href="assets/img/CVtemplate/simple-cv-template-3.png" data-lightbox="models" data-title="Simple-3">
                    <img src="assets/img/CVtemplate/simple-cv-template-3.png" alt="">
                </a>
            </div>
        </div>


    </div>
    <script src="assets/js/lightbox-plus-jquery.js"></script>
</body>
<footer>
    <div class="container py-4">
        <div class="copyright">
          &copy; Kelompok 4 <strong> <span>Jobs</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
</footer>
</html>
