@extends('layouts.company')
@section('title','Accepted')

@section('content')


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Accepted Applicant</h4>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Profile Photos</th>
                      <th>Applicant's Name</th>
                      <th>Position</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($applicant as $key=>$item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>
                          <img class="img" src="{{ asset('uploads/profil_image/'.$item->photo) }}" alt="image here..">    
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->pekerjaan}}</td>

                          
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

    </div>
          <!-- content-wrapper ends -->
@endsection
