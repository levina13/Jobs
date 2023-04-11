<!DOCTYPE html>
<html>
<head>
	<title>Modern 1</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{asset('templateCV/modern1/css/modern1.css')}}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
	<div class="canvas">

		<div class="main">
			<div class="left">
				<br>
				<div class="profile-img"><img src="{{asset('uploads/profil_image/'.$user->photo)}}"></div>
		
				<div class="box-1">
					<div class="heading">
						<p>CONTACT</p>
					</div>
					<p class="p1"><i class="material-icons icons1">call</i>{{$user->phone_number}}</p>
					<p class="p1"><i class="material-icons icons1">email</i>{{$user->email}}</p>
				</div>
		
		
				<div class="box-1">
					<div class="heading">
						<p>SKILLS</p>
					</div>
					{!!$user->skill!!}
		
				</div>
				<br>
		
			</div>
		
		
			<div class="right">
				<div class="name-div">
					<h1>
					{{$user->first_name}} <br>
					<span>{{$user->last_name}}</span>
					</h1>
					<p>{{$user->headline}}</p>
				</div>
		
				<div class="box-2">
					<h2>ABOUT ME <i class="material-icons icons3" style="font-size: 28px!important; ">perm_identity</i></h2>
					{{-- <p class="p2"> --}}
						{!!$user->profile!!}
					{{-- </p> --}}
				</div>
		
		
		
				<div class="box-2">
					<h2>EDUCATION <i class="material-icons icons3" >border_color</i></h2>
					{{-- <p class="p3">2010-2013 <span>Lorem Ipsum is simply dummy</span></p>
					<p class="p2">
						Lorem Ipsum is simply dummy text of
					</p> --}}
					{!!$user->education!!}
				</div>
		
		
				<div class="box-2">
					<h2>WORK EXPERIENCE <i class="material-icons icons3" >folder</i></h2>
					{{-- <p class="p3">2010-2013 <span>Lorem Ipsum is simply dummy</span></p>
					<p class="p2">
						Lorem Ipsum is simply dummy text of
					</p> --}}
		
					{!!$user->working_experience!!}
		
				</div>
		
			</div>
		</div>

	</div>	
	



</body>
</html>
@include('cv.template.print')