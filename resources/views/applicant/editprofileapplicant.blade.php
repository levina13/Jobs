@extends('layouts.applicant')
@section('title','Edit Profile Applicant')

@section('content')

<!-- partial -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="main-panel">
    <div class="page-header"></div>
            <center>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Edit Profile</h4>
                        <br>
                        <form class="forms-sample">
                          <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Full Name">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Headline</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Headline">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Location</label>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Country</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Country">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="City">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Education</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Education">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Upload Photo</label>
                            <div class="col-sm-9">
                                <input type="file" name="img[]" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                  <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                  </span>
                                </div>
                            </div>
                          </div>



                          <button type="submit" class="btn btn-gradient-primary me-2">Save</button>
                          <button class="btn btn-light">Cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>
            </center>



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
