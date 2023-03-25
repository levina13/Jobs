@extends('layouts.applicant')
@section('title','My Jobs - Currently')

@section('content')

<!-- partial -->
<br><br><br><br><br><br><br><br><br><br>
<div class="main-panel">
    <div class="page-header"></div>
      <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-secondary card-img-holder text-white" >
                    <div class="card-body">
                        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <i class="mdi mdi-clock mdi-24px float-right"></i>
                        <h2 class="mb-5" >History</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                        <h2 class="mb-5">Currently</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-secondary card-img-holder text-white">
                    <div class="card-body">
                        <img src="admin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                        <i class="mdi mdi-star mdi-24px float-right"></i>
                        <h2 class="mb-5">Favorite</h2>
                    </div>
                </div>
            </div>

        </div>

        <!-- tabel currently -->
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Currently</h4>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Company Name</th>
                      <th>Position</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>PT Kalbe</td>
                        <td>General Manager</td>
                        <td><label class="badge badge-info">Status</label></td>
                      </tr>
                    <tr>
                        <td>PT Kalbe</td>
                        <td>General Manager</td>
                        <td><label class="badge badge-info">Status</label></td>
                      </tr>
                    <tr>
                        <td>PT Kalbe</td>
                        <td>General Manager</td>
                        <td><label class="badge badge-info">Status</label></td>
                      </tr>
                    <tr>
                        <td>PT Kalbe</td>
                        <td>General Manager</td>
                        <td><label class="badge badge-info">Status</label></td>
                    </tr>
                    <tr>
                        <td>PT Kalbe</td>
                        <td>General Manager</td>
                        <td><label class="badge badge-info">Status</label></td>
                      </tr>
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
