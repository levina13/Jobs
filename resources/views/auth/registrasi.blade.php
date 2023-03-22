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
            <form action="" method="" class="login">
              @csrf
              <div class="field mb-4 form-group">
                  <input type="text" placeholder="Name" id="name" required>
                  <span class="d-none text text-danger" errorFor="name"><br></span>
                </div>
                <div class="field mb-4 pt-1 form-group">
                  <input type="email" placeholder="Email" id="email" required>
                  <span class="d-none text-danger" errorFor="email"></span>
                </div>
                <div class="field mb-4 pt-1 form-group">
                  <input type="text" placeholder="Phone Number" id="telepon" required>
                  <span class="d-none text-danger" errorFor="telepon"></span>
                </div>
                <div class="field mb-4 pt-1 form-group">
                  <input type="password" placeholder="Password" id="password" required autocomplete="current-password">
                  <span class="d-none text-danger" errorFor="password"></span>
                </div>
                <div class="field mb-4 pt-1 form-group">
                  <input type="password" placeholder="Confirm Password"  id="password_confirmation" required autocomplete="current-password">
                  <span class="d-none text-danger" errorFor="password_cofirmation"></span>
                </div>
                <div class="field btn">
                  <div class="btn-layer"></div>
                  <input type="submit" class="btn-regis-user" value="Sign Up">
                </div>
                  <div class="pass-link" style="text-align: center; margin-top: 30px;">Already have an account? <a href="{{route('loginView')}}">Login</a></div>
            </form>

            <form action="#" class="signup">

                <div class="field mb-4 form-group">
                  <input type="text" placeholder="Company Name" id="company_name" required>
                  <span class="d-none text text-danger" errorFor="company_name"><br></span>
                </div>
                <div class="field mb-4 pt-1 form-group">
                  <input type="email" placeholder="Email" id="company_email" required>
                  <span class="d-none text text-danger" errorFor="company_email"><br></span>
                </div>
                <div class="field mb-4 pt-1 form-group">
                    <input type="text" placeholder="Phone Number" id="company_telepon" required>
                  <span class="d-none text text-danger" errorFor="company_telepon"><br></span>
                  </div>
                <div class="field mb-4 pt-1 form-group">
                  <input type="password" placeholder="Password" id="company_password" required>
                  <span class="d-none text text-danger" errorFor="company_password"><br></span>
                </div>
                <div class="field mb-4 pt-1 form-group">
                  <input type="text" placeholder="Company Address" id="company_address" required>
                  <span class="d-none text text-danger" errorFor="company_address"><br></span>
                </div>
                <div class="field mb-4 pt-1 form-group">
                    <select name="company_sector" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                      <option selected >Select Company Sector</option>
                        @foreach ($jenis_perusahaan as $item)
                          <option value="{{$item->id}}">{{$item->jenis_perusahaan}}</option>
                        @endforeach
                      </select>
                      <span class="d-none text text-danger" errorFor="company_id_jenis_perusahaan"><br></span>
                  </div>

                <div class="field btn">
                  <div class="btn-layer"></div>
                  <input type="submit" class="btn-regis-company" value="Sign Up">
                </div>
                <div class="signup-link">Already have an account? <a href="{{route('loginView')}}">Login</a></div>
              </form>
            </div>
          </div>
        </div>

@endsection
@section('layout_script')

{{-- Registrasi User --}}
    <script>
      $(document).on('click', '.btn-regis-user', function (e) {
            $(`[errorFor=name]`).html('');
            $(`[errorFor=email]`).html('');
            $(`[errorFor=password]`).html('');
            $(`[errorFor=password_confirmation]`).html('');
            $(`[errorFor=telepon]`).html('');
          console.log('halo');
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('submit.register.user')}}",
                type: 'POST',
                method:"POST",
                data: {
                  submit: true,
                  "name": $('#name').val(),
                  "email": $("#email").val(),
                  "password":$("#password").val(),
                  "password_confirmation":$("#password_confirmation").val(),
                  "telepon":$("#telepon").val(),
                  "role":"A"
                },

                success: function(data) {
                  console.log(data);
                  console.log(data.message);
                    if (data.status == 'success') {
                      Swal.fire({
                          title: 'Registration success!!',
                          icon: 'success',
                          showConfirmButton: true,
                      }).then(function(){
                        window.location="{{route('loginView')}}";
                      });
                    }
                    else if(data.status=='failed'){
                      let dataError = JSON.parse(data.error)
                      for (const key in dataError) {
                        $(`[errorFor="${key}"]`).html(dataError[key][0]).removeClass('d-none')
                      }

                      Swal.fire({
                        title: 'Failed to register!',
                        icon: 'error',
                        showConfirmButton: true,
                      });
                    }
                },
                error: function(){
                    Swal.fire({
                        title: 'Failed to register!',
                        icon: 'error',
                        showConfirmButton: true,
                    });
                }
            });
        });
    </script>
{{-- Registrasi Company --}}
    <script>
      $(document).on('click', '.btn-regis-company', function (e) {
            $(`[errorFor=compay_name]`).html('');
            $(`[errorFor=company_email]`).html('');
            $(`[errorFor=company_telepon]`).html('');
            $(`[errorFor=company_password]`).html('');
            $(`[errorFor=company_address]`).html('');
            $(`[errorFor=company_sector]`).html('');

            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('submit.register.company')}}",
                type: 'POST',
                method:"POST",
                data: {
                  submit: true,
                  "name": $('#company_name').val(),
                  "email": $("#company_email").val(),
                  "password":$("#company_password").val(),
                  "telepon":$("#company_telepon").val(),
                  "address":$("#company_address").val(),
                  "id_jenis_perusahaan":$('select[name=company_sector] option').filter(':selected').val(),
                  "role":"B"
                },

                success: function(data) {
                  console.log(data);
                  console.log(data.message);
                    if (data.status == 'success') {
                      Swal.fire({
                          title: 'Registration success!!',
                          text:data.message,
                          icon: 'success',
                          showConfirmButton: true,
                      }).then(function(){
                        window.location="{{route('loginView')}}";
                      });
                    }
                    else if(data.status=='failed'){
                      let dataError = JSON.parse(data.error)
                      for (const key in dataError) {
                        $(`[errorFor="company_${key}"]`).html(dataError[key][0]).removeClass('d-none')
                      }

                      Swal.fire({
                        title: 'Failed to register!',
                        icon: 'error',
                        showConfirmButton: true,
                      });
                    }
                },
                error: function(){
                    Swal.fire({
                        title: 'Failed to register!',
                        icon: 'error',
                        showConfirmButton: true,
                    });
                }
            });
        });
    </script>

@endsection
