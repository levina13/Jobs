@extends('layouts.applicant')
@section('title','Company Profile')

@section('content')

<!-- partial -->
<br><br><br><br><br><br><br>
<div class="main-panel">
    <div class="page-header"></div>
    <center>

    <img width="20%" src="{{ asset('uploads/profil_image/'.$company->photo) }}" alt="image" />
        <br>
        <h2>{{$company->name}}</h2>
        {{-- <h5>Founded Year</h5> --}}
    </center>
        <br>
        <h2>Sector</h2>
        <h4>{{$company->sector}}</h4>
        <br>
        <h2>About</h2>
        <h4>{!!$company->description!!}</h4>
        <br>
        <h2>Location</h2>
        <h4>
            {{$company->address}}
        </h4>
        <br>
        <h2>{{$company->email}}</h2>
        <br>
        <h2>Contact- {{$company->telepon}}</h2>
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
