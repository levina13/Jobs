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
                <th> company logo </th>
                <th> Position </th>
                <th> Company name </th>
                <th> Company address </th>
                <th>  </th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td class="py-1">
                    <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                  </td>
                  <td> Sales Marketing </td>
                  <td> Alibaba </td>
                  <td> malang </td>
                  <td>
                    <button type="button" class="btn btn-gradient-primary btn-rounded btn-sm">Show</button>
                    <button type="button" class="btn btn-gradient-info btn-rounded btn-sm">Edit</button>
                    <button type="button" class="btn btn-gradient-danger btn-rounded btn-sm">Delete</button>
                  </td>
                </tr>
                <tr>
                    <td class="py-1">
                      <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
                    </td>
                    <td> Admin </td>
                    <td> Alibaba </td>
                    <td> Malang </td>
                    <td>
                        <button type="button" class="btn btn-gradient-primary btn-rounded btn-sm">Show</button>
                      <button type="button" class="btn btn-gradient-info btn-rounded btn-sm">Edit</button>
                      <button type="button" class="btn btn-gradient-danger btn-rounded btn-sm">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                    </td>
                    <td> Staf </td>
                    <td> Alibaba </td>
                    <td> malang </td>
                    <td>
                      <button type="button" class="btn btn-gradient-primary btn-rounded btn-sm">Show</button>
                      <button type="button" class="btn btn-gradient-info btn-rounded btn-sm">Edit</button>
                      <button type="button" class="btn btn-gradient-danger btn-rounded btn-sm">Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td class="py-1">
                      <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
                    </td>
                    <td> Manager </td>
                    <td> Alibaba </td>
                    <td> Malang </td>
                    <td>
                        <button type="button" class="btn btn-gradient-primary btn-rounded btn-sm">Show</button>
                      <button type="button" class="btn btn-gradient-info btn-rounded btn-sm">Edit</button>
                      <button type="button" class="btn btn-gradient-danger btn-rounded btn-sm">Delete</button>
                    </td>
                  </tr>
            </tbody>
        </table>
    </div>



          <!-- content-wrapper ends -->

@endsection
