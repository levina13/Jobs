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
                        <td>{{$item->judul-loker}}</td>
                        <td>{{$item->pekerjaan}}</td>
                        <td> {{$item->tanggal_awal}} </td>
                        <td> {{$item->tanggal_akhir}} </td>
                        <td>
                            <button type="button" class="btn btn-gradient-primary btn-rounded btn-sm">Show</button>
                            <button type="button" class="btn btn-gradient-info btn-rounded btn-sm">Edit</button>
                            <button type="button" class="btn btn-gradient-danger btn-rounded btn-sm">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



          <!-- content-wrapper ends -->

@endsection
