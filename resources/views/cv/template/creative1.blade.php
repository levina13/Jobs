<!DOCTYPE html>
<html>
<head>
	<title>Creative 1</title>
	<link rel="stylesheet" media="all" type="text/css" href="{{asset('templateCV/creative1/css/creative1.css')}}">
	{{-- <link rel="stylesheet" media="all" type="text/css" href="/var/www/webloker/public/templateCV/creative1/css/creative1.css"> --}}
	{{-- <link media="all" href="{{ asset('templateCV/creative1/css/creative1.css') }}" rel="stylesheet" type="text/css" /> --}}
</head>
<body>
	<div class="canvas">

		<div class="resume-box">
			<div class="left-section">
				<div class="profile">
				<img src="{{asset('uploads/profil_image/'.$user->photo)}}" class="profile-img">
				<div class="blue-box"></div>
				</div>
				<h2 class="name">
					{{$user->first_name}} <br>
					<span>{{$user->last_name}}</span>
				</h2>
				<p class="n-p">{{$user->headline}}</p>


				<div class="info">
					<p class="heading">Info</p>
					<p class="p1"><span class="span1"><img src="{{asset('templateCV/creative1/image/location.png')}}"></span>Address<span> <br>{{$user->address}}</span></p>
					<p class="p1"><span class="span1"><img src="{{asset('templateCV/creative1/image/call.png')}}"></span>Phone Number<span> <br>{{$user->phone_number}}</span></p>
					<p class="p1"><span class="span1"><img src="{{asset('templateCV/creative1/image/mail.png')}}"></span>Email<span> <br>{{$user->email}}</span></p>
					{{-- <p class="p1"><span class="span1"><img src="{{asset('templateCV/creative1/image/domain.png')}}"></span>Website<span> <br>www.dummy.com</span></p> --}}
				</div>

				{{-- <div class="info">
					<p class="heading">Social</p>
					<p class="p1"><span class="span1"><img src="image/skype.png"></span>Skype<span> <br>msofttechskype.com</span></p>
					<p class="p1"><span class="span1"><img src="image/twitter.png"></span>Twitter<span> <br>demotwitter.com</span></p>
					<p class="p1"><span class="span1"><img src="image/linkedin.png"></span>Linkdin<span> <br>linkdindemo.com</span></p>
					<p class="p1"><span class="span1"><img src="image/facebook.png"></span>Facebook<span> <br>facebookdummy.com</span></p>
				</div> --}}

			</div>
			<div class="right-section">
				<div class="right-heading">
					<img src="{{asset('templateCV/creative1/image/user.png')}}">
					<p class="p2">Profile</p>
				</div>
				<p class="p3">{!!$user->profile!!}</p>

				<div class="clearfix"></div>
				<br><br>
				<div class="right-heading">
					<img src="{{asset('templateCV/creative1/image/pencil.png')}}">
					<p class="p2">Work Experience</p>
				</div>
				<div class="clearfix"></div>
				<div class="lr-box">
					<div>
						{!!$user->working_experience!!}
					</div>
					<div class="clearfix"></div>
				</div>
		{{-- 
				<div class="lr-box">
				<div class="left">
					<p class="p4">2014 - 2017</p>
					<p class="p5">New Delhi</p>
				</div>

				<div class="right">
					<p class="p4">Graphic Web Assitant</p>
					<p class="p5">Setup Box Manufactring</p>
					<p class="p5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
				<div class="clearfix"></div>
				</div>

				<div class="lr-box">
				<div class="left">
					<p class="p4">2017 - 2021</p>
					<p class="p5">Noida</p>
				</div>

				<div class="right">
					<p class="p4">Web Designer</p>
					<p class="p5">Retoching Company</p>
					<p class="p5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
				<div class="clearfix"></div>
				</div> --}}


				<br>
				<div class="right-heading">
					<img src="{{asset('templateCV/creative1/image/edu.png')}}">
					<p class="p2">Education</p>
				</div>
				<div class="clearfix"></div>
				<div class="lr-box">
					<div>{!!$user->education!!}</div>
					<div class="clearfix"></div>
				</div>


				<br>
				<div class="right-heading">
					<img src="{{asset('templateCV/creative1/image/edu.png')}}">
					<p class="p2">Skill and expertize</p>
				</div>
				<div class="clearfix"></div>
				<div class="s-box">
					<div>
						{!!$user->skill!!}
					</div>

				</div>
				{{-- <div class="s-box">
					<p class="p6">HTML</p>
					<div id="progress2"></div>
					<p class="p6">CSS</p>
					<div id="progress3"></div>
				</div> --}}


				<div class="clearfix"></div>
				<br><br>
				{{-- <div class="right-heading">
					<img src="image/hobbies.png">
					<p class="p2">Hobby & Internet</p>
				</div>
				<div class="clearfix"></div>
				<img src="image/bicycle.png" class="h-img">
				<img src="image/games.png" class="h-img">
				<img src="image/book.png" class="h-img">
				<img src="image/design.png" class="h-img">
				<img src="image/chess.png" class="h-img"> --}}

			</div>

				<div class="clearfix"></div>


		</div>
	</div>


</body>
</html>
@include('cv.template.print')