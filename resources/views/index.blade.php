@extends('layouts.app')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Find the perfect job that fits you well.</h1>
          <h2>Find your next flexible, hybrid, or work from home job</h2>
          @guest
          <div>
            <a href="{{route('loginView')}}" class="btn-get-started scrollto">Get Started</a>
          </div>
          @endguest
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
          <!--<h2>Find Jobs</h2>-->
          <p>YOUR FUTURE OF WORK.
              NOW.
          </p>
          <h2>Discover the best flexible job offers</h2>
        </div>

        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="assets/img/about-img.svg" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h3 data-aos="fade-up">Jobs gives access, in 1 click, you can create a proffesional CV automatically
                while applying for job vacancies
            </h3>
            <p data-aos="fade-up" data-aos-delay="100">
              Because the job market o longer knows borders and talent can work from anywhere,
              we don't limit ourselves to companies in your country. With Jobs,
              the whole planet becomes your playgroud!

              Do you find that recruiters don't communicate much about the
              precise terms of flexibility? We are the only website that
              provides this information so that you can find the job
              that really suits you.
            </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="myjobs" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <!--<h2>My Jobs</h2>-->
          <p>Why need to use Jobs?</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class='bx bxs-file'></i></div>
              <h4 class="title"></h4>
              <h4 class="title"> Create and built professional CV step-by-step. </h4>
              <!-- <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                occaecati cupiditate</p> -->
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class='bx bxs-briefcase' ></i></div>
              <h4 class="title"></h4>
              <h4 class="title"> Access the most complete source of relevant jobs. </h4>

            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class='bx bxs-layout'></i></div>
              <h4 class="title"></h4>
              <h4 class="title"> Organize and manage outstanding job applications. </h4>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class='bx bxs-user-check'></i></div>
              <h4 class="title"></h4>
              <h4 class="title"> Getting hired just got easy. Make your job applications stand-out from other candidates </h4>
            </div>
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
          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            @foreach ($cv as $item)
            <div class="col-lg-4 col-md-5 col-sm-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <img src="{{asset("/templateCV/$item->source/preview.png")}}" class="img-fluid" alt="">
                <div class="portfolio-links">
                  <a href="{{route('cvform',['id'=>$item->id])}}" 
                    class=" btn" title="App 1">
                    <i class="bi bi-plus">Create</i>
                  </a>
                </div>
                <div class="portfolio-info">
                  <h4>{{$item->title}}</h4>
                </div>
              </div>
            </div>
            @endforeach
          </div>

        </div>
      </section><!-- End Portfolio Section -->


    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact Us</h2>
          <p>Send us a message</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Jl. Semarang No.5, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur 65145</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>jobs@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>
              <iframe
                src="https://www.google.com/maps/embed/v1/place?q=Universitas+Negeri+Malang,+Jalan+Semarang,+Sumbersari,+Malang+City,+East+Java,+Indonesia&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <form  method="post" id="contactForm" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <br>
                  <span class="d-none text text-danger" errorFor="name"><br></span>
                  <input type="text" name="name" value="{{$name}}" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Your Email</label>
                  <br>
                  <span class="d-none text text-danger" errorFor="email"><br></span>
                  <input type="email" class="form-control" value="{{$email}}" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Subject</label>
                <br>
                <span class="d-none text text-danger" errorFor="subject"><br></span>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Message</label>
                <br>
                <span class="d-none text text-danger" errorFor="message"><br></span>
                <textarea class="form-control" id="message" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" class="btn-submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->
  @include('layouts.footer')  
@endsection

@section('layout_script')
  {{-- Sweet Alert --}}
  <script>
      $(document).on('click', '.btn-submit', function(e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("contactForm"));
          $(`[errorFor=name]`).html('');
          $(`[errorFor=email]`).html('');
          $(`[errorFor=subject]`).html('');
          $(`[errorFor=message]`).html('');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('sendEmail')}}",
            type: 'POST',
            method:"POST",
            data: {
              submit:true,
              'name':$('#name').val() ,
              'email':$('#email').val(),
              'subject':$('#subject').val(),
              'message': $('textarea#message').val(),
            },
            success: function(data) {
              console.log(data);
              console.log($('#name').val());
                if (data.status == 'success') {
                  Swal.fire({
                      title: 'Successfully send a message!!',
                      text: data.message,
                      icon: 'success',
                      showConfirmButton: true,
                  }).then(function(){
                    window.location="{{route('home')}}";
                  });
                }
                else if(data.status=='failed'){
                  let dataError = JSON.parse(data.error)
                  for (const key in dataError) {
                    $(`[errorFor="${key}"]`).html(dataError[key][0]).removeClass('d-none')
                  }

                  Swal.fire({
                    title: 'Failed to send a message!',
                    icon: 'error',
                    text:'status failed',
                    showConfirmButton: true,
                  });
                }
            },
            error: function(){
                Swal.fire({
                    title: 'Failed ajax!',
                    // text:data.error,   
                    icon: 'error',
                    showConfirmButton: true,
                });
            }
        });
      });

  </script>

@endsection

