<!DOCTYPE html>
<html>
<head>
	<title>Modern 3</title>
	<link rel="stylesheet" type="text/css" href="{{asset('templateCV/modern3/modern3.css')}}">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

	<div class="wrapper">
		<div class="canvas">

			<div class="resume_design">
				<div class="resume_left">
					<div class="about_sec">
						<div class="button">About Me</div>
							{!!$user->profile!!}
					</div>
					<div class="exp_sec">
						<div class="button">Experience</div>
						{!!$user->working_experience!!}
					</div>
					<div class="edu_sec">
						<div class="button">Education</div>
						{!!$user->education!!}
					</div>
				</div>
				<div class="resume_right">
					<div class="profile_sec">
						<div class="img_holder">
							<img src="{{asset('uploads/profil_image/'.$user->photo)}}" alt="profile image">
						</div>
						<div class="profile_info">
							<p class="first_name">{{$user->first_name}}</p>
							<p class="last_name">{{$user->last_name}}</p>
							<p class="role">{{$user->headline}}</p>
						</div>
					</div>
					<div class="contact_sec">
						<div class="button">Contact US</div>
						<ul>
							<li class="item">
								<div class="icon">
									<i class="fas fa-phone"></i>
								</div>
								<div class="content">
									<p class="title">Phone</p>
									<p class="subtitle">{{$user->phone_number}}</p>
								</div>
							</li>
							<li class="item">
								<div class="icon">
									<i class="fas fa-envelope"></i>
								</div>
								<div class="content">
									<p class="title">Email</p>
									<p class="subtitle">{{$user->email}}</p>
								</div>
							</li>
							<li class="item">
								<div class="icon">
									<i class="fas fa-map-signs"></i>
								</div>
								<div class="content">
									<p class="title">Address</p>
									<p class="subtitle">{{$user->address}}</p>
								</div>
							</li>
						</ul>
					</div>
					<div class="skills_sec">
						<div class="button">Skills</div>
						{{!!$user->skill!!}}
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
@include('cv.template.print')