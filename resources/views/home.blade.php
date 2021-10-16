@extends('layout.header')
@section('template_title')
    Egyptus
@endsection
@section('content')
<!-- Start Slider-->

<div class="slider" id="slider">
  <div id="main-slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">

          <div class="w-35 card-over-slider">
              <div class="card-body">
                <h5 class=" card-over-slider-headline card-title">Find amazing things to do.
                  Anytime, anywhere.</h5>
                  <div class="container">
                    <div class="row">
                  

                      <div class="input-group rounded search-bar-card col-12">
                        <div class="search"> 
                         <i class="fa fa-search"></i>
                          <input type="search" class="form-control rounded the-search-itself" placeholder="Cairo, Alexandria, Aswan, Luxor" aria-label="Search"
                         aria-describedby="search-addon"/>
                       
                       </div> 
                       </div>

                      </div>
                    </div>                     
                

                  <div class="container mt-3">
                    <div class="row">

                      
                      <div class="input-group rounded date-bar-card col-lg-8 col-sm-12">
                        <div class="date"> 
                        <i class="fa fa-calendar"></i>
                      
                          <input id="datefield" type='date' class="form-control rounded the-date-itself"></input>
                       </div> 
                       </div>

                      <div class="btton-booking">
                        <a href="#" class="btn btton-booking-hyper">Submit</a>
                      </div>

                    </div>
                  </div>
              </div>
            </div>

          <div class="overlay"></div>
          
          <div class="carousel-item active silde-one">
            <img src="images/1.JPG" class="d-block w-100">
          </div>
          <div class="carousel-item silde-two">
            <img src="images/2.JPG" class="d-block w-100">
          </div>

          <div class="carousel-item silde-three">
            <img src="images/3.JPG" class="d-block w-100">
          </div>

         

            <div class="carousel-item silde-five">
              <img src="images/4.JPG" class="d-block w-100">
            </div>
      </div>

        <ol class="carousel-indicators">
          <li data-target="#main-slider" data-slide-to="0" class="active"></li>
          <li data-target="#main-slider" data-slide-to="1"></li>
          <li data-target="#main-slider" data-slide-to="2"></li>
          <li data-target="#main-slider" data-slide-to="3"></li>
        </ol>

      </div>
    </div>
  </div>

<!-- End Slider-->
<!--Start Why Us section-->
<div class="why-us mt-5">
  <h2 class="why-us-headline text-center">Why book with Egyptus?</h2>
  <div class="container mt-5">
    <div class="row">

      <div class="feature-1 col-sm text-center">
        <i class="fa fa-money fa-2x" aria-hidden="true"></i>
        <h2 class="features-headline">
          Ultimate flexibility
        </h2>
        <p class="features-para">
          You’re in control, with free cancellation and payment options to satisfy any plan or budget.
        </p>

      </div>

      <div class="feature-2 col-sm text-center">
        <i class="fa fa-bandcamp fa-2x" aria-hidden="true"></i>
        <h2 class="features-headline">
          Memorable experiences
        </h2>
        <p class="features-para">
          Browse and book tours and activities so incredible, you’ll want to tell your friends.
        </p>

      </div>

     
      <div class="feature-3 col-sm text-center">
        <i class="fa fa-book fa-2x" aria-hidden="true"></i>
        <h2 class="features-headline">
          Quality at our core
        </h2>

        <p class="features-para" >
          High quality standards. Millions of reviews. A Tripadvisor company.
        </p>


      </div>

      <div class="feature-4 col-sm text-center">
        <i class="fa fa-trophy fa-2x" aria-hidden="true"></i>
        <h2 class="features-headline">
          Award-winning support
        </h2>

        <p class="features-para">
          New price? New plan? No problem. We’re here to help, 24/7.
        </p>
        
      </div>

    </div>
  </div>
</div>


<!--Tour Guides Cards-->
<div class="tour-guides-cards" id="tour-guides-cards-section">
  <h2 class="h1 tour-guides-cards-headline d-flex justify-content-center ">Meet our tour Guides</h2>

<section id="team" class="pb-5">
  <div class="container">
      <div class="row">
          <!-- Tour guide Start-->
          @foreach($users as $user)
          <div class="col-xs-12 col-sm-6 col-md-4">

            <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                <div class="mainflip">
                    <div class="frontside">
                        <div class="card">
                          <div class="label-top shadow-sm">Price rate: {{$user->hasType->priceRate}} $/hr</div>
                            <div class="card-body text-center">
                                <p><img class=" img-fluid" src="images/tour.jpg" alt="card image"></p>
                                <h4 class="card-title">Name</h4>
                                <p class="card-text">{{$user->firstName . " " . $user->lastName}}</p>
                                <a href="profile-page.html" class="stretched-link"></a>
                                <hr>
                                <div class="container">
                                  <div class="row">
                                    <div class="reviews col-4 mr-5">
                                       <p class="card-text">Reviews</p>
                                       <p class="card-text">11</p>
                                    </div>
                                    <div class="ratings col-5 ml-4">
                                      <p class="card-text">Ratings</p>
                                      <div class="clearfix mb-1"> <span class="float-start">
                                        @for ($i = 0; $i < $user->hasType->personalRate; $i++)
                                        <i class="fa fa-star text-warning"></i>
                                        @endfor
                                        </span></div>
                                    </div>
                                  </div>
                                </div>      
                            </div>
                        </div>
                    </div>

                    <div class="backside">
                        <div class="card">
                            <div class="card-body text-center mt-4">
                                <h4 class="card-title">{{$user->firstName . " " . $user->lastName}}</h4>
                                <a href="{{route('toruguideProfile',Crypt::encryptString($user->hasType->id))}}" class="stretched-link"></a>
                                <p class="card-text">{{$user->hasType->bio}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endforeach
        

        </div>
      </div>
  </section>
</div>
<!--End Tour Guides Cards -->




<!--End Why Us section-->

<!-- Start Cancelation Section
<div class="cancelation mt-3 pt-3 pb-5">
  <div class="container text-center">
    <h2 class="cancelation-headline">Free <br> cancellation</h2>
    <p class="cancelation-para">You'll receive a full refund if you cancel at <br> least 24 hours in advance of most <br> experiences.</p>
  </div>
</div>-->
<!-- End Cancelation Section -->

@endsection
