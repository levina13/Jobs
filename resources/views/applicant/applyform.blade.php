@extends('layouts.applicant')
@section('title','Apply Job')

@section('content')

<!-- partial -->
<br><br><br><br><br><br><br>
<div class="main-panel">
    <div class="col-12">
        <div class="card">
          <div class="card-body">
            <center>
                <h2>Apply Job</h2>
            </center>


              <div class="form-group">
                <label for="exampleTextarea1">Upload CV</label>
                <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
              </div>



              <button type="submit" class="btn btn-gradient-primary me-2">Apply Job</button>
                <button class="btn btn-light">Cancel</button>


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
