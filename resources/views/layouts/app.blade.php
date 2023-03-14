<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jobs - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">


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
        <a href="index.html"><img src="{{asset('assets/img/logojobs.png')}}" alt="Image" class="img-fluid" style="width: auto;height:50px;"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
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
          <li class="dropdown">
            <button class="getstarted dropdown-toggle btn" type="button" id="dropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
              Hi, {{Auth::user()->name}}</button>
            <ul class="dropdown-menu" aria-labelledby="dropdownButton">
                <a href=""  class="dropdown-item"><i class="bi bi-person-fill mr-2"></i>Edit Profile</a>
                @if(Auth::user()->role=='B')
								<a href=""  class="dropdown-item"><i class="bi bi-building-fill-check mr-2"></i>Company Page</a>
                @endif
                <a class="dropdown-item "  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" ><i class="bi bi-box-arrow-right"></i>{{ __('Logout') }}</a>
                <form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">@csrf</form>
						</ul>
            
            
          </li>
          @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
    </header><!-- End Header -->

        @yield('content')

    <!-- ======= Footer ======= -->
  <footer id="footer">
    <section id="footer" class="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Jobs</h3>
            <p>
              Universitas Negeri Malang<br>
              Jl Semarang 5 Malang 65145<br>
              Jawa Timur <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> jobs@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Find Jobs</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">My Jobs</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">CV</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Contacts</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Jobs Finder</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Apply Jobs</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">CV Generator</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Acceptance Notification</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Join our social media for further information</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>
</section>
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
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

      {{-- Jquery --}}
        <script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>

      <!-- Vendor JS Files -->
      <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
      <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
      <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
      <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
      <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
      <!-- Template Main JS File -->
      <script src="{{asset('assets/js/main.js')}}"></script>


    @yield('layout_script')
</body>

</html>

