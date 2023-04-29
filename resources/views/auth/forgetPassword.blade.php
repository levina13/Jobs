@extends('layouts.forgetPassword')
@section('title')
    Forget Password
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
                    <div class="title login">Forgot Password?</div>
                </div>
                <center>
                    <div>Enter your email address.</div>
                </center>
                <div class="text-center">
                  <div class="panel-body">
                      <div class="form-group">
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
                        <br>
                        <span class="d-none text text-danger" errorFor="email"><br></span>
                        <p style="margin:20px;"></p>
                      <div class="form-group">
                        <button name="recover-submit" class="btn-sendEmail btn btn-lg btn-primary btn-block" style="background: -webkit-linear-gradient(right,#003366,#004080,#0059b3, #0073e6);
                        border-radius: 15px;
                        transition: all 0.4s ease;" value="Reset Password" >Reset Password</button>
                      </div>

                      <input type="hidden" class="hide" name="token" id="token" value="">

                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
@section('layout_script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      $(document).on('click', '.btn-sendEmail', function (e) { 
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('forget.password.post')}}",
                type: 'DELETE',
                data: {
                  method: '_DELETE', 
                  submit: true,
                  "email": $("#email").val(),
                },

                success: function(data) {
                    console.log(data);
                    if (data.status == 'success') {
                        Swal.fire({
                            title: 'Email is sent successfully!',
                            text: 'Open your email to get the reset password link.',
                            icon: 'success',
                            showConfirmButton: true,
                        }).then(function(){
                          window.location="{{route('home')}}";
                        });
                    } else {
                        if(data.cause=='input'){
                          let dataError = JSON.parse(data.error)
                          for (const key in dataError) {
                            $(`[errorFor="${key}"]`).html(dataError[key][0]).removeClass('d-none')
                          }
                        }
                        Swal.fire({
                            title: 'Email is not sent!',
                            text: data.message,
                            icon: 'error',
                            showConfirmButton: true,
                        });
                    }
                },
                error: function(){
                    Swal.fire({
                        title: 'Email is not sent!',
                        text: 'Failed to send the email',
                        icon: 'error',
                        showConfirmButton: true,
                    });
                }
            });
        });
    </script>
@endsection
</body>
@endsection
