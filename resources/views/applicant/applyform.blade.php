@extends('layouts.applicant')
@section('title','Apply Job')

@section('content')

<!-- partial -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="main-panel">
    <div class="col-12">
        <div class="card">
          <div class="card-body">
            <center>
                <h2>Apply Job</h2>
            </center>
            <br>
            <img src="" alt=""><h4>logo company</h4>
            <h4>company name</h4>
            <br>
            <p class="card-description"> Personal info </p>

            <form class="form-sample">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">First Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Last Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Place of Birth</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Date of Birth</label>
                        <div class="col-sm-9">
                          <input class="form-control" placeholder="dd/mm/yyyy" />
                        </div>
                      </div>
                    </div>
                  </div>

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Contact</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" />
                      </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" />
                      </div>
                    </div>
                </div>
              </div>

              <div class="form-group">
                <label for="exampleTextarea1">Address</label>
                <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
              </div>

              <div class="form-group">
                <label>Upload CV</label>
                <input type="file" name="img[]" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload CV">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>

              <p class="card-description"> Additional Document </p>
              <div class="form-group">
                <label>File upload</label>
                <input type="file" name="img[]" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label>File upload</label>
                <input type="file" name="img[]" class="file-upload-default">
                <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                  </span>
                </div>
              </div>

              <button type="submit" class="btn btn-gradient-primary me-2">Apply Job</button>
                <button class="btn btn-light">Cancel</button>


            </form>
          </div>
        </div>
      </div>




      <!-- content-wrapper ends -->


      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>

@endsection
