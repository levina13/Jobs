  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="{{route('home')}}"><img src="{{asset('assets/img/logojobs.png')}}" alt="Image" class="img-fluid" style="width: auto;height:50px;"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link  active" href="{{route('home')}}">Home</a></li>
          <li><a class="nav-link scrollto" href="{{route('findJobs')}}">Find Jobs</a></li>
          @auth
            @if(Auth::user()->role=='A')
              <li><a class="nav-link " href="{{route('myjobshistory')}}">My Jobs</a></li>
            @endif
          @endauth
          <li><a class="nav-link" href="{{route('cvawal')}}">CV</a></li>
          <!--
          <li><a class="nav-link scrollto" href="#team">Login</a></li>
          -->
          <li><a class="nav-link scrollto" href="http://127.0.0.1:8000/#contact">Contact</a></li>
          @guest
          <li><a class="getstarted scrollto" href="{{route('loginView')}}">Get Started</a></li>
          @else
          <li class="dropdown">
            <button class="getstarted dropdown-toggle btn" type="button" id="dropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
              Hi, {{Auth::user()->name}}</button>
            <ul class="dropdown-menu" aria-labelledby="dropdownButton">
                @if(Auth::user()->role=='A')
                <a href="{{route('applicant.myProfile')}}"  class="dropdown-item"><i class="bi bi-person-fill mr-2"></i>My Profile</a>
                @elseif(Auth::user()->role=='B')
								<a href="{{route('view.company.dashboard')}}"  class="dropdown-item"><i class="bi bi-building-fill-check mr-2"></i>Company Page</a>
                @endif
                <a class="dropdown-item "  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" ><i class="bi bi-box-arrow-right"></i>{{ __('Logout') }}</a>
                <form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">@csrf</form>
						</ul>


          </li>
          @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
    </header><!-- End Header -->
