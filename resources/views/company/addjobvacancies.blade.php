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
                <form class="form-sample" class="createJob">
                  @csrf
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">JobVacancies Title</Title></label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="job_name" id="job_name"/>
                          <span class="d-none text text-danger" errorFor="job_name"><br></span>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Position</label>
                        <div class="col-sm-9">
                          <select class="position form-control" name="position"></select>
                          <br>
                          <span class="d-none text text-danger" errorFor="position"><br></span>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="row">

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Contract</label>
                          <div class="col-sm-9">
                            <select name="contract" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                              <option selected >Select Contract</option>
                                @foreach ($contract as $item)
                                  <option value="{{$item->id}}">{{$item->contract}}</option>
                                @endforeach
                            </select>
                          <span class="d-none text text-danger" errorFor="contract"><br></span>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Salary</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" name="salary" id="salary"/>
                            <span class="d-none text text-danger" errorFor="salary"><br></span>
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
                          <input class="form-control" type="date" placeholder="dd/mm/yyyy" id="date_start" name="date_start" />
                          <span class="d-none text text-danger" errorFor="date_start"><br></span>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">End</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="date" placeholder="dd/mm/yyyy" name="date_end" id="date_end"/>
                          <span class="d-none text text-danger" errorFor="date_end"><br></span>
                          </div>
                        </div>
                      </div>

                  </div>

                  <div class="form-group">
                    <label for="exampleTextarea1">Description</label><br>
                    <span class="d-none text text-danger" errorFor="description"><br></span>
                    <textarea id="my-editor" name="description" class="form-control"></textarea>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary me-2 btn-submit">Add job vacancies</button>
                  <button class="btn btn-light btn-cancel">Cancel</button>


                </form>
              </div>
            </div>
          </div>
    </div>
          <!-- content-wrapper ends -->

@endsection

@section('layout_script')
{{-- Select --}}
<script type="text/javascript">
$('.position').select2({
        placeholder: 'Select an position',
        ajax: {
          url: "{{route('select-position.JobVacancies')}}",
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.pekerjaan,
                        id: item.id
                    }
                })
            };
          },
          cache: true
        }
      });
</script>


{{-- CKEditor --}}
<script>
    var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token='+document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='+document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    };
</script>
<script>
    CKEDITOR.replace('my-editor', options);
</script>

{{-- Sweet Alert --}}
    <script>
      $(document).on('click', '.btn-submit', function (e) {
            $(`[errorFor=job_name]`).html('');
            $(`[errorFor=position]`).html('');
            $(`[errorFor=contract]`).html('');
            $(`[errorFor=date_start]`).html('');
            $(`[errorFor=date_end]`).html('');
            $(`[errorFor=description]`).html('');
            $(`[errorFor=salary]`).html('');

            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{route('post.company.jobVacancies.create')}}",
                type: 'POST',
                method:"POST",
                data: {
                  submit: true,
                  "job_name": $('#job_name').val(),
                  "position": $('select[name=position] option').filter(':selected').val(),
                  "contract":$('select[name=contract] option').filter(':selected').val(),
                  "salary":$("#salary").val(),
                  "date_start":$("#date_start").val(),
                  "date_end":$("#date_end").val(),
                  "description":CKEDITOR.instances['my-editor'].getData(),
                },

                success: function(data) {
                  console.log(data);
                  console.log(data.message);
                    if (data.status == 'success') {
                      Swal.fire({
                          title: 'Successfully add a Job Vacancy!!',
                          text:data.message,
                          icon: 'success',
                          showConfirmButton: true,
                      }).then(function(){
                        window.location="{{route('view.company.jobVacancies')}}";
                      });
                    }
                    else if(data.status=='failed'){
                      let dataError = JSON.parse(data.error)
                      for (const key in dataError) {
                        $(`[errorFor="${key}"]`).html(dataError[key][0]).removeClass('d-none')
                      }

                      Swal.fire({
                        title: 'Failed to add a Job Vacany!',
                        icon: 'error',
                        showConfirmButton: true,
                      });
                    }
                },
                error: function(){
                    Swal.fire({
                        title: 'Failed to Add a Job Vacancy!',
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
              window.location="{{route('view.company.jobVacancies')}}";
          } 
        })
      })

    </script>

@endsection