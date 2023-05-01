@extends('layouts.company')
@section('title','Job Vacancies')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div>
            <a href="{{route('view.company.jobVacancies.create')}}">
                <button type="button" class="btn btn-gradient-info btn-lg btn-block">Add jobs vacancies</button>
            </a>
        </div>
        <br>
        <br>
        <br>
        <br>
        <table class="table table-striped">
            <thead>
              <tr>
                <th> Title </th>
                <th> Position </th>
                <th> Time Start </th>
                <th> Time End </th>
                <th>  </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($jobVacancies as $key=>$item)
                    <tr>
                        <td>{{ substr($item->judul_loker, 0,25).'...' }}</td>
                        <td>{{$item->pekerjaan}}</td>
                        <td> {{$item->tanggal_awal}} </td>
                        <td> {{$item->tanggal_akhir}} </td>
                        <td>
                            <a href="{{route('detail.company.jobVacancies',['id'=>$item->id])}}">
                                <button type="button" class="btn btn-gradient-primary btn-rounded btn-sm">Show</button>
                            </a>
                            <a href="{{route('view.company.jobVacancies.edit',['id'=>$item->id])}}">
                                <button type="button" class="btn btn-gradient-info btn-rounded btn-sm">Edit</button>
                            </a>
                            <button type="button" class="btn btn-gradient-danger btn-rounded btn-sm btn-delete" data-id="{{$item->id}}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



          <!-- content-wrapper ends -->

@endsection

@section('layout_script')
    <script>
      $(document).on('click', '.btn-delete', function (e) {
        var id = $(this).data('id');
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure delete the Job Vacancy ?',
                text: 'The deleted data cannot be stored.',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/job-vacancies/delete/"+id,
                        type: 'POST',
                        method:"POST",
                        data: {submit: true},

                        success: function(data) {
                            if (data.status == 'success') {
                                Swal.fire({
                                    title: 'Successfully Delete a Job Vacancy!!',
                                    text:data.message,
                                    icon: 'success',
                                    showConfirmButton: true,
                                }).then(function(){
                                    window.location="{{route('view.company.jobVacancies')}}";
                                });
                            }
                            else if(data.status=='failed'){
                                Swal.fire({
                                    title: 'Failed to Edit a Job Vacany!',
                                    icon: 'error',
                                    showConfirmButton: true,
                                });
                            }
                        },
                        error: function(){
                            Swal.fire({
                                title: 'Failed to Delete a Job Vacancy!',
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