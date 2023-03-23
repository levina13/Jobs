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
                          <select class="position form-control" style="width:500px;" name="position"></select>
                          {{-- <input type="text" class="form-control" /> --}}
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Education</label>
                          <div class="col-sm-9">
                            <select name="company_sector" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                              <option selected >Select Education Requirement</option>
                                @foreach ($education as $item)
                                  <option value="{{$item->id}}">{{$item->education}}</option>
                                @endforeach
                            </select>
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
                          <input class="form-control" type="date" placeholder="dd/mm/yyyy" />
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">End</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="date" placeholder="dd/mm/yyyy" />
                          </div>
                        </div>
                      </div>

                  </div>

                  <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea id="my-editor" name="description" class="form-control"></textarea>
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

@endsection