<div class="container">
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">Egyptus</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Services</a>
        </li>
      </ul>
      
    </div>
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      @auth
      <a class="btn btn-success" href="{{ route('logout') }}">Logout</a>
      
      @else
      <a href="{{ route('tourguideSignup') }}" class="btn btn-success" style="">Be a tourguide</a>
      <a href="{{ route('touristSignup') }}" class="btn btn-outline-success m-2">Sign Up</a>
      <a href="{{ route('login') }}" class="btn btn-outline-success m-2">Login</a>
  
      @endauth
    </form>
  </nav>
</div>