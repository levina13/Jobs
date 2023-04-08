<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Creative 2</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{asset('templateCV/creative2/creative2.css')}}">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
<div class="canvas">

	<div class="resume_wrapper">
		<div class="resume_left">
			<div class="resume_image">
				<img src="{{asset('uploads/profil_image/'.$user->photo)}}" alt="Resume_image">
			</div>
			<div class="resume_bottom">
				<div class="resume_item resume_namerole">
					<div class="name">
						{{$user->first_name}} {{$user->last_name}}</div>
					<div class="role">
						{{$user->headline}}
					</div>
				</div>
				<div class="resume_item resume_profile">
					<div class="resume_title">Profile <br></div>
					<div class="resume_info">{!!$user->profile!!}</div>
				</div>
				<div class="resume_item resume_address">
					<div class="resume_title">Address</div>
					<div class="resume_info">
						{{$user->address}}
					</div>
				</div>
				<div class="resume_item resume_contact">
					<div class="resume_title">Contact</div>
					<div class="resume_info">
						<div class="resume_subtitle">Phone</div>
						<div class="resume_subinfo">{{$user->phone_number}}</div>
					</div>
					<div class="resume_info">
						<div class="resume_subtitle">Email</div>
						<div class="resume_subinfo">{{$user->email}}</div>
					</div>
				</div>
				<div class="resume_item resume_skills">
					<div class="resume_title">Skills</div>
					<div class="resume_info">
						{!!$user->skill!!}
					</div>
				</div>
			</div>
		</div>
		<div class="resume_right">
			<div class="resume_item resume_namerole">
				<div class="name">{{$user->first_name}} {{$user->last_name}}</div>
				<div class="role">{{$user->headline}}</div>
			</div>
			<div class="resume_item resume_education">
				<div class="resume_title">Education</div>
				<div class="resume_info">
					<div class="resume_data">
						<div class="content">
							{!!$user->education!!}
						</div>
					</div>
				</div>
			</div>
			<div class="resume_item resume_experience">
				<div class="resume_title">Experience</div>
				<div class="resume_info">
					<div class="resume_data">
						<div class="content">
							{!!$user->working_experience!!}
						</div>
					</div>
				</div>
			</div>
			{{-- <div class="resume_item resmue_interests">
				<div class="resume_title">Interests</div>
				<div class="resume_info">
					<div class="interests">
						<div class="int_icon">
							<i class="fas fa-volleyball-ball"></i>
						</div>
						<div class="int_data">Volleyball</div>
					</div>
					<div class="interests">
						<div class="int_icon">
							<i class="fas fa-book-open"></i>
						</div>
						<div class="int_data">Reading</div>
					</div>
					<div class="interests">
						<div class="int_icon">
							<i class="fas fa-film"></i>
						</div>
						<div class="int_data">Movies</div>
					</div>
					<div class="interests">
						<div class="int_icon">
							<i class="fas fa-biking"></i>
						</div>
						<div class="int_data">Riding</div>
					</div>
				</div>
			</div> --}}
		</div>
	</div>
</div>

</body>
</html>
@include('cv.template.print')