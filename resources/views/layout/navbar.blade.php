<!--start navbar -->
  <!-- Start Navbar Section -->
  @guest
      
  <div class="upper-nav">
    <div class="container">
        <span class="special"><a href="{{route('tourguideSignup')}}"> Sign Up as Tourguide</a></span>
        @guest
        <span><a href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></span>
        @endguest
    </div>
</div>

<nav id="navbar" class="navbar navbar-inverse">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"> <img src="images/logo.png" alt="Egyptus Logo"> </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="app-nav">
            <ul class="main-ul nav navbar-nav navbar-left">
                <li><a href="index.html"> Home</a></li>
                <li><a href="#about"> About</a></li>
                <li><a href="profile.html"> Meet a tour guide</a></li>
                <li><a href="customizeyourowntrip.html"> Customize Your Own Trip</a></li>


            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
@endguest

@auth
     <!-- Start Navbar Section -->
     <div class="upper-nav">
      <div class="container">
          <span class="special"><a href="{{route('tourguideSignup')}}"> Sign Up as Tourguide</a></span>

      </div>
  </div>

  <nav class="navbar navbar-inverse">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{route('home')}}"> <img src="{{asset('images/logo.png')}}" alt="Egyptus Logo"> </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="app-nav">
              <ul class="main-ul nav navbar-nav navbar-left">
                  <li><a href="{{route('home')}}"> Home</a></li>
                  <li><a href="#about"> About</a></li>
                  <li><a href="profile.html"> Meet a tour guide</a></li>
                  <li><a href="customizeyourowntrip.html"> Customize Your Own Trip</a></li>

              </ul>

          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
  </nav>





  <!-- End Navbar Section -->
@endauth

  {{-- @auth
        <li class="nav-item pr-4">
          <form class="form-inline">
            <a class="" href="{{ route('logout') }}">Logout</a>
          </form>
        </li>
          @else
        <li class="nav-item pr-4">
            <li>
          <a href="{{ route('login') }}" class="">Login</a>
        </li>
        <li class="nav-item pr-4">
          <a class="" href="{{route('tourguideSignup')}}">Sign Up as Tourguide</a>
        </li>
          @endauth
        </li> --}}


<!-- End navbar-->
