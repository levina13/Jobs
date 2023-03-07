@extends('layouts.forgetPassword')

@section('title')
Set New Password
@endsection

@section('content')
<body style="background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%); display: grid;
height: 100%;
place-items: center;
margin: 100px;
        margin-top: 80px;
        margin-right: 100px ;
        margin-bottom: 80px;
        margin-left: 100px;">

<div class="wrapper">
    <a href="{{route('home')}}">
        <div class="logo">
            <center>
                <img src="{{asset('assets/img/logojobs.png')}}" alt="Image" style="width: auto;height:100px;">
            </center>
        </div>
    </a>
    <p style="margin:20;"></p>
    <span
    style="display:inline-block; 
            vertical-align:middle; 
            margin:10px 0 10px; 
            border-bottom:1px solid #cecece; width:330px;"></span>
<div class="title-text">
    <div class="title login">Set New Password</div>
</div>
<p style="margin:20;"></p>
<div>
    <form id="register-form" role="form" autocomplete="off" class="form" action="{{route('reset.password.post')}}" method="post">
        @csrf
        
        <div class="form-group">
            <input type="hidden" name="tokens" value="{{$token}}">

            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue" style="border-radius: 5px;"></i></span>
                <input id="email" name="email" placeholder="email address" class="form-control"  type="email" style="height: 100%;
                width: 100%;
                outline: none;
                padding-left: 15px;
                border-radius: 5px;
                border: 1px solid lightgrey;
                border-bottom-width: 2px;
                font-size: 17px;
                transition: all 0.3s ease;" 
                required>
            </div>
        
        <p style="margin:20;"></p>
        <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="newpassword" name="password"  placeholder="new password" class="form-control"  type="password" style="height: 100%;
                width: 100%;
                outline: none;
                padding-left: 15px;
                border-radius: 5px;
                border: 1px solid lightgrey;
                border-bottom-width: 2px;
                font-size: 17px;
                transition: all 0.3s ease;"  required>
        </div>
        {{-- <p style="margin:20;"></p>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="confrimpassword" name="confrimpassword"  placeholder="confrim password" class="form-control"  type="confrimpassword" style="height: 100%;
                    width: 100%;
                    outline: none;
                    padding-left: 15px;
                    border-radius: 5px;
                    border: 1px solid lightgrey;
                    border-bottom-width: 2px;
                    font-size: 17px;
                    transition: all 0.3s ease;" >
            </div>
        <p style="margin:30;"></p> --}}
        <p style="margin:30;"></p>
            <div class="form-group">
                <input name="recover-submit" class="btn btn-lg btn-primary btn-block" 
                style="background: -webkit-linear-gradient(right,#003366,#004080,#0059b3, #0073e6);
                border-radius: 15px; transition: all 0.4s ease;" value="Reset Password" type="submit">
            </div>
            <input type="hidden" class="hide" name="token" id="token" value="">
    </form>

                  </div>
                </div>
	</div>
</div>
</body>
@endsection

@section('layout_script')

@endsection