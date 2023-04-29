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
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
	
	{{-- icon heart --}}
  
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
	.form-inputs{
    position:relative;
}
.form-inputs .form-control{
    height:45px; 
	min-width: 300px;
	font-size: 18px;
}

.form-inputs .form-control:focus{
    box-shadow:none;
    border:1px solid #000;
}

.form-inputs i{
    position:absolute;
    right:10px;
    top:15px;
}
.judul:hover{
	color: blue;
	text-decoration: underline;
}
</style>
</head>
<body style="display: block">
	<!-- ======= Header ======= -->
    @include('layouts.header')
    <!-- End Header -->
	<header class="cd-header">
		<h1 style="margin-top:20px;width: 100%; top: 165px; left: 0px; font-weight: bolder; font-family: poppins; font-size: 34px; color: rgba(11,7,54,1); opacity: 1; text-align: center;"; class="section-title">Find Your Jobs</h1>
	</header>
	<!--<div class="col-lg-5 col-5 /text-left">
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
				<div class="row justify-content-center" style="margin-right:0;margin-left:0">
					<div class="col-lg-4 col-md-6 col-sm-10 ">
						<form action="{{route('findJobs')}}" method="GET">
							<div class="d-flex form-inputs">
								@if (is_null($keyword))
									<input name="keyword" class="form-control" type="text" placeholder="Search any job vacancies...">
								@else
									<input name="keyword" class="form-control" type="text" value="{{$keyword}}">
								@endif
								<button type="submit">
									<i class="bi bi-search"></i>
								</button>
								<input type="hidden" type="submit">
							</div>						
						</form>
					</div>
				</div>
				<ul class="cd-filters">
					<li class="filter">
						{{-- All --}}
						{{-- <a class="selected" href="" data-type="all">
							All
						</a> --}}
					</li>
					{{-- <li class="filter" data-filter=".color-1"><a href="#0" data-type="color-1">Color 1</a></li>
					<li class="filter" data-filter=".color-2"><a href="#0" data-type="color-2">Color 2</a></li> --}}
				</ul> <!-- cd-filters -->
			</div> <!-- cd-tab-filter -->
		</div> <!-- cd-tab-filter-wrapper -->

		<section class="cd-gallery">
			<ul>
                @foreach ($data as $item)
					{{-- <div class="p-2" style="background-color: aliceblue"> --}}
							
							<li class="mix color-1 contract{{$item->id_contract}} industry{{$item->id_industry}} salary{{$item->id_salary_category}}">
								<a href="{{route('detailjobs',['id'=>$item->id_loker])}}" style="">
									<img src="{{asset('uploads/profil_image/'.$item->photo)}}" alt="Image 1">
								</a>
								<a class="btn-favorite" href="#" data-id="{{$item->id_loker}}" >
									@if (is_null($item->id_favorite))
										<span class="fab fa-4x" style="color:grey;">&#9829;</span>
									@else
										<span class="fab fa-4x" style="color: #e25555;">&#9829;</span>
									@endif
								</a>
								<center>
								<a class="judul" href="{{route('detailjobs',['id'=>$item->id_loker])}}" style="">
									<h2>{{$item->judul_loker}}</h2>
								</a>
								<p >{{$item->tanggal_awal}} - {{$item->tanggal_akhir}}</p>
								<p>Rp. {{number_format($item->salary,2,',','.')}}</p>
								<p>{{$item->contract}}</p>
							</center>
							</li>
					{{-- </div> --}}
                @endforeach
				{{-- <li class="mix color-2 check2 radio2 option2"><img src="{{asset('findJobs/img/img-2.jpg')}}" alt="Image 2">
				<center><h2>Jobs 2</h2>
					<p>Deskription</p></center>
				</li> --}}
				<li class="gap"></li>
				<li class="gap"></li>
				<li class="gap"></li>
			</ul>
			<div class="cd-fail-message">No results found</div>
		</section> <!-- cd-gallery -->

		<div class="cd-filter">
			<form>
				<div class="cd-filter-block">
					<h4>Contract</h4>

					<ul class="cd-filter-content cd-filters list">
						@foreach ($contract as $key=>$item)
							<li>
								<input class="filter" data-filter=".contract{{$item->id}}" type="checkbox" id="checkbox{{$key+1}}">
								<label class="checkbox-label" for="checkbox{{$key+1}}">{{$item->contract}}</label>
							</li>
						@endforeach

					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>Salary</h4>
					
					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="selectThis" id="selectThis">
								<option value="">All</option>
								@foreach ($salary as $key=>$item)
									<option value=".salary{{$item->id}}">Rp. {{number_format($item->start,2,',','.')}} - Rp. {{number_format($item->end,2,',','.')}}</option>
								@endforeach
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
						@foreach ($industry as $key=>$item)
							<li>
								<input class="filter" data-filter=".industry{{$item->id}}" type="radio" name="radioButton" id="radio{{$key+2}}">
								<label class="radio-label" for="radio{{$key+2}}">{{$item->jenis_perusahaan}}</label>
							</li>
						@endforeach



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
	<!-- Sweet Alert -->
      <script  src="{{ asset('js/sweetalert2@11.js') }}"></script>

	<script>
      $(document).on('click', '.btn-favorite', function (e) {
        var id = $(this).data('id');
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: "/favorite/"+id,
			type: 'POST',
			method:"POST",
			data: {submit: true},

			success: function(data) {
				if (data.status == 'success') {
					Swal.fire({
						title: 'Success!!',
						text:data.message,
						icon: 'success',
						showConfirmButton: true,
					}).then(function(){
						location.reload();
					});
				}
				else if(data.status=='failed'){
					Swal.fire({
						title: 'Failed!!',
						icon: 'error',
						showConfirmButton: true,
					});
				}
			},
			error: function(){
				Swal.fire({
					title: 'Failed',
					icon: 'error',
					showConfirmButton: true,
				});
			}
		});
      });

    </script>

	  
</body>
</html>