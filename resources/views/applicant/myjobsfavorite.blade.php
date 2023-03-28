@extends('layouts.applicant')
@section('title','My Jobs - Favorite')

@section('content')
<style>
  a{text-decoration: none}
</style>

<!-- partial -->
<br><br><br><br><br><br><br><br><br>
<div class="main-panel">
    <div class="page-header"></div>
      <div class="row">
            <a href="{{route('myjobshistory')}}" class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-secondary card-img-holder text-white">
                    <div class="card-body">
                        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <i class="mdi mdi-clock mdi-24px float-right"></i>
                        <h2 class="mb-5">History</h2>
                    </div>
                </div>
            </a>

            <a href="{{route('myjobscurrently')}}" class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-secondary card-img-holder text-white">
                    <div class="card-body">
                        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                        <h2 class="mb-5">Currently</h2>
                    </div>
                </div>
            </a>

            <a href="{{route('myjobsfavorite')}}" class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <i class="mdi mdi-star mdi-24px float-right"></i>
                        <h2 class="mb-5">Favorite</h2>
                    </div>
                </div>
            </a>

        </div>

        <!-- tabel favorite -->
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Favorite</h4>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Company Name</th>
                      <th>Position</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($loker as $item)
                      <tr>
                        <td>{{$item->company_name}}</td>
                        <td>{{$item->position}}</td>


                        <td>
                          <a href="{{route('detailjobs',['id'=>$item->id_loker])}}">
                            <button class="badge badge-info">Detail Job</button>
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
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
