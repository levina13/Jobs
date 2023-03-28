@extends('layouts.company')
@section('title','New Applicants')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">New Applicant</h4>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Profile Photos</th>
                      <th>Applicant's Name</th>
                      <th>Position</th>
                      <th>CV</th>
                      <th>Addtitional Document</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($applicant as $key=>$item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>
                          <img class="img" src="{{ asset('uploads/profil_image/'.$item->photo) }}" alt="image here..">
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->pekerjaan}}</td>
                        <td>
                          <a href="{{asset('uploads/applyJobDocument/cv/'.$item->cv)}}" target="_blank">
                            Link CV
                          </a>
                        </td>
                        <td>
                          <ul>
                            @if(!is_null($item->additional1))
                              <li>
                                <a href="{{asset('uploads/applyJobDocument/additional1/'.$item->additional1)}}" target="_blank">
                                  Additional Document 1
                                </a>
                              </li>
                            @endif
                            @if(!is_null($item->additional2))
                              <li>
                                <a href="{{asset('uploads/applyJobDocument/additional2/'.$item->additional2)}}" target="_blank">
                                  Additional Document 2
                                </a>
                              </li>
                            @endif
                          </ul>
                        </td>
                        <td>
                          <button type="button" class="btn btn-gradient-danger btn-rounded btn-md btn-reject" data-id="{{$item->id_lamaran}}" data-name="{{$item->name}}">Reject</button>
                          &emsp;
                          <button type="button" class="btn btn-gradient-info btn-rounded btn-md btn-accept" data-id="{{$item->id_lamaran}}" data-name="{{$item->name}}">Accept</button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>


          <!-- content-wrapper ends -->

@endsection

@section('layout_script')
    {{-- Reject --}}
    <script>
      $(document).on('click', '.btn-reject', function (e) {
        var id = $(this).data('id');
        var name = $(this).data('name');
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure reject '+name+' ?',
                showCancelButton: true,
                confirmButtonText: 'Reject',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/applicant/reject/"+id,
                        type: 'POST',
                        method:"POST",
                        data: {submit: true},

                        success: function(data) {
                            if (data.status == 'success') {
                                Swal.fire({
                                    title: 'Rejected!!',
                                    text:data.message,
                                    icon: 'success',
                                    showConfirmButton: true,
                                }).then(function(){
                                    window.location="{{route('view.company.applicant')}}";
                                });
                            }
                            else if(data.status=='failed'){
                                Swal.fire({
                                    title: 'Failed to Reject an Applicant!',
                                    icon: 'error',
                                    showConfirmButton: true,
                                });
                            }
                        },
                        error: function(){
                            Swal.fire({
                                title: 'Failed to Reject an Applicant!',
                                icon: 'error',
                                showConfirmButton: true,
                            });
                        }
                    });
                }
            });
      });

    </script>

    {{-- Accept --}}
    <script>
      $(document).on('click', '.btn-accept', function (e) {
        var id = $(this).data('id');
        var name = $(this).data('name');
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure accept '+name+' ?',
                showCancelButton: true,
                confirmButtonText: 'Accept',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/applicant/accept/"+id,
                        type: 'POST',
                        method:"POST",
                        data: {submit: true},

                        success: function(data) {
                            if (data.status == 'success') {
                                Swal.fire({
                                    title: 'Accepted!!',
                                    text:data.message,
                                    icon: 'success',
                                    showConfirmButton: true,
                                }).then(function(){
                                    window.location="{{route('view.company.applicant')}}";
                                });
                            }
                            else if(data.status=='failed'){
                                Swal.fire({
                                    title: 'Failed to Accept an Applicant!',
                                    icon: 'error',
                                    showConfirmButton: true,
                                });
                            }
                        },
                        error: function(){
                            Swal.fire({
                                title: 'Failed to Accept an Applicant!',
                                icon: 'error',
                                showConfirmButton: true,
                            });
                        }
                    });
                }
            });
      });

    </script>

@endsection
