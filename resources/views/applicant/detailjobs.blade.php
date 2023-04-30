@extends('layouts.applicant')
@section('title','Jobs Detail')

@section('content')
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

<style>
  a{text-decoration: none}
</style>


<!-- partial -->
<main id="main">
        <div class="container">

            <div class="main-panel">
                <div class="row">
                    <center><h1>{{$loker->title}}</h1></center>
                </div>
                <center>
                    <img width="20%" src="{{ asset('uploads/profil_image/'.$loker->photo)}}" alt="image" />
                    <a class="btn-favorite" href="#" data-id="{{$loker->id}}" >
                        @if (is_null($loker->id_favorite))
                            <span class="fab fa-4x" style="color:grey;">&#9829;</span>
                        @else
                            <span class="fab fa-4x" style="color: #e25555;">&#9829;</span>
                        @endif                    
                    </a>
                </center>
                    <br>
                    <a href="{{route('companyProfile',['id'=>$loker->id_perusahaan])}}">
                        <h2>{{$loker->name}}</h2>
                    </a>
                    <br>
                    <h2>{{$loker->position}}</h2>
                    <br>
                    <h3>Salary</h3>
                    <h4>Rp. {{number_format($loker->salary,2,',','.')}}</h4>
                    <br>
                    <h3>Contract</h3>
                    <h4>{{$loker->contract}}</h4>
                    <br>
                    <h2>Job Vacancy Description</h2>
                    <h4>
                        {!!$loker->description!!}
                    </h4>
                    <br>
                    <br>
                    <center>
                        <div class="col-md-4">
                            <div class="template-demo">
                                <a href="{{route('cvawal')}}">
                                    <button type="button" class="btn btn-gradient-info btn-lg btn-block btn-lg" >Build CV </button>
                                </a>
                                @if ($applyButton=='disabled')
                                    <button type="button" class="btn btn-gradient-primary btn-lg btn-block btn-lg" disabled> Apply</button>

                                @else
                                <a href="{{route('applyform',['id'=>$loker->id])}}" >
                                    <button type="button" class="btn btn-gradient-primary btn-lg btn-block btn-lg" > Apply </button>
                                </a>
                                @endif
                            </div>
                        </div>
                    </center>
                    <br>
                        </div>
                        </div>
                    </div>

                </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->

                    <!-- partial -->
                </div>
                    <!-- main-panel ends -->

                <!-- page-body-wrapper ends -->
            </div>
        </div>
</main>

@include('layouts.footer')
@endsection

@section('layout_script')
	<script>
      $(document).on('click', '.btn-favorite', function (e) {
        var id = $(this).data('id');
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: "/favorite/"+id,
			type: 'POST',
			method:"POST",
			data: {submit: true},

			success: function(data) {
				if (data.status == 'success') {
					Swal.fire({
						title: 'Success!!',
						text:data.message,
						icon: 'success',
						showConfirmButton: true,
					}).then(function(){
						location.reload();
					});
				}
				else if(data.status=='failed'){
					Swal.fire({
						title: 'Failed!!',
						icon: 'error',
						showConfirmButton: true,
					});
				}
			},
			error: function(){
				Swal.fire({
					title: 'Failed',
					icon: 'error',
					showConfirmButton: true,
				});
			}
		});
      });

    </script>
@endsection
