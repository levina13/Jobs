<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Jobs - CV</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="shortcut icon" href="{{asset('assets/img/jobsicon.png')}}"/>
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

    @include('layouts.header')
    <body>
    <div class="section">
        <span class="section-title">Free CV Template</span>
        <div class="text">
            <center>
                <h4>
                    Increase your chances of getting a job and create a CV with one of our professional CV templates.</h4>
                {{-- <h4>Curious how this template can help you? Check out the various examples of CVs below that will give you inspiration.</h4> --}}
            </center>
        </div>
    </div>
    <div class="section">
        <span class="section-title"></span>
        <a href="{{route('cvform',['id'=>1])}}"
        style="background: -webkit-linear-gradient(right,#003366,#004080,#0059b3, #0073e6); width: 188px; height: 76px; border-radius: 15px; overflow: hidden; position: relative; top: 300px;
        transition: all 0.4s ease; font-weight:500; margin-top:35px; color:rgba(255,255,255,1); font-family: Poppins; font-weight: Medium; font-size: 18px; opacity: 1;
        text-align: center;padding: 22px 10px;display:inline-block;border-radius:15px;">
        Build your CV now </a>
    </div>

    <div class="container" id="CV">
        <div class="image-container">
            @foreach ($cv as $item)
                <div class="image ">
                    <a href="{{route('cvform',['id'=>$item->id])}}" >
                        <img src="{{asset("/templateCV/$item->source/preview.png")}}" alt="{{$item->title}}">
                    </a>
                </div>
            @endforeach
        </div>


    </div>
    <script src="assets/js/lightbox-plus-jquery.js"></script>
</body>
@include('layouts.footer')
</html>
