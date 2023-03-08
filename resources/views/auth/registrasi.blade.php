@extends('layouts.auth')
@section('title')
    Registrasi
@endsection
@section('content')
  <div class="wrapper">
        <a href="{{route('home')}}">
          <div class="logo">
              <center>
                  <img src="{{asset('assets/img/logojobs.png')}}" alt="Image" style="width: auto;height:100px;">
              </center>
          </div>
        </a>
        <div class="form-container">
            @if (session('alert'))
                <div class="form-group mb-4">
                    <x-alert type="{{ session('alert.type') }}" :dismissible="'true'">
                        {{ session('alert.message') }}
                    </x-alert>
                </div>
            @endif

          <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">
            <label for="login" class="slide login">Applicant</label>
            <label for="signup" class="slide signup">Company</label>
            <div class="slider-tab"></div>
          </div>
          <div class="form-inner">
            <form action="{{url('api/login')}}" method="POST" class="login">
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
                  <input type="password" placeholder="Confirm Password" name="confirm password" required>
                </div>
                <div class="field btn">
                  <div class="btn-layer"></div>
                  <input type="submit" value="Sign Up">
                </div>
                <div class="signup-link">Already have an account? <a href="{{route('loginView')}}">Login</a></div>
            </form>

            <form action="#" class="signup">
                
                <div class="field">
                  <input type="text" placeholder="Company Name" required>
                </div>
                <div class="field">
                  <input type="email" placeholder="Email" required>
                </div>
                <div class="field">
                    <input type="text" placeholder="Phone Number" name="telepon" required>
                  </div>
                <div class="field">
                  <input type="password" placeholder="Password" required>
                </div>
                <div class="field">
                  <input type="text" placeholder="Company Address" required>
                </div>
                <div class="select-menu">
                    <div class="select-btn">
                        <span class="sBtn-text">Select Company Sector</span>
                        <i class="bx bx-chevron-down"></i>
                    </div>
            
                    <ul class="options">
                        <li class="option">
                            <span class="option-text">Construction and Real Esttate</span>
                        </li>
                        <li class="option">
                            <span class="option-text">Finance</span>
                        </li>
                        <li class="option">
                            <span class="option-text">Technology</span>
                        </li>
                        <li class="option">
                            <span class="option-text">Advertisement</span>
                        </li>
                        <li class="option">
                            <span class="option-text">Medice</span>
                        </li>
                    </ul>
                </div>
                <div class="field btn">
                  <div class="btn-layer"></div>
                  <input type="submit" value="Sign Up">
                </div>
                <div class="signup-link">Already have an account? <a href="{{route('loginView')}}">Login</a></div>
              </form>
            </div>
          </div>
        </div>

@endsection
