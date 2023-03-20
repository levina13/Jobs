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
  <link href="assets/css/cvform.css" rel="stylesheet">

  <script src="assets/js/cvform.js"></script>


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
        <a href="index.html"><img src="assets/img/logojobs.png" alt="Image" class="img-fluid" style="width: auto;height:50px;"></a>
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
          <li><a class="getstarted scrollto" href="#home">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

<!-- partial:index.partial.html -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

<div class="wrapper">
	<div class="header">
		<ul>
			<li class="active form_1_progessbar">
				<div>
					<p><i class='bx bxs-user' ></i></p>
				</div>
			</li>
			<li class="form_2_progessbar">
				<div>
					<p><i class='bx bx-file' ></i></p>
				</div>
			</li>
			<li class="form_3_progessbar">
				<div>
					<p><i class='bx bxs-pencil' ></i></p>
				</div>
			</li>
		</ul>
	</div>
	<div class="form_wrap">
		<div class="form_1 data_info">
			<h2>My Profile</h2>
			<form>
				<div class="form_container">
                    <div class="input_wrap">
						<label for="first_name">First Name*</label>
						<input type="text" name="First Name" class="input" id="first_name">
					</div>
                    <div class="input_wrap">
						<label for="last_name">Last Name*</label>
						<input type="text" name="Last Name" class="input" id="last_name">
					</div>
					<div class="input_wrap">
						<label for="email">Email</label>
						<input type="text" name="Email" class="input" id="email">
					</div>
					<div class="input_wrap">
						<label for="phone_number">Phone Number</label>
						<input type="phone_number" name="phone_number" class="input" id="phone_number">
					</div>
					<div class="input_wrap">
						<label for="Address">Address</label>
						<input type="address" name="address" class="input" id="address">
					</div>
				</div>
			</form>
		</div>
		<div class="form_2 data_info" style="display: none;">
			<h2>My Experience</h2>
			<form>
				<div class="form_container">
					<div class="input_wrap">
						<label for="education">Education*</label>
						<input type="text" name="Education" class="input" id="education">
					</div>
					<div class="input_wrap">
						<label for="working_experience">Working Experience</label>
						<input type="text" name="Working Experience" class="input" id="working_experience">
					</div>
					<div class="input_wrap">
						<label for="skill">Skill</label>
						<input type="text" name="Skill" class="input" id="skill">
					</div>
				</div>
			</form>
		</div>
		<div class="form_3 data_info" style="display: none;">
			<h2>CV Template</h2>
			<form>

			</form>
		</div>
	</div>
	<div class="btns_wrap">
		<div class="common_btns form_1_btns">
			<button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
		</div>
		<div class="common_btns form_2_btns" style="display: none;">
			<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
			<button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
		</div>
		<div class="common_btns form_3_btns" style="display: none;">
			<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
			<button type="button" class="btn_done">Done</button>
		</div>
	</div>
</div>

<div class="modal_wrapper">
	<div class="shadow"></div>
	<div class="success_wrap">
		<span class="modal_icon"><ion-icon name="checkmark-sharp"></ion-icon></span>
		<p>You have successfully completed the process.</p>
	</div>
</div>
<!-- partial -->
  <script  src="assets/js/cvform.js"></script>

</body>
</html>
