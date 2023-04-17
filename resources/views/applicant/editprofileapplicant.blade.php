@extends('layouts.applicant')
@section('title','Edit Profile Applicant')

@section('content')

<!-- partial -->
<br><br><br>
<div class="main-panel">
    <div class="page-header"></div>
            <center>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Edit Profile</h4>
                        <br>
                        <form class="editData" id="editData">
                          <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="user_name" name="user_name" value="{{$user->name}}" placeholder="Full Name"/>
                              <span class="d-none text text-danger" errorFor="user_name"><br></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Headline</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="user_headline" name="user_headline" value="{{$user->headline}}" placeholder="Headline"/>
                              <span class="d-none text text-danger" errorFor="user_headline"><br></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" id="user_email" name="user_email" value="{{$user->email}}" placeholder="Email"/>
                              <span class="d-none text text-danger" errorFor="user_email"><br></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="user_mobile" name="user_mobile" value="{{$user->telepon}}" placeholder="Mobile number"/>
                              <span class="d-none text text-danger" errorFor="user_mobile"><br></span>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Location</label>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Region</label>
                            <div class="col-sm-9">
                              <select class="region form-control"  name="province">
                                <option value="{{$user->id_province}}" selected="selected">{{$user->province}}</option>
                                <span class="d-none text text-danger" errorFor="user_region"><br></span>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">City</label>
                            <div class="col-sm-9">
                              <select class="city form-control"  name="city">
                                <option value="{{$user->id_city}}" selected="selected">{{$user->city}}</option>
                                <span class="d-none text text-danger" errorFor="user_city"><br></span>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Education</label>
                            <div class="col-sm-9">
                              <select class="education form-control"  name="education">
                                <option value="{{$user->id_education}}" selected="selected">{{$user->education}}</option>
                                <span class="d-none text text-danger" errorFor="user_education"><br></span>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Upload Photo</label>
                            <span class="d-none text text-danger" errorFor="user_uploadfoto"><br></span>
                            <div class="col-sm-9">
                                <div class="input-group col-xs-12">
                                  <input
                                  type="file"
                                  name="image"
                                  id="image"
                                  class="form_control"/>
                                </div>
                            </div>
                          </div>

                          <button type="submit" class="btn btn-gradient-primary me-2 btn-submit">Save</button>
                          <button class="btn btn-light btn-cancel">Cancel</button>
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

@section('layout_script')

{{-- Select --}}
{{-- Region --}}
<script type="text/javascript">
  $('.region').select2({
          placeholder: 'Select an region',
          ajax: {
            url: "{{route('select.Region')}}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                      return {
                          text: item.province,
                          id: item.id
                      }
                  })
              };
            },
            cache: true
          }
        });
  </script>

  {{-- City --}}
<script type="text/javascript">
  $('.region').change(function()
  {
    var id=$(this).val();
    var dataString = 'id='+ id;
    $('.city').select2({
          placeholder: 'Select your city',
          ajax: {
            url: "/getCity/"+id,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                      return {
                          text: item.city,
                          id: item.id
                      }
                  })
              };
            },
            cache: true
          }
        });
      });
  </script>

{{-- education --}}
<script type="text/javascript">
  $('.education').select2({
          placeholder: 'Select an education',
          ajax: {
            url: "{{route('select.Education.user')}}",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
              return {
                results:  $.map(data, function (item) {
                      return {
                          text: item.education,
                          id: item.id
                      }
                  })
              };
            },
            cache: true
          }
        });
  </script>

  {{-- Sweet Alert --}}
  <script>
      $(document).on('click', '.btn-submit', function(e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("editData"));
          $(`[errorFor=user_name]`).html('');
          $(`[errorFor=user_headline]`).html('');
          $(`[errorFor=user_email]`).html('');
          $(`[errorFor=user_mobile]`).html('');
          $(`[errorFor=user_region]`).html('');
          $(`[errorFor=user_city]`).html('');
          $(`[errorFor=user_education]`).html('');
          $(`[errorFor=user_uploadfoto]`).html('');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('updateprofileapplicant')}}",
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
                      title: 'Successfully Edit your Profile!!',
                      text:data.message,
                      icon: 'success',
                      showConfirmButton: true,
                  }).then(function(){
                    window.location="{{route('applicant.myProfile')}}";
                  });
                }
                else if(data.status=='failed'){
                  let dataError = JSON.parse(data.error)
                  for (const key in dataError) {
                    $(`[errorFor="${key}"]`).html(dataError[key][0]).removeClass('d-none')
                  }

                  Swal.fire({
                    title: 'Failed to Edit your Profile!',
                    icon: 'error',
                    showConfirmButton: true,
                  });
                }
            },
            error: function(){
                Swal.fire({
                    title: 'Failed to Edit your Profile!',
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
            window.location="{{route('applicant.myProfile')}}";
        } 
      })
    })

  </script>

@endsection