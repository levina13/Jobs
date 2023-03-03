@extends('layouts.auth')
@section('title')
    Login
@endsection
@section('content')
    <div class="wrapper">
        <div class="logo">
            <center>
                <img src="{{asset('assets/img/logojobs.png')}}" alt="Image" style="width: auto;height:100px;">
            </center>
        </div>

        <div class="form-inner">
          <form action="{{route('submit.login')}}" method="POST" class="login">
            @csrf
            <pre>
            </pre>
            <div class="field">
              <input type="email" placeholder="Email " name="email_telepon" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Login">
            </div>
            <div class="signup-link">Don't have an account? <a href="{{route('page.registrasiPerusahaan')}}">Sign Up</a></div>
            <span
            style="display:inline-block; 
            vertical-align:middle; 
            margin:10px 0 10px; 
            border-bottom:1px solid #cecece; width:330px;"></span>
            <center>
                <div class="pass-link">Can't remember your password? <a href="{{route('forget.password.get')}}">Forgot Password</a></div>
            </center>
          </form>
        </div>
    </div>

@endsection
