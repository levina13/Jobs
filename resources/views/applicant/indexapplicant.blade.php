@extends('layouts.app')
@section('title','Home')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Hi, user</h1>
          <h2>Let's get hired on your dream jobs.</h2>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/hero-img.svg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="findjobs" class="about section">
      <div class="container">
        <div class="section-title">
            <p>Find Jobs</p>
        </div>


      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="myjobs" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
            <p>My Jobs</p>
        </div>


        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Create a professional CV</h2>
            <p>Choose a template and build your CV in minutes.</p>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-app">Creative</li>
                <li data-filter=".filter-card">Modern</li>
                <li data-filter=".filter-web">Simple</li>
              </ul>
            </div>
          </div>

          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="{{asset('assets/img/CVtemplate/creative-cv-template-1.png')}}" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="{{asset('assets/img/CVtemplate/creative-cv-template-1.png')}}" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
                <div class="portfolio-info">
                  <h4>Creative 1</h4>
                  <p>Creative</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-wrap">
                <img src="assets/img/CVtemplate/simple-cv-template-1.png" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="assets/img/CVtemplate/simple-cv-template-1.png" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
                <div class="portfolio-info">
                  <h4>Simple 1</h4>
                  <p>Simple</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="assets/img/CVtemplate/creative-cv-template-2.png" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="assets/img/CVtemplate/creative-cv-template-2.png" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="App 2"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
                <div class="portfolio-info">
                  <h4>Creative 2</h4>
                  <p>Creative</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="assets/img/CVtemplate/modern-cv-template-1.png" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="assets/img/CVtemplate/modern-cv-template-1.png" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="Card 2"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
                <div class="portfolio-info">
                  <h4>Modern 1</h4>
                  <p>Modern</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-wrap">
                <img src="assets/img/CVtemplate/simple-cv-template-2.png" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="assets/img/CVtemplate/simple-cv-template-2.png" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="Web 2"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
                <div class="portfolio-info">
                  <h4>Simple 2</h4>
                  <p>Simple</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="assets/img/CVtemplate/creative-cv-template-3.png" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="assets/img/CVtemplate/creative-cv-template-3.png" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="App 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
                <div class="portfolio-info">
                  <h4>Creative 3</h4>
                  <p>Creative</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="assets/img/CVtemplate/moder-cv-template-2.png" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="assets/img/CVtemplate/moder-cv-template-2.png" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="Card 1"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
                <div class="portfolio-info">
                  <h4>Modern 2</h4>
                  <p>Modern</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <div class="portfolio-wrap">
                <img src="assets/img/CVtemplate/modern-cv-template-3.png" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="assets/img/CVtemplate/modern-cv-template-3.png" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="Card 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
                <div class="portfolio-info">
                  <h4>Modern 3</h4>
                  <p>Modern</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <div class="portfolio-wrap">
                <img src="assets/img/CVtemplate/simple-cv-template-3.png" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="assets/img/CVtemplate/simple-cv-template-3.png" data-gallery="portfolioGallery"
                    class="portfolio-lightbox" title="Web 3"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
                <div class="portfolio-info">
                  <h4>Simple 3</h4>
                  <p>Simple</p>
                </div>
              </div>
            </div>

          </div>

        </div>
      </section><!-- End Portfolio Section -->


    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact Us</h2>
          <p>Contact us the get started</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
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

              <iframe
                src="https://www.google.com/maps/embed/v1/place?q=Universitas+Negeri+Malang,+Jalan+Ambarawa,+Sumbersari,+Malang+City,+East+Java,+Indonesia&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->
  @include('layouts.footer')

@endsection
