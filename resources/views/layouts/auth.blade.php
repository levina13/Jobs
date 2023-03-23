<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link href="{{asset('assets/css/Style.css') }}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{asset('css/logRegStyle.css') }}" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="shortcut icon" href="{{asset('assets/img/jobsicon.png')}}"/>
  <script src="{{asset('js/jquery-3.6.3.min.js')}}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    @yield('content')

    <script  src="{{ asset('js/logRegScript.js') }}"></script>
    <script  src="{{ asset('js/sweetalert2@11.js') }}"></script>

    @yield('layout_script')
</body>
</html>
