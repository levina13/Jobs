@extends('layouts.company')
@section('title','Show Job Vacancies')

@section('content')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-12">
            <div class="card">
              <div class="card-body">
                <center>
                    <h1 class="display-3"> Job Vacancy</h1>
                </center>
                <br>
                <br>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Position/role</h4>
                        <p class="card-description"> Description job :</p>
                        <blockquote class="blockquote blockquote-primary">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>

                        <p class="card-description"> Recruitment specifications :</p>
                        <blockquote class="blockquote blockquote-primary">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                          </blockquote>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
    </div>
          <!-- content-wrapper ends -->

@endsection
