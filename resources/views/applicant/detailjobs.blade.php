@extends('layouts.applicant')
@section('title','Jobs Detail')

@section('content')
<style>
  a{text-decoration: none}
</style>


<!-- partial -->
<br><br><br><br><br><br><br><br>
<div class="main-panel">
    <div class="row">
        <center><h1>{{$loker->title}}</h1></center>
    </div>
    <center>
        <img width="20%" src="{{ asset('uploads/profil_image/'.$loker->photo)}}" alt="image" />
    </center>
        <br>
        <h2>{{$loker->name}}</h2>
        <br>
        <h2>{{$loker->position}}</h2>
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
                    <a href="">
                        <button type="button" class="btn btn-gradient-info btn-lg btn-block btn-lg" >Build CV </button>
                    </a>
                    <a href="{{route('applyform',['id'=>$loker->id])}}">
                        <button type="button" class="btn btn-gradient-primary btn-lg btn-block btn-lg"> Apply </button>
                    </a>
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

@endsection
