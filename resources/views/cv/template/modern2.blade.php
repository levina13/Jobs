<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modern 2</title>
	<link rel="stylesheet" href="{{asset('templateCV/modern2/modern2.css')}}">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="canvas">

			<div class="resume">
				<div class="left">
					<div class="img_holder">
						<img src="{{asset('uploads/profil_image/'.$user->photo)}}" alt="picture">
					</div>
					<div class="contact_wrap pb">
						<div class="title">
							Contact
						</div>
						<div class="contact">
							<ul>
								<li>
									<div class="li_wrap">
										<div class="icon"><i class="fas fa-mobile-alt" aria-hidden="true"></i></div>
										<div class="text">{{$user->phone_number}}</div>
									</div>
								</li>
								<li>
									<div class="li_wrap">
										<div class="icon"><i class="fas fa-envelope" aria-hidden="true"></i></div>
										<div class="text">{{$user->email}}</div>
									</div>
								</li>
								<li>
									<div class="li_wrap">
										<div class="icon"><i class="fas fa-map-signs" aria-hidden="true"></i></div>
										<div class="text">{{$user->address}}</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="skills_wrap pb">
						<div class="title">
							Skills
						</div>
						<div class="skills">
							{!!$user->skill!!}
						</div>
					</div>
				</div>
				<div class="right">
					<div class="header">
						<div class="name_role">
							<div class="name">
								{{$user->first_name}} {{$user->last_name}}
							</div>
							<div class="role">
								{{$user->headline}}
							</div>
						</div>
						<div class="about">
							{!!$user->profile!!}
						</div>
					</div>
					<div class="right_inner">
						<div class="exp">
							<div class="title">
								experience
							</div>
							<div class="exp_wrap">
								{!!$user->working_experience!!}
							</div>
						</div>
						<div class="education">
							<div class="title">
								Education
							</div>
							<div class="education_wrap">
								{!!$user->education!!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
@include('cv.template.print')