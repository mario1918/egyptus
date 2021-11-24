@extends('layout.header')
@section('template_title')
    Egyptus
@endsection
@section('content')
@include('layout.navbar')
<!-- Start Slider-->
@if ($errors->any())
<div class="m-2 alert alert-info">
   <strong> {{$errors->first()}}</strong>
</div>
@endif

 <!-- Start Landing Section -->
 <section class="landing-section">

  <div class="video">
      <video width="100%" src="{{asset('videos/homepage.mp4')}}" type="video/mp4" muted loop autoplay></video>
  </div>
  <div class="search-bar">
      <button><i class="fa fa-search" aria-hidden="true"></i></button><input placeholder="Activities / Places / TourGuides ..." type="search">
  </div>
  <div class="text animate__animated animate__fadeInDown animate__slow animate__delay-1s">
      <h2>WE ARE EGYPT</h2>
      <!--<h3>Exploring The World</h3>-->

      <a href="profile.html">Get A TourGuide Now</a>
  </div>
  <div class=" animate__animated animate__bounceInRight whats-happening animate__slow animate__delay-1s">
      <a href="{{route('tourguideSignup')}}" style="text-decoration: none;"><h2>Become a tour guide</h2></a>
  </div>


</section>
<!-- End Landing Section -->

<!-- Start About Section -->

<div id="about" class="about">
  <div class="container">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <h2>WE ARE EGYPT
              </h2>
              <h1>ABOUT US</h1>
              <p id="about-para">Egyptus seeks to elevate the tourism experience in Egypt for both the tourists and those working in the industry,we 
                  provide a platform to bridge the gap between tourists who are seeking an authentic, hassle-free vacation and the hospitality providers who can deliver a memorable Egyptian experience.                        
              </p>


          </div>
      </div>
  </div>
</div>

<!-- End About Section -->

<!-- Start Why Egyptus Section -->

<section id="why-egyptus" class="why-egyptus">
  <div class="container">
      <div class="row">
          <div class=" animate__animated animate__fadeInTopLeft special col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <h2 style="text-align: center;">WHY BOOK WITH EGYPTUS ?</h2>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="row">
                  <div id="first-left-para" class="left col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <h1>Ultimate Flexibility</h1>
                      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non? Lorem ipsum dolor, sit amet consectetur
                          adipisicing elit. Non? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non?
                      </p>
                  </div>
                  <div id="first-right-img" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <img width="100%" src="{{asset('images/2.JPG')}}" alt="">
                  </div>
                  <div id="second-left-img" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                      <img width="100%" src="{{asset('images/Shoping.jpg')}}" alt="">
                  </div>
                  <div id="second-right-para" class="right col-lg-6 col-md-6 col-sm-12 col-xs-12">

                      <h1>Award-winning support</h1>
                      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non? Lorem ipsum dolor, sit amet consectetur
                          adipisicing elit. Non? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non?</p>

                  </div>
                  <div id="third-left-para" class="left col-lg-6 col-md-6 col-sm-12 col-xs-12">

                      <h1>Quality at Our Core</h1>
                      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non? Lorem ipsum dolor, sit amet consectetur
                          adipisicing elit. Non? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non?/p>

                  </div>

                  <div id="third-right-img" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <img width="100%" src="{{asset('images/sailboats.jpg')}}" alt="">

                  </div>

              </div>

          </div>
      </div>
  </div>

</section>

 <!-- Start Glary Section -->

 <section class="slideshow">
  <h1>TOP EXPERIENCES</h1>

  <ul class="navigation">

      <li class="navigation-item active">
          <span class="rotate-holder"></span>
          <span class="background-holder" style="background-image: url({{asset('images/Diving_icon.jpg')}});"></span>
      </li>
      <!-- slideshow:navigation:item END -->

      <!-- slideshow:navigation:item START -->
      <li class="navigation-item">
          <span class="rotate-holder"></span>
          <span class="background-holder" style="background-image: url({{asset('images/Horse\ riding\ icon.jpg')}});"></span>
      </li>

      <li class="navigation-item">
          <span class="rotate-holder"></span>
          <span class="background-holder" style="background-image: url({{asset('images/sailboats.jpg')}});"></span>
      </li>

      <li class="navigation-item">
          <span class="rotate-holder"></span>
          <span class="background-holder" style="background-image: url({{asset('images/Pottery_icon.jpg')}});"></span>
      </li>


  </ul>

  <div class="detail">

      <div class="detail-item active">
          <div class="headline">Diving</div>
          <div class="background" style="background-image: url({{asset('images/Diving.jpg')}}); height: 100vh;"></div>
          <div class="background" style="background-image: url({{asset('images/Diving.jpg')}}); height: 100vh; background-size: cover; background-position: center;"></div>
          
      </div>
      <!-- slideshow:details END -->

      <!-- slideshow:details START -->
      <div class="detail-item">
          <div class="headline">Horse Riding</div>
          <div class="background" style="background-image: url({{asset('images/Horse_riding.jpg')}});"></div>
      </div>
      <!-- slideshow:details END -->

      <!-- slideshow:details START -->
      <div class="detail-item">
          <div class="headline">Silent Meditation</div>
          <div class="background" style="background-image: url({{asset('images/sailboats.jpg')}});"></div>
      </div>
      <!-- slideshow:details END -->

      <!-- slideshow:details START -->
      <div class="detail-item">
          <div class="headline">Pottery</div>
          <div class="background" style="background-image: url({{asset('images/Pottery.jpg')}});"></div>
      </div>
      <!-- slideshow:details END -->
  </div>
  <!-- slideshow:details END -->

</section>


<!-- End Galary Section -->



<!-- Start Vision Section -->
<section class="vision">
  <div class="container">
      <h3>WE ARE EGYPT</h3>
      <h1>OUR VISION FOR THE FUTUTRE</h1>
      <p>We aspire to provide the tourist with a personalized simple and convenient method to ensure a smooth touristic experience. Egyptus Travel will ease the tourism industry processes in Egypt, by being the only digital tourism platform offering a huge variety of high quality tourism related options based on each tourist’s preferences. We aim to elevate tourism in Egypt and to reach all locations.
      </p>
  </div>
</section>

@include('layout.footer')
@endsection
