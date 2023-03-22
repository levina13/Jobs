@extends('layouts.company')
@section('title','Add Job Vacancies')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12">
            <div class="card">
              <div class="card-body">
                <center>
                    <h1 class="display-3"> Job Details</h1>
                </center>
                <br>
                <br>
                <form class="form-sample">
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Job name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Position</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Education</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>

                  </div>



                  <p class="card-description"> Time </p>
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Start</label>
                        <div class="col-sm-9">
                          <input class="form-control" placeholder="dd/mm/yyyy" />
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">End</label>
                          <div class="col-sm-9">
                            <input class="form-control" placeholder="dd/mm/yyyy" />
                          </div>
                        </div>
                      </div>

                  </div>

                  <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary me-2">Add job vacancies</button>
                    <button class="btn btn-light">Cancel</button>


                </form>
              </div>
            </div>
          </div>
    </div>
          <!-- content-wrapper ends -->

@endsection
