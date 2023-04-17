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
                <form class="editData" id="editData">
                  <input type="hidden" name="id_company" value="{{$company->id}}">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Company name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="company_name" name="company_name" value="{{$company->name}}"/>
                          <span class="d-none text text-danger" errorFor="company_name"><br></span>
                        </div>
                      </div>
                    </div>


                  <div class="row">

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Sector</label>
                          <div class="col-sm-9">
                            <select class="sector form-control"  name="sector">
                              <option value="{{$company->id_jenis_perusahaan}}" selected="selected">{{$company->sector}}</option>
                            </select>
                            <span class="d-none text text-danger" errorFor="sector"><br></span>
                          </div>
                        </div>
                      </div>

                  </div>


                  <p class="card-description"> Location </p>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Region</label>
                        <div class="col-sm-9">
                          <select class="region form-control"  name="region">
                            <option value="{{$company->id_province}}" selected="selected">{{$company->province}}</option>
                          </select>
                          <span class="d-none text text-danger" errorFor="region"><br></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">City</label>
                        <div class="col-sm-9">
                          <select class="city form-control"  name="city">
                            <option value="{{$company->id_city}}" selected="selected">{{$company->city}}</option>
                          </select>
                          <span class="d-none text text-danger" errorFor="city"><br></span>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="address">Address</label>
                    <span class="d-none text text-danger" errorFor="address"><br></span>
                    <textarea class="form-control" id="address" name="address" rows="4">{{$company->address}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="description">About</label>
                    <span class="d-none text text-danger" errorFor="description"><br></span>
                    <textarea class="form-control" id="description" name="description" rows="4">{{$company->description}}</textarea>
                  </div>

                  <div class="form-group">
                    <label>Upload Photo</label>
                    <span class="d-none text text-danger" errorFor="photo"><br></span>
                      <div class="input-group col-xs-12">
                          <input 
                          type="file" 
                          name="image" 
                          id="image"
                          class="form-control" />                      
                      </div>
                  </div>

                  <center>
                  <button type="press" class="btn btn-gradient-primary me-2 btn-submit">Save</button>
                  <button class="btn btn-light btn-cancel">Cancel</button>
                  </center>
                </form>

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

@section('layout_script')

{{-- Data Select --}}
{{-- Data Region --}}
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

{{-- Data City --}}
<script type="text/javascript">
  $(".region").change(function()
  {
    var id=$(this).val();
    var dataString = 'id='+ id;
    $('.city').select2({
      placeholder: 'Select your City',
      ajax: {
        url: '/getCity/'+id,
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

{{-- Data Sector --}}
<script type="text/javascript">
      $('.sector').select2({
        placeholder: 'Select an sector',
        ajax: {
          url: "{{route('select.Sector')}}",
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results:  $.map(data, function (item) {
                    return {
                        text: item.jenis_perusahaan,
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
            $(`[errorFor=company_name]`).html('');
            $(`[errorFor=sector]`).html('');
            $(`[errorFor=region]`).html('');
            $(`[errorFor=city]`).html('');
            $(`[errorFor=address]`).html('');
            $(`[errorFor=description]`).html('');
            $(`[errorFor=photo]`).html('');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{route('updateprofilecompany')}}",
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
                    window.location="{{route('company.myProfile')}}";
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
              window.location="{{route('company.myProfile')}}";
          } 
        })
      })

    </script>



@endsection