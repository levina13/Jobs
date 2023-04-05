<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="{{asset('findJobs/css/reset.css')}}"> <!-- CSS reset -->
	<link rel="stylesheet" href="{{asset('findJobs/css/style.css')}}"> <!-- Resource style -->
	<script src="{{asset('findJobs/js/modernizr.js')}}"></script> <!-- Modernizr -->
  	
	<title>Find Jobs | Jobs</title>
	<!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('assets/img/jobsicon.png')}}"/>
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  
	<!-- Google Fonts -->
	<link
	  href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i"
	  rel="stylesheet">
	  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  
	<!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  
	<!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/cv.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/lightbox.css')}}" rel="stylesheet">

<style>
	h1 .section-title{
		width: 100%;
    color: rgba(11,7,54,1);
    position: absolute;
    top: 165px;
    left: 0px;
    font-family: Poppins;
    font-weight: bolder;
    font-size: 34px;
    opacity: 1;
    text-align: center;
	}
</style>
</head>
<body>
	<!-- ======= Header ======= -->
    @include('layouts.header')
    <!-- End Header -->
	<header class="cd-header">
		<br>
		<br>
		<!-- <h1>Find Your Jobs</h1> -->
		<div class="section">
			<h1 style="width: 100%; top: 165px; left: 0px; font-weight: bolder; font-family: poppins; font-size: 34px; color: rgba(11,7,54,1); opacity: 1; text-align: center;"; class="section-title">Find Your Jobs</h1>
		</div>
	</header>
	<!--<div class="col-lg-5 col-5 text-left">
		<form action="">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search for jobs">
				<i class="fa fa-search input-group-text bg-transparent text-primary"></i>
			</div>
		</form>
	  </div>-->

	<main class="cd-main-content">
		<div class="cd-tab-filter-wrapper bg-transparent">
			<div class="cd-tab-filter">
				<ul class="cd-filters">
					<li class="placeholder"> 
						<a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
					</li> 
					<li class="filter"><a class="selected" href="#0" data-type="all">All</a></li>
					<li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Color 1</a></li>
					<li class="filter" data-filter=".color-2"><a href="#0" data-type="color-2">Color 2</a></li>
				</ul> <!-- cd-filters -->
			</div> <!-- cd-tab-filter -->
		</div> <!-- cd-tab-filter-wrapper -->

		<section class="cd-gallery">
			<ul>
                @foreach ($data as $item)
                    <a href="{{route('detailjobs',['id'=>$item->id_loker])}}">
                        <li class="mix color-1 check1 radio2 option3"><img src="{{asset('uploads/profil_image/'.$item->photo)}}" alt="Image 1">
                        <center><h2>{{$item->judul_loker}}</h2>
                        <p>{{$item->tanggal_awal}} - {{$item->tanggal_akhir}}</p></center>
                        </li>
                    </a>
                @endforeach
				<li class="mix color-2 check2 radio2 option2"><img src="{{asset('findJobs/img/img-2.jpg')}}" alt="Image 2">
				<center><h2>Jobs 2</h2>
					<p>Deskription</p></center>
				</li>
				<li class="mix color-1 check3 radio3 option1"><img src="{{asset('findJobs/img/img-3.jpg')}}" alt="Image 3">
				<center><h2>Jobs 3</h2>
					<p>Deskription</p></center>
				</li>
				<li class="mix color-1 check3 radio2 option4"><img src="{{asset('findJobs/img/img-4.jpg')}}" alt="Image 4">
				<center><h2>Jobs 4</h2>
					<p>Deskription</p></center>
				</li>
				<li class="mix color-1 check1 radio3 option2"><img src="{{asset('findJobs/img/img-5.jpg')}}" alt="Image 5">
				<center><h2>Jobs 5</h2>
					<p>Deskription</p></center>
				</li>
				<li class="mix color-2 check2 radio3 option3"><img src="{{asset('findJobs/img/img-6.jpg')}}" alt="Image 6">
				<center><h2>Jobs 6</h2>
					<p>Deskription</p></center>
				</li>
				<li class="mix color-2 check2 radio2 option1"><img src="{{asset('findJobs/img/img-7.jpg')}}" alt="Image 7">
					<center><h2>Jobs 7</h2>
						<p>Deskription</p></center>
				</li>
				<li class="mix color-1 check1 radio3 option4"><img src="{{asset('findJobs/img/img-8.jpg')}}" alt="Image 8">
					<center><h2>Jobs 8</h2>
						<p>Deskription</p></center></li>
				<li class="mix color-2 check1 radio2 option3"><img src="{{asset('findJobs/img/img-9.jpg')}}" alt="Image 9">
					<center><h2>Jobs 9</h2>
						<p>Deskription</p></center>
				</li>
				<li class="mix color-1 check3 radio2 option4"><img src="{{asset('findJobs/img/img-10.jpg')}}" alt="Image 10">
					<center><h2>Jobs 10</h2>
						<p>Deskription</p></center>
				</li>
				<li class="mix color-1 check3 radio3 option2"><img src="{{asset('findJobs/img/img-11.jpg')}}" alt="Image 11">
					<center><h2>Jobs 11</h2>
						<p>Deskription</p></center>
				</li>
				<li class="mix color-2 check1 radio3 option1"><img src="{{asset('findJobs/img/img-12.jpg')}}" alt="Image 12">
					<center><h2>Jobs 12</h2>
						<p>Deskription</p></center>
				</li>
				<li class="gap"></li>
				<li class="gap"></li>
				<li class="gap"></li>
			</ul>
			<div class="cd-fail-message">No results found</div>
		</section> <!-- cd-gallery -->

		<div class="cd-filter">
			<form>
				<div class="cd-filter-block">
					<h4>Search</h4>
					
					<div class="cd-filter-content">
						<input type="search" placeholder="Try color-1..." >

					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>Contract</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter=".check1" type="checkbox" id="checkbox1">
			    			<label class="checkbox-label" for="checkbox1">Full Time</label>
						</li>

						<li>
							<input class="filter" data-filter=".check2" type="checkbox" id="checkbox2">
							<label class="checkbox-label" for="checkbox2">Part Time</label>
						</li>

						<li>
							<input class="filter" data-filter=".check3" type="checkbox" id="checkbox3">
							<label class="checkbox-label" for="checkbox3">Freelance</label>
						</li>
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>Salary</h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="selectThis" id="selectThis">
								<option value="">Choose an option</option>
								<option value=".option1">Rp. 100.000 - Rp. 1.000.000</option>
								<option value=".option2">Rp. 1.000.000 - Rp. 3.000.000</option>
								<option value=".option3">Rp. 3.000.000 - Rp. 5.000.000</option>
								<option value=".option4">Rp. 5.000.000 - Rp. 10.000.000</option>
							</select>
						</div> <!-- cd-select -->
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>Industry</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter="" type="radio" name="radioButton" id="radio1" checked>
							<label class="radio-label" for="radio1">All</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio2" type="radio" name="radioButton" id="radio2">
							<label class="radio-label" for="radio2">Service</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio3" type="radio" name="radioButton" id="radio3">
							<label class="radio-label" for="radio3">Business</label>
						</li>
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
			</form>

			<a href="#0" class="cd-close">Close</a>
		</div> <!-- cd-filter -->

		<a href="#0" class="cd-filter-trigger">Filters</a>
	</main> <!-- cd-main-content -->
    <script src="{{asset('findJobs/js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('findJobs/js/jquery.mixitup.min.js')}}"></script>
    <script src="{{asset('findJobs/js/main.js')}}"></script> <!-- Resource jQuery -->
<!-- Vendor JS Files -->
      <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
      <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      {{-- <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script> --}}
      <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
      <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
      <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
      <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
      <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>