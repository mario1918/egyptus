<!--start navbar -->

<nav class=" second-nav navbar navbar-expand-lg navbar-mainbg">
  <p class=" navbar-brand navbar-logo">EgyptUs<p>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <i class="fa fa-bars text-white"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
          <div class="hori-selector"><div class="left"></div><div class="right"></div></div>

          <!--
          <li class="nav-item">
              <a class="nav-link" href="#">Reviews</a>
          </li>-->

          <li class="nav-item active pr-4">
              <a class="nav-link" href="#tour-guides-cards-section" style="additive-symbols: "> Meet a tour guide</a>
          </li>

      <li class="nav-item pr-4">
        <a class="nav-link" href="{{route('home')}}"> Home </a>
    </li>
  
      <li class="nav-item pr-4">
        <a class="nav-link" href="#">About </a>
    </li>
  @auth
    <li class="nav-item pr-4">
      <form class="form-inline">
        
        <a class="" href="{{ route('logout') }}">Logout</a>
      </form>
    </li>
        @else
        <li class="nav-item pr-4">
          <a class="nav-link" href="{{route('touristSignup')}}">Sign Up</a>
      </li>
      <li>
        <a href="{{ route('login') }}" class="">Login</a>
      </li>
        @endauth
  </li>

     
      </ul>
  </div>
</nav>

<!-- End navbar-->