@extends('layouts.applicant')
@section('title','Apply Job')

@section('content')

<!-- partial -->
<br><br><br><br>
<div class="main-panel">
    <div class="col-12">
        <div class="card">
          <div class="card-body">
            <center>
                <h2>Apply Job</h2>
            </center>
              <form class="apply" id="apply">
                <input type="hidden" name="id_loker" value="{{$id_loker}}">
                <div class="form-group">
                  <label for="exampleTextarea1">Upload CV</label>
                  <br>
                  <span class="d-none text text-danger" errorFor="cv"><br></span>
                  <input class="form-control" type="file" name="cv" id="">
                </div>

                <p class="card-description">Additional Document</p>
                <div class="form-group">
                  <label for="exampleTextarea1">Upload Document</label>
                  <span class="d-none text text-danger" errorFor="additional1"><br></span>
                  <input class="form-control" type="file" name="additional1" id="">
                </div>
                <div class="form-group">
                  <label for="exampleTextarea1">Upload Document</label>
                  <span class="d-none text text-danger" errorFor="additional2"><br></span>
                  <input class="form-control" type="file" name="additional2" id="">
                </div>
                <center>
                  <button  class="btn btn-gradient-primary me-2 btn-submit">Apply Job</button>
                  <button class="btn btn-light btn-cancel">Cancel</button>
                </center>

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

@section('layout_script')

    <script>
      $(document).on('click', '.btn-submit', function(e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("apply"));
            $(`[errorFor=cv]`).html('');
            $(`[errorFor=additional1]`).html('');
            $(`[errorFor=additional2]`).html('');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('post.applyform')}}",
            type: 'POST',
            method:"POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
              console.log(data);
              console.log(data.message);
                if (data.status == 'success') {
                  Swal.fire({
                      title: 'Successfully Apply a Job!!',
                      text:data.message,
                      icon: 'success',
                      showConfirmButton: true,
                  }).then(function(){
                    window.location="{{route('myjobscurrently')}}";
                  });
                }
                else if(data.status=='failed'){
                  if (data.cause=='input') {
                    let dataError = JSON.parse(data.error)
                    for (const key in dataError) {
                      $(`[errorFor="${key}"]`).html(dataError[key][0]).removeClass('d-none')
                    }
                  }

                  Swal.fire({
                    title: 'Failed to Apply a Job!',
                    icon: 'error',
                    text:data.message,
                    showConfirmButton: true,
                  });
                }
            },
            error: function(){
                Swal.fire({
                    title: 'Failed to Apply a Job!',
                    icon: 'error',
                    showConfirmButton: true,
                });
            }
        });
      });
    </script>

    <script>
      $(document).on('click', '.btn-cancel', function (e) {
        e.preventDefault();
        var id = "{{ request()->get('id') }}";
        Swal.fire({
          title: 'Do you want to discard the changes?',
          showCancelButton: true,
          confirmButtonText: 'Yes',
          customClass: {
            actions: 'my-actions',
            cancelButton: 'order-1',
            confirmButton: 'order-2',
          }
        }).then((result) => {
          if (result.isConfirmed) {
              window.location="{{url()->previous()}}";
          } 
        })
      })

    </script>



@endsection