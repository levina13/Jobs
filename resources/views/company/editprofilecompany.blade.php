@extends('layouts.company')
@section('title','Edit Profile Company')

@section('content')

    <!-- Edit Profile -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header"></div>

        <div class="col-12">
            <div class="card">
              <div class="card-body">
                <center>
                <h4 class="card-title">Edit Profile</h4>
                </center>
                <br>
                <form class="form-sample">


                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Company name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                    </div>


                  <div class="row">

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Sector</label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option>Category1</option>
                              <option>Category2</option>
                              <option>Category3</option>
                              <option>Category4</option>
                            </select>
                          </div>
                        </div>
                      </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Founded Year</label>
                        <div class="col-sm-9">
                          <input class="form-control" placeholder="dd/mm/yyyy" />
                        </div>
                      </div>
                    </div>
                  </div>


                  <p class="card-description"> Location </p>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">City</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Country</label>
                        <div class="col-sm-9">
                          <select class="form-control">
                            <option>America</option>
                            <option>Italy</option>
                            <option>Russia</option>
                            <option>Britain</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="exampleTextarea1">Address</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleTextarea1">About</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Upload Photo</label>
                    <input type="file" name="img[]" class="file-upload-default">
                    <div class="input-group col-xs-12">
                      <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                      <span class="input-group-append">
                        <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                      </span>
                    </div>
                  </div>

                  <center>
                  <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
                  <button class="btn btn-light">Cancel</button>
                </center>




        </div>
    </div>
</div>


      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>

@endsection
