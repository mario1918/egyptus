<!--start navbar -->

<nav class=" second-nav navbar navbar-expand-lg navbar-mainbg">
  <p class=" navbar-brand navbar-logo" style="margin-left: 6%;"><a href="{{route('home')}}">Egyptus</a><p>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <i class="fa fa-bars text-white"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-right: 6%;">
      <ul class="navbar-nav ml-auto mr-2">
          <div class="hori-selector"><div class="left"></div><div class="right"></div></div>

          <!--
          <li class="nav-item">
              <a class="nav-link" href="#">Reviews</a>
          </li>-->

      <li class="nav-item pr-4 active">
        <a class="nav-link" href="{{route('home')}}"> Home </a>
      </li>

      <li class="nav-item pr-4">
              <a class="nav-link" href="#tour-guides-cards-section" style="additive-symbols: ">Meet a tour guide</a>
      </li>
  
      <li class="nav-item pr-4">
        <a class="nav-link" href="#">About </a>
      </li>
<!--
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
-->

     
      </ul>

    

      <form class="form-inline my-2 my-lg-0 ml-5">
      @auth
      <button type="button" class="btn my-2 my-sm-0 mr-1 px-3 account-btn">Log out</button>
      @else
        <button class="btn my-2 my-sm-0 mr-1 px-3 account-btn">Login</button>
        <button class="btn my-2 my-sm-0 ml-1 px-3 account-btn">Sign up as a Guide</button>
      @endauth
      </form>

      
      
  </div>
  
</nav>

<!-- End navbar-->
