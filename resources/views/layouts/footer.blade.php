    <!-- ======= Footer ======= -->
  <footer id="footer" class="row" style="margin-right:0;margin-left:0">
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
                <li><i class="bx bx-chevron-right"></i> <a href="{{route('home')}}">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{route('findJobs')}}">Find Jobs</a></li>
                @auth
                  @if(Auth::user()->role=='A')
                    <li><i class="bx bx-chevron-right"></i> <a href="{{route('myjobshistory')}}">My Jobs</a></li>
                  @endif
                @endauth
                <li><i class="bx bx-chevron-right"></i> <a href="{{route('cvawal')}}">CV</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="http://127.0.0.1:8000/#contact">Contacts</a></li>
              </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Services</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="{{route('findJobs')}}">Jobs Finder</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">{{route('findJobs')}}</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">{{route('cvawal')}}</a></li>
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
    <div class="px-2 py-4">
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
