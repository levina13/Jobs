@extends('layouts.applicant')
@section('title','Profile Applicant')

@section('content')

<!-- partial -->
<br><br><br><br><br><br><br>
<div class="main-panel">
    <div class="page-header"></div>
    <center>
    <img width="20%"  src="{{ asset('uploads/profil_image/'.$applicant->photo) }}" alt="image" />
        <br>
        <h2>{{$applicant->name}} 
          @auth
            @if(Auth::user()->id==$applicant->id)
            <a href="{{route('editprofileapplicant')}}">
              <button type="button" class="btn btn-gradient-primary btn-rounded btn-icon btn-lg">
                <i class="mdi mdi mdi-pencil"></i>
              </button>
            </a>
            @endif
          @endauth
        </h2>
            <h3>{{$applicant->headline}}</h3>

              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <div style="text-align: left;"><h4>Email</h4></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <div style="text-align: right;"><h4>{{$applicant->email}}</h4></div>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <div style="text-align: left;"><h4>Location</h4></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <div style="text-align: right;"><h4>{{$applicant->city}}, {{$applicant->province}}</h4></div>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <div style="text-align: left;"><h4>Education</h4></div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <div style="text-align: right;"><h4>{{$applicant->education}}</h4></div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>


    </center>
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

@endsection
