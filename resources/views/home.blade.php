@extends('layout.header')
@section('template_title')
    Egyptus
@endsection
@section('content')
@include('layout.navbar')
<!-- Start Slider-->
@if ($errors->any())
<div class="m-2 alert alert-info" style="position: absolute;">
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

<!-- Start of how it works-->

<div id="how-it-works" class="about text-center">
    <div class="container text-center">
        <div class="row text-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1>HOW IT WORKS</h1>
                <br><br>
            </div>
            <!--
            <div class="col-lg-6 col-md-6">

            </div>
            <div class="col-lg-6 col-md-6 text-left">
                <h3>1. Decide where you want to go</h3>
                <h3>2. Log in your trip preferences in terms of: Prices, duration, activities, etc</h3>
            </div>
            -->
            <div class="text-center">
                <div class="col-lg-2 text-center" style="margin-left: 60px;">
                    <svg xmlns="http://www.w3.org/2000/svg" style="color: #d59425;" width="48" height="48" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                    <h2>Step 1</h2>
                    <h4>Decide where you want to go</h4>
                </div>
                <div class="col-lg-2 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-top: 40px;" width="48" height="48" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                    </svg>
                </div>

                <div class="col-lg-2 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" style="color: #d59425;" width="48" height="48" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
                        <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                        <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    <h2>Step 2</h2>
                    <h4>Log in your trip preferences in terms of: <i>Prices, duration, activities, etc</i></h4>
                </div>
                <div class="col-lg-2 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" style="margin-top: 40px;" width="48" height="48" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                    </svg>
                </div>

                <div class="col-lg-2 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" style="color: #d59425;" width="48" height="48" fill="currentColor" class="bi bi-stars" viewBox="0 0 16 16">
                        <path d="M7.657 6.247c.11-.33.576-.33.686 0l.645 1.937a2.89 2.89 0 0 0 1.829 1.828l1.936.645c.33.11.33.576 0 .686l-1.937.645a2.89 2.89 0 0 0-1.828 1.829l-.645 1.936a.361.361 0 0 1-.686 0l-.645-1.937a2.89 2.89 0 0 0-1.828-1.828l-1.937-.645a.361.361 0 0 1 0-.686l1.937-.645a2.89 2.89 0 0 0 1.828-1.828l.645-1.937zM3.794 1.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387A1.734 1.734 0 0 0 4.593 5.69l-.387 1.162a.217.217 0 0 1-.412 0L3.407 5.69A1.734 1.734 0 0 0 2.31 4.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387A1.734 1.734 0 0 0 3.407 2.31l.387-1.162zM10.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732L9.1 2.137a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L10.863.1z"/>
                    </svg>
                    <h2>Step 3</h2>
                    <h4>Confirm your booking and enjoy your stay in Egypt!</h4>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- End of how it works-->

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
                        <h1>Smooth, Easy, and Hassle Free</h1>
                        <p>Get matched with top tour guides anywhere in Egypt and enjoy discovering the hidden gems of Egypt with just a click.
                        </p>
                    </div>
                    <div id="first-right-img" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img width="100%" src="images/2.JPG" alt="">
                    </div>
                    <div id="second-left-img" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                        <img width="100%" src="images/Shoping.jpg" alt="">
                    </div>
                    <div id="second-right-para" class="right col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <h1>Clear Pricing</h1>
                        <p>Decide how much you want to pay and book each trip with all the pricing details listed in the profile of our tour guides. </p>

                    </div>
                    <div id="third-left-para" class="left col-lg-6 col-md-6 col-sm-12 col-xs-12">

                        <h1>Top quality tour guides</h1>
                        <p>Our professional top quality tour guides will provide you with the ultimate authentic experience for your stay in Egypt.</p>

                    </div>

                    <div id="third-right-img" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img width="100%" src="images/sailboats.jpg" alt="">

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
            <span class="background-holder" style="background-image: url(images/Diving_icon.jpg);"></span>
        </li>
        <!-- slideshow:navigation:item END -->

        <!-- slideshow:navigation:item START -->
        <li class="navigation-item">
            <span class="rotate-holder"></span>
            <span class="background-holder" style="background-image: url(images/Horse\ riding\ icon.jpg);"></span>
        </li>

        <li class="navigation-item">
            <span class="rotate-holder"></span>
            <span class="background-holder" style="background-image: url(images/sailboats.jpg);"></span>
        </li>

        <li class="navigation-item">
            <span class="rotate-holder"></span>
            <span class="background-holder" style="background-image: url(images/Pottery_icon.jpg);"></span>
        </li>


    </ul>

    <div class="detail">

        <div class="detail-item active">
            <div class="headline">Diving</div>
            <div class="background" style="background-image: url(images/Diving.jpg); height: 100vh;"></div>
            <div class="background" style="background-image: url(images/Diving.jpg); height: 100vh; background-size: cover; background-position: center;"></div>

        </div>
        <!-- slideshow:details END -->

        <!-- slideshow:details START -->
        <div class="detail-item">
            <div class="headline">Horse Riding</div>
            <div class="background" style="background-image: url(images/Horse_riding.jpg);"></div>
        </div>
        <!-- slideshow:details END -->

        <!-- slideshow:details START -->
        <div class="detail-item">
            <div class="headline">Silent Meditation</div>
            <div class="background" style="background-image: url(images/sailboats.jpg);"></div>
        </div>
        <!-- slideshow:details END -->

        <!-- slideshow:details START -->
        <div class="detail-item">
            <div class="headline">Pottery</div>
            <div class="background" style="background-image: url(images/Pottery.jpg);"></div>
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
