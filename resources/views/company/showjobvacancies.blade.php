@extends('layouts.company')
@section('title','Detail Job Vacancy')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12">
            <div class="card">
              <div class="card-body">
                <center>
                    <h1 class="display-3"> {{$jobVacancy->judul_loker}}</h1>
                </center>
                <br>
                <br>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">{{$jobVacancy->pekerjaan}}e</h4>
                        <h4 class="card-title">{{$jobVacancy->company_name}}</h4>
                        <h4 class="card-title">{{$jobVacancy->contract}}</h4>
                        <h4 class="card-title">{{$jobVacancy->salary}}</h4>
                        <h4 class="card-title">Time</h4>
                        <p class="card-description"> {{$jobVacancy->tanggal_awal}} until {{$jobVacancy->tanggal_akhir}}</p>
                        <h4 class="card-title">Description Job :</h4>
                        <blockquote class="blockquote blockquote-primary">
                          {!!$jobVacancy->deskripsi!!}

                        </blockquote>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
    </div>
          <!-- content-wrapper ends -->

@endsection
