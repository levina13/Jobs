@extends('layouts.auth')
@section('title')
    LoginRegister
@endsection
@section('content')

<div class="wrapper">
      <div class="title-text">
        <div class="title login">Jobs</div>
        <div class="title signup">Jobs</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Sign Up</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <form action="{{url('api/login')}}" method="POST" class="login">
            @csrf
            <pre>
            </pre>
            <div class="field">
              <input type="text" placeholder="Email or Phone Number" name="email_telepon" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="pass-link"><a href="#https://github.com/levina13/Jobs/blob/1e715b494e6e86da0961a836f84373c3c70759df/Jobs%20website/resetpasword.html#L13">Forgot password?</a></div>
            <div class="field btn"> 
              <div class="btn-layer"></div>
              <input type="submit" value="Login">
            </div>
            <div class="signup-link">Don't have an account? <a href="">Sign Up</a></div>
          </form>
          <form action="{{url('api/register')}}" method="POST" class="signup">
            <div class="field">
              <input type="text" placeholder="Name" name="name" required>
            </div>
            <div class="field">
              <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="field">
              <input type="text" placeholder="Phone Number" name="telepon" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="field">
              <input type="text" placeholder="Role" name="role" required>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Sign Up">
            </div>
            <div class="signup-link">Already have an account? <a href="">Login</a></div>
          </form>
        </div>
      </div>
    </div>
  
@endsection