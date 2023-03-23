@extends('layouts.company')
@section('title','Dashboard')

@section('content')

        <!-- Dashboard -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-warning card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('admin/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">{{$jobVacancies}}<i class="mdi mdi-calendar-check mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">Job Vacancies</h2>
                    <h6 class="card-text">Has Successfully Uploaded</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('admin/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">{{$applicants}}<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">Applicants</h2>
                    <h6 class="card-text">Have Submitted a Job Application</h6>
                  </div>
                </div>
              </div>
              <div class="flex-row"></div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('admin/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">{{$accepted}} people <i class="mdi mdi-checkbox-multiple-marked mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">Accepted</h2>
                    <h6 class="card-text">To Work With Us</h6>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('admin/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">{{$rejected}} people <i class="mdi mdi-close-box mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">Rejected</h2>
                    <h6 class="card-text">In This Job Vacancy</h6>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </div>
    </div>
@endsection
