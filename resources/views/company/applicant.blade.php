@extends('layouts.company')
@section('title','Applicants')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Applicant</h4>
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Profile Photos</th>
                      <th>Applicant's Name</th>
                      <th>Position</th>
                      <th>CV</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>photo</td>
                        <td>Peter</td>
                        <td>Engineer</td>
                        <td> --- </td>
                        <td><button type="button" class="btn btn-gradient-danger btn-rounded btn-fw">Reject</button>&emsp;<button type="button" class="btn btn-gradient-info btn-rounded btn-fw">Accept</button></td>
                      </tr>
                    <tr>
                        <td>photo</td>
                        <td>Peter</td>
                        <td>Engineer</td>
                        <td> --- </td>
                        <td><button type="button" class="btn btn-gradient-danger btn-rounded btn-fw">Reject</button>&emsp;<button type="button" class="btn btn-gradient-info btn-rounded btn-fw">Accept</button></td>
                      </tr>
                    <tr>
                        <td>photo</td>
                        <td>Peter</td>
                        <td>Engineer</td>
                        <td> --- </td>
                        <td><button type="button" class="btn btn-gradient-danger btn-rounded btn-fw">Reject</button>&emsp;<button type="button" class="btn btn-gradient-info btn-rounded btn-fw">Accept</button></td>
                      </tr>
                    <tr>
                      <td>photo</td>
                      <td>Peter</td>
                      <td>Engineer</td>
                      <td> --- </td>
                      <td><button type="button" class="btn btn-gradient-danger btn-rounded btn-fw">Reject</button>&emsp;<button type="button" class="btn btn-gradient-info btn-rounded btn-fw">Accept</button></td>
                    </tr>
                    <tr>
                        <td>photo</td>
                        <td>Peter</td>
                        <td>Engineer</td>
                        <td> --- </td>
                        <td><button type="button" class="btn btn-gradient-danger btn-rounded btn-fw">Reject</button>&emsp;<button type="button" class="btn btn-gradient-info btn-rounded btn-fw">Accept</button></td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
          <!-- content-wrapper ends -->

@endsection
