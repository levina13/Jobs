@extends('layouts.company')
@section('title','Profile Company')

@section('content')

<!-- Profile -->
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header"></div>
      <center>
          <img width="20%" src="{{ asset('uploads/profil_image/'.$company->photo)}}" alt="image"  />
          <br>
          <h2>{{$company->name}}
            <a href="{{route('editprofilecompany',['id'=>$company->id])}}">
              <button type="button" class="btn btn-gradient-primary btn-rounded btn-icon btn-lg">
                <i class="mdi mdi mdi-pencil"></i>
              </button>
            </a>
          </h2>
          <h3>{{$company->sector}}</h3>

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
                          <div style="text-align: right;"><h5>{{$company->email}}</h5></div>
                        </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div style="text-align: left;"><h4>Contact</h4></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div style="text-align: right;"><h5>{{$company->telepon}}</h5></div>
                        </div>
                      </div>
                  </div>

                  {{-- <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div style="text-align: left;"><h4>Founded Year</h4></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div style="text-align: right;"><h5>1989</h5></div>
                        </div>
                      </div>
                  </div> --}}

                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div style="text-align: left;"><h4>Location</h4></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div style="text-align: right;"><h5>{{$company->address}}</h5></div>
                        </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div style="text-align: center;"><h4>About</h4></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <div style="text-align: left;"><h5>{{$company->description}}</h5></div>
                        </div>
                      </div>

                    </div>

                </div>
              </div>
      </center>
      </div>
  </div>
</div>
    <!-- content-wrapper ends -->
  </div>
  <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>

@endsection
