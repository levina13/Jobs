<!Doctype HTML>
<html>
<head>
	<title>Creative 3</title>
	<link rel="stylesheet" type="text/css" href="{{asset('templateCV/creative3/css/creative3.css')}}"/>
</head>

<body>
	<div class="box-outer">
		
		<div class="canvas">
			<div class="resume-box">
				<div class="box-1">
					<img src="{{asset('uploads/profil_image/'.$user->photo)}}" class="profile" />
					<div class="content">
					<h1>About me</h1>
					<p>
						{!!$user->profile!!}
					</p>
		
					<h1>Skills</h1>
						{!!$user->skill!!}
					</div>
		
				</div>
		
				<div class="box-2">
		
					<div class="intro">
						<h1>
						{{$user->first_name}} 
					<span>{{$user->last_name}}</span>
						</h1>
						<hr class="hr" />
						<div class="clearfix"></div>
						<p class="intro-p">{{$user->address}} </p>
						<p>phone {{$user->phone_number}}</p>
						<p>email : {{$user->email}}</p>
					</div>
		
					<div class="content-2">
						<h1 class="head">Experience</h1>
						{!!$user->working_experience!!}
					</div>
		
		
					<div class="content-2">
						<h1 class="head">Education</h1>
						{!!$user->education!!}
		
		
					</div>
		
		
				</div>
		
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</body>

</html>
@include('cv.template.print')