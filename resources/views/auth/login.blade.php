@extends('layouts.auth')
@section('title')
    Login
@endsection
@section('content')
    <div class="wrapper">
      <div>
         {{-- @if(session()->has('error')) --}}
            {{-- {{session()->get('status')}} --}}
          {{-- @endif --}}
      </div>
        <a href="{{route('home')}}">
          <div class="logo">
              <center>
                  <img src="{{asset('assets/img/logojobs.png')}}" alt="Image" style="width: auto;height:100px;">
              </center>
          </div>
        </a>

        <div class="form-inner">
          <form action="" method="" class="login">
            {{-- Alert --}}
            @if (session('alert'))
                <div class="form-group mb-4">
                    <x-alert type="{{ session('alert.type') }}" :dismissible="'true'">
                        {{ session('alert.message') }}
                    </x-alert>
                </div>
            @endif
            <pre>
            </pre>
            <div class="field">
              <input type="" placeholder="Email or Phone Number" id="email_telepon" name="email_telepon" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Password" id="password" name="password" required>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input class="btn-login" type="submit" value="Login">
            </div>
            <div class="signup-link">Don't have an account? <a href="{{route('regisView')}}">Sign Up</a></div>
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
@section('layout_script')
    <script>
      $(document).on('click', '.btn-login', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('submit.login')}}",
                type: 'POST',
                method:"POST",
                data: {
                  submit: true,
                  "email_telepon": $("#email_telepon").val(),
                  "password":$("#password").val()
                },

                success: function(data) {
                    if (data.status == 'success') {
                      if(data.role=='company'){
                        Swal.fire({
                            title: 'Company Login Successfully!',
                            icon: 'success',
                            showConfirmButton: true,
                        }).then(function(){
                          window.location="{{route('view.company.dashboard')}}";
                        });
                      }else if(data.role=='applicant'){
                        Swal.fire({
                            title: 'Login Successfully!',
                            icon: 'success',
                            showConfirmButton: true,
                        }).then(function(){
                          window.location="{{route('home')}}";
                        });
                      }
                    }
                    else if(data.status=='failed'){
                      Swal.fire({
                        title: 'Failed to login!',
                        text:data.message,
                        icon: 'error',
                        showConfirmButton: true,
                      });
                    }
                },
                error: function(){
                    Swal.fire({
                        title: 'Failed to login!',
                        text: "Failed to send the data",
                        icon: 'error',
                        showConfirmButton: true,
                    });
                }
            });
        });
    </script>
@endsection

