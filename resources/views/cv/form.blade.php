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
			<form>
				<div class="form_container">
                    <div class="input_wrap">
						<label for="first_name">First Name*</label>
						<input type="text" name="First Name" class="input" id="first_name">
					</div>
                    <div class="input_wrap">
						<label for="last_name">Last Name*</label>
						<input type="text" name="Last Name" class="input" id="last_name">
					</div>
					<div class="input_wrap">
						<label for="email">Email</label>
						<input type="text" name="Email" class="input" id="email">
					</div>
					<div class="input_wrap">
						<label for="phone_number">Phone Number</label>
						<input type="phone_number" name="phone_number" class="input" id="phone_number">
					</div>
					<div class="input_wrap">
						<label for="Address">Address</label>
						<input type="address" name="address" class="input" id="address">
					</div>
				</div>
			</form>
		</div>
		<div class="form_2 data_info" style="display: none;">
			<h2>My Experience</h2>
			<form>
				<div class="form_container">
					<div class="input_wrap">
						<label for="education">Education*</label>
						<input type="text" name="Education" class="input" id="education">
					</div>
					<div class="input_wrap">
						<label for="working_experience">Working Experience</label>
						<input type="text" name="Working Experience" class="input" id="working_experience">
					</div>
					<div class="input_wrap">
						<label for="skill">Skill</label>
						<input type="text" name="Skill" class="input" id="skill">
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
			<button type="button" class="btn_done">Done</button>
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
@endsection