<!DOCTYPE html>
<html>
<head>
	<title>Simple 1</title>
	<link rel="stylesheet" type="text/css" href="{{asset('templateCV/simple1/simple1.css')}}"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="canvas">

		<div class="main">
			<div class="top-section">
				<img src="{{asset('uploads/profil_image/'.$user->photo)}}" class="profile" />
				<p class="p1">{{$user->first_name}} <span>{{$user->last_name}}</span></p>
				<p class="p2">{{$user->headline}}</p>
			</div>
			<div class="clearfix"></div>
	
			<div class="col-div-4">
				<div class="content-box" style="padding-left: 40px;">
	
	
					<p class="head">Contact</p>
					<p class="p3"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp;&nbsp;{{$user->phone_number}}</p>
					<p class="p3"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;&nbsp;{{$user->email}}</p>
					<p class="p3"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;&nbsp;{{$user->address}}m</p>
	
	
					<br/>
					<p class="head">my skills</p>
					<ul class="skills">
						{!!$user->skill!!}
					</ul>
	
					<br/>
				</div>
			</div>
			<div class="line"></div>
			<div class="col-div-8">
				<div class="content-box">
				<p class="head">profile</p>
				<p class="p3" style="font-size: 14px;">
					{{$user->profile}}
				</p>
				<br/>
				<p class="head">EXPERIENCE</p>
	
					{!!$user->working_experience!!}
	
				<br/>
	
				<p class="head">Education</p>
				{!!$user->education!!}
	
				</div>
			</div>
	
			<div class="clearfix"></div>
	
		</div>
			<br/>
	</div>
</body>
</html>
@include('cv.template.print')