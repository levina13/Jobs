@extends('layouts.app')
@section('title')
cv-form
@endsection
@section('content')
<!--index.partial.html -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<div class="wrapper">
	<div class="header">
		<ul>
			<li class="active form_1_progessbar">
				<div>
					<p><i class='bx bxs-user' ></i></p>
				</div>
			</li>
			<li class="form_2_progessbar">
				<div>
					<p><i class='bx bx-file' ></i></p>
				</div>
			</li>
			<li class="form_3_progessbar">
				<div>
					<p><i class='bx bxs-pencil' ></i></p>
				</div>
			</li>
		</ul>
	</div>
	<div class="form_wrap">
		<div class="form_1 data_info">
			<h2>My Profile</h2>
			<form id="cvForm">
				<input type="hidden" name="id_cv" id="id_cv" value="{{$id }}">
				<div class="form_container">
                    <div class="input_wrap">
						<label for="first_name">First Name*</label>
						<input type="text"  class="input" id="first_name" value="{{$history->first_name??''}}">
						<span class="d-none text text-danger" errorFor="first_name"><br></span>
					</div>
                    <div class="input_wrap">
						<label for="last_name">Last Name*</label>
						<input type="text" name="Last Name" class="input" id="last_name" value="{{$history->last_name??''}}">
						<span class="d-none text text-danger" errorFor="last_name"><br></span>
					</div>
					<div class="input_wrap">
						<label for="email">Email</label>
						<input type="text" name="Email" class="input" id="email" value="{{$history->email??''}}">
						<span class="d-none text text-danger" errorFor="email"><br></span>
					</div>
					<div class="input_wrap">
						<label for="phone_number">Phone Number</label>
						<input type="phone_number" name="phone_number" class="input" id="phone_number"value="{{$history->phone_number??''}}">
						<span class="d-none text text-danger" errorFor="phone_number"><br></span>
					</div>
					<div class="input_wrap">
						<label for="Address">Address</label>
						<input type="address" name="address" class="input" id="address" value="{{$history->address??''}}">
						<span class="d-none text text-danger" errorFor="address"><br></span>
					</div>
					<div class="input_wrap">
						<label for="profile">Your Profile</label>
						<span class="d-none text text-danger" errorFor="profile"><br></span>
						{{-- <input type="text" name="Education" class="input" id="education"> --}}
						<textarea name="" id="profile">
							{!!$history->profile??''!!}
						</textarea>
					</div>
				</div>
		</div>
		<div class="form_2 data_info" style="display: none;">
			<h2>My Experience</h2>
				<div class="form_container">
					<div class="input_wrap">
						<label for="education">Education*</label>
						<span class="d-none text text-danger" errorFor="education"><br></span>
						{{-- <input type="text" name="Education" class="input" id="education"> --}}
						<textarea name="" id="education">
							{!!$history->education??''!!}
						</textarea>
					</div>
					<div class="input_wrap">
						<label for="working_experience">Working Experience</label>
						<span class="d-none text text-danger" errorFor="working_experience"><br></span>
						{{-- <input type="text" name="Working Experience" class="input" id="working_experience"> --}}
						<textarea name="" id="working_experience">
							{!!$history->working_experience??''!!}
						</textarea>
					</div>
					<div class="input_wrap">
						<label for="skill">Skill</label>
						<span class="d-none text text-danger" errorFor="skill"><br></span>
						{{-- <input type="text" name="Skill" class="input" id="skill"> --}}
						<textarea name="" id="skill">
							{!!$history->skill??''!!}
						</textarea>
					</div>
				</div>
			</form>
		</div>
		<div class="form_3 data_info" style="display: none;">
			<h2>CV Template</h2>
			<form>

			</form>
		</div>
	</div>
	<div class="btns_wrap">
		<div class="common_btns form_1_btns">
			<button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
		</div>
		<div class="common_btns form_2_btns" style="display: none;">
			<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
			<button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
		</div>
		<div class="common_btns form_3_btns" style="display: none;">
			<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
			<button type="button" class="btn-submit">Done</button>
		</div>
	</div>
</div>

<div class="modal_wrapper">
	<div class="shadow"></div>
	<div class="success_wrap">
		<span class="modal_icon"><ion-icon name="checkmark-sharp"></ion-icon></span>
		<p>You have successfully completed the process.</p>
	</div>
</div>
<!-- partial -->
@endsection

@section('layout_script')
  <script  src="{{asset('js/cvform.js')}}"></script>

  {{-- CKEditor --}}
	<script>
		var options = {
			filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
			filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token='+document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
			filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
			filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='+document.querySelector('meta[name="csrf-token"]').getAttribute('content')
		};
	</script>
	<script>
		CKEDITOR.replace('education', options);
		CKEDITOR.replace('working_experience', options);
		CKEDITOR.replace('skill', options);
		CKEDITOR.replace('profile', options);
	</script>



  {{-- Submit --}}
    <script>

      $(document).on('click', '.btn-submit', function(e) {
        e.preventDefault();
        // var formData = new FormData(document.getElementById("cvForm"));
            $(`[errorFor=first_name]`).html('');
            $(`[errorFor=last_name]`).html('');
            $(`[errorFor=email]`).html('');
            $(`[errorFor=phone_number]`).html('');
            $(`[errorFor=address]`).html('');
            $(`[errorFor=education]`).html('');
            $(`[errorFor=working_experience]`).html('');
            $(`[errorFor=skill]`).html('');
            $(`[errorFor=profile]`).html('');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('submitCV')}}",
            type: 'POST',
            method:"POST",
            data: {
				submit:true,
				"first_name": $('#first_name').val(),
				"last_name": $('#last_name').val(),
				"email": $('#email').val(),
				"phone_number": $('#phone_number').val(),
				"address": $('#address').val(),
				"education":CKEDITOR.instances['education'].getData(),
				"working_experience":CKEDITOR.instances['working_experience'].getData(),
				"skill":CKEDITOR.instances['skill'].getData(),
				"profile":CKEDITOR.instances['profile'].getData(),
				"id_cv": $('#id_cv').val(),

			},
            success: function(data) {
              console.log(data);
              console.log(data.message);
                if (data.status == 'success') {
                  Swal.fire({
                      title: 'Successfully Make your CV!!',
                      text:data.message,
                      icon: 'success',
					  timer:3000,
                  }).then(function(){
                    window.open("/pdfCV/"+data.id,'_blank');
					window.location="{{route('cvawal')}}";

                  });
                }
                else if(data.status=='failed'){
                  let dataError = JSON.parse(data.error)
                  for (const key in dataError) {
                    $(`[errorFor="${key}"]`).html(dataError[key][0]).removeClass('d-none')
                  }

                  Swal.fire({
                    title: 'Failed to Create your CV!',
                    icon: 'error',
					text:'Your data is not successfully validated',
                    showConfirmButton: true,
                  });
                }
            },
            error: function(data){
                console.log(data);
                Swal.fire({
                    title: 'Failed to Create your CV!',
                    icon: 'error',
                    showConfirmButton: true,
                });
            }
        });
      });
    </script>



@endsection


