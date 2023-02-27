@extends('layouts.auth')

@section('content')

<div class="wrapper">
      <div class="title-text">
        <div class="title login">Sign Up</div>
        <div class="title signup">Sign Up</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">User</label>
          <label for="signup" class="slide signup">Company</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <form action="{{url('api/login')}}" method="POST" class="login">
            @csrf
            <pre>
            </pre>
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
              <div class="signup-link">Already have an account? <a href="">Login</a></div>


          </form>
          <form action="{{url('api/register')}}" method="POST" class="signup">
            <div class="field">
              <input type="text" placeholder="Company Name" name="company name" required>
            </div>
            <div class="field">
              <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="field">
              <input type="text" placeholder="Phone Number" name="telepon" required>
            </div>
            <div class="field">
                <input type="text" placeholder="Company Address" name="address" required>
              </div>
            <div class="field">
              <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="select-box">
                <div class="options-container">
                  <div class="option">
                    <input
                      type="radio"
                      class="radio"
                      id="automobiles"
                      name="category"
                    />
                    <label for="automobiles">Automobiles</label>
                  </div>
        
                  <div class="option">
                    <input type="radio" class="radio" id="film" name="category" />
                    <label for="film">Film & Animation</label>
                  </div>
        
                  <div class="option">
                    <input type="radio" class="radio" id="science" name="category" />
                    <label for="science">Science & Technology</label>
                  </div>
        
                  <div class="option">
                    <input type="radio" class="radio" id="art" name="category" />
                    <label for="art">Art</label>
                  </div>
        
                  <div class="option">
                    <input type="radio" class="radio" id="music" name="category" />
                    <label for="music">Music</label>
                  </div>
        
                  <div class="option">
                    <input type="radio" class="radio" id="travel" name="category" />
                    <label for="travel">Travel & Events</label>
                  </div>
        
                  <div class="option">
                    <input type="radio" class="radio" id="sports" name="category" />
                    <label for="sports">Sports</label>
                  </div>
        
                  <div class="option">
                    <input type="radio" class="radio" id="news" name="category" />
                    <label for="news">News & Politics</label>
                  </div>
        
                  <div class="option">
                    <input type="radio" class="radio" id="tutorials" name="category" />
                    <label for="tutorials">Tutorials</label>
                  </div>
                </div>
        
                <div class="selected">
                  Select Video Category
                </div>
              </div>
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
