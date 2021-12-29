@extends('layout.header')
@section('title')
    {{$tourguide->user->firstName }} Profile
@endsection
@section('content')

@include('layout.navbar')


 <!-- Start Main Section -->

 <section class="profile" style="margin-top: 100px">
  <div class="container">
      @include('errors')
      <div class="info">
          <h1 class="Tourguide-name">{{$tourguide->user->firstName }} {{$tourguide->user->lastName }}</h1>
          <button data-toggle="modal" data-target="#book">Travel With {{$tourguide->user->firstName }}</button>
           @auth @if(Auth::user()->id == $tourguide->user_id) <button id="edit_trips"> Edit Trips </button> @endif @endauth
      </div>
      <div class="row">
          <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12">
              <img width="100%" height="250" width="100"  src="{{asset($tourguide->user->profileImg)}}" alt="user-image">
              <div class="">
                  @auth @if(Auth::user()->id == $tourguide->user_id)
                      <i id="edit-profile-photo" class="fa fa-pencil-square-o" aria-hidden="true"></i> @endif @endauth
              </div>
              <p>Tourguide bio but a add button must be made{{$tourguide->bio}}
              </p>
              <hr>
              <h3>Expertise</h3>
              <div class="Expertise">
                  @foreach(explode(",",$tourguide->expertises) as $expertise)

                      <span>{{$expertise}}</span>
                  @endforeach
                      @auth @if(Auth::user()->id == $tourguide->user_id)
                  <div class="Expertise-edit-hovering">
                     <i id="edit-Expertise-btn" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </div>
                      @endif @endauth
              </div>
              <hr>
              <h3>Languages</h3>
              <div class="Languages">
                  @foreach($languages as $language)
                  <span>{{explode(",",$language)[0]}}</span>
                  @endforeach
                      @auth @if(Auth::user()->id == $tourguide->user_id)
                  <div class="lang-edit-hovering">
                      <i id="edit-langs-btn" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </div>
                      @endif @endauth

              </div>
          </div>

          <div class="Expertise-pop-up">
              <div class="edit-Expertise-popup">
                  <h2 style="text-align: right;"><i style="cursor: pointer;" class="edit-Expertise-close-button fa fa-times" aria-hidden="true"></i></h2>
                  <h1 style="text-align: center;">Edit Expertises</h1>

                  <form id="Expertise-edits" action="{{url('/saveExpertises')}}" method="POST">
                      @csrf @method('POST')
                      <meta name="csrf-token" content="{{ csrf_token() }}">
                      <select name="expertises[]" id="expertises" class="custom-select" multiple>
                          @foreach($expertises as $exper)
                              <option value="{{$exper->name}}"
                              @if(in_array($exper->name , explode(",",$tourguide->expertises))) selected @endif>
                                  {{$exper->name}}</option>
                          @endforeach
                      </select>

                      <button style="right: 30px;
                                position: absolute;
                                bottom: 30px;
                                width: 100px;
                                height: 40px;
                                background-color: #111;
                                color: #fff;
                                outline: none;
                                border: none;
                                border-radius: 2px;" type="submit" onclick="">Save</button>


                  </form>






              </div>

          </div>
          <div class="langs-pop-up">
              <div class="edit-langs-popup">
                  <h2 style="text-align: right;"><i class="edit-langs-close-button fa fa-times" aria-hidden="true"></i></h2>
                  <h1 style="text-align: center;">Edit Languages</h1>
                  <form id="edit-langs-form" style="margin-top: 50px" action="{{url('/saveLanguages')}}" method="POST">
                      @csrf @method('POST')
                      <h2>Languages</h2>
                      @foreach($languages as $key =>$lang)
                          @php
                          $language = explode(',',$lang);
                            $key++;
                            $l = count($languages);
                            $l++;
                          @endphp
                      <input type="hidden" name="count" id="count" value="{{$l}}">
                      <div id="langDiv{{$key}}" class="eduback">
                          <select name="langName[]" id="lang{{$key}}">
                              <option value="" selected>{{$language[0]}}</option>
                              <option value="Arabic">Arabic</option>
                              <option value="English">English</option>
                              <option value="French">French</option>
                              <option value="German">German</option>
                              <option value="Hindi">Hindi</option>
                              <option value="Italian">Italian</option>
                              <option value="Korean">Korean</option>
                              <option value="Russian">Russian</option>
                              <option value="Spanish">Spanish</option>
                              <option value="Turkish">Turkish</option>
                          </select>
                          <select name="speaking[]" id="Speaking{{$key}}">
                              <option value="" selected>{{$language[1]}}</option>
                              <option value="Beginner">Beginner</option>
                              <option value="Elementary">Elementary</option>
                              <option value="Intermediate">Intermediate</option>
                              <option value="Upper-intermediate">Upper-intermediate</option>
                              <option value="Advanced">Advanced</option>
                              <option value="Proficiency">Proficiency</option>
                          </select>
                          <select name="writing[]" id="Writting{{$key}}">
                              <option value="" selected>{{$language[2]}}</option>
                              <option value="Beginner">Beginner</option>
                              <option value="Elementary">Elementary</option>
                              <option value="Intermediate">Intermediate</option>
                              <option value="Upper-intermediate">Upper-intermediate</option>
                              <option value="Advanced">Advanced</option>
                              <option value="Proficiency">Proficiency</option>
                          </select>
                          <select name="comprehension[]" id="Comprehension{{$key}}">
                              <option value="" selected>{{$language[3]}}</option>
                              <option value="Beginner">Beginner</option>
                              <option value="Elementary">Elementary</option>
                              <option value="Intermediate">Intermediate</option>
                              <option value="Upper-intermediate">Upper-intermediate</option>
                              <option value="Advanced">Advanced</option>
                              <option value="Proficiency">Proficiency</option>
                          </select>
                      </div>
                          <br>
                      @endforeach
                      <button type="button" id="addLang">Add Another Language</button>
                      <button type="button" id="rmvlang">Remove Language</button>
                      <button type="submit" id="editlang">Save Edits</button>

                  </form>


              </div>

          </div>

          <div class="col-lg-8 col-md-6 col-xs-12 col-sm-12">
              <div class="slider-container">
                  <div id="slide-number" class="slide-number"></div>
                  @foreach($tourguide->trips as $trip)
                  <img src="{{asset($trip->photo)}}" alt="" />
                      @endforeach
              </div>
              <div class="slider-controls">
                  <span style="display: none;" id="prev" class="prev">previous</span>
                  <span id="indicator" class="indicator">

                  </span>
                  <span style="display: none;" id="next" class="next">next</span>
              </div>
              <div class="slider-container2">
                  @foreach($tourguide->trips as $trip)
                  <div style="display:none;" id="slide-number1" class="slide-number2"></div>
                  <p> {{$trip->description}}
                      <br>
                      <a  data-toggle="modal" data-target="#{{$trip->name}}">Click to view this trip activities</a>
                  </p>
                  @endforeach

              </div>

          </div>
      </div>
  </div>
</section>


<!-- End Main Section -->
<div class="pop-ups">
    <div class="edit_trips_popup">
        <h2 id="close_edittrips_button"><i class="fa fa-times" aria-hidden="true"></i>
        </h2>
        <h1>Edit Your Trips</h1>
        @foreach($tourguide->trips as $trip)
        <div class="dropdown">
                <input type="hidden" id="number" value="{{$trip->id}}">
            <button class="edit-trip" id="edit-trip{{$trip->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                {{$trip->name}}<i class="fa fa-caret-down" aria-hidden="true"></i>

            </button>
            <button class="delete-trip"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <img src="{{asset($trip->photo)}}">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <span>{{$trip->price}} $</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="description">
                            <p> {{$trip->description}}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <h1>ACTIVITIES</h1><br>

                        <div class="activities">
                            <ul class="aval-activities">
                                @foreach(json_decode($trip->activities) as $act)
                                    @php
                                        $activity = \App\Models\Activity::find($act);
                                    @endphp
                                    <li>{{$activity->name}} <strong>{{$activity->price}}$</strong></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endforeach

        <button class="add-trip">Add Trip</button>
    </div>
</div>

<div class="add-trip-pop-up">
    <div class="add-trip-form">
        <h2 style="text-align: right;" id="close_addtrip_button"><i style="cursor: pointer;" class="fa fa-times" aria-hidden="true"></i>
        </h2>
        <h1 style="text-align: center;">Add Trip</h1>
        <form method="POST" action="{{route("trips.store")}}"  id="addTrip" enctype="multipart/form-data">
            @csrf
            <input type="text" placeholder="Trip Title" name="tripTitle">
            <input type="file" placeholder="Trip Photo" name="tripPhoto">
            <input type="text" placeholder="Trip Description" name="tripDescription">
            <input type="number" placeholder="Trip Price" name="tripPrice">
            <hr>
            <h3 style="margin: 15px">Activities</h3>
            <div id="act">
            <input type="text" id="actTitle0" placeholder="Activity Title" name="actTitle[]">
            <input type="text" id="actDes0" placeholder="Activity Description" name="actDes[]">
            <input type="number" id="actPrice0" placeholder="Activity Price" name="actPrice[]">
            </div>
            <br>
            <button id="addAct" type="button">Add new Activity</button>


            <button style="right: 30px;
                position: absolute;
                bottom: 100px;
                width: 100px;
                height: 40px;
                background-color: #111;
                color: #fff;
                outline: none;
                border: none;
                border-radius: 2px;" type="submit">Save</button>
        </form>
    </div>
</div>

@foreach($tourguide->trips as $trip)
<div class="edit-trip-pop-up" id="edit-trip-pop-up{{$trip->id}}">
    <div class="edit-trip-form">
        <h2 style="text-align: right;" id="close_edittrip_button"><i style="cursor: pointer;" class="fa fa-times" aria-hidden="true"></i>
        </h2>
        <h1 style="text-align: center;">Edit Trip</h1>
        <form method="POST" action="{{route("trips.update",$trip->id)}}" enctype="multipart/form-data">
            @csrf @method("PATCH")
            @include("tourguide.form")
            <input type="hidden" id="count" value="{{count($tourguide->trips)}}">
            <button  class="btn-success addAct" type="button">Add new Activity</button>
            <button style="right: 30px;
                position: absolute;
                bottom: 30px;
                width: 100px;
                height: 40px;
                background-color: #111;
                color: #fff;
                outline: none;
                border: none;
                border-radius: 2px;" type="submit">Save</button>
        </form>
    </div>
</div>
@endforeach

<div class="pop-ups-2">
    <div class="edit-profile-photo">
        <h2><i class="close-edit-photo-popup fa fa-times" aria-hidden="true"></i></h2>
        <img class="editable-photo" src="{{asset($tourguide->user->profileImg)}}">
        <button id="for-edit-photo-input">Edit Photo</button>
        <form class="edit-profile-photo-input" method="POST" action="{{route("editProfileImg",$tourguide->user->id)}}" enctype="multipart/form-data">
            @csrf  {{ method_field('PATCH') }}
            <input id="edit-profile-photo-input" type="file" name="profileImg" place-holder="profile photo">
            <button style="    right: 30px;
                position: absolute;
                bottom: 30px;
                width: 100px;
                height: 40px;
                background-color: #111;
                color: #fff;
                outline: none;
                border: none;
                border-radius: 2px;" type="submit">Save</button>
        </form>
    </div>

</div>



<!-- Start Favorite Trips Section  -->
    <section class="favorite-trips">
      <div class="container">
          <h1>My favorite trips and tips</h1>
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <img width="100%" src="{{asset('images/Pyramids.jpg')}}" alt="Pyramids">
                  <a href="#">The Egyptian pyramids are ancient masonry structures located in Egypt</a>
                  <i class="fa fa-map-marker" aria-hidden="true"> Egypt, Giza</i>
                  <h3>I made a headstart last night on my New Years resolution to read more. My first book "How to...</h3>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <img height="500px" width="100%" src="{{asset('images/CairoTower.jpg')}}" alt="Pyramids">
                  <a href="#">The Egyptian Ciro Tower located in Egypt Cairo </a>
                  <i class="fa fa-map-marker" aria-hidden="true"> Egypt, Cairo</i>
                  <h3>There is nothing as rewarding for a travel advisor as receiving amazing, positive feedback even...</h3>
              </div>
          </div>
      </div>
  </section>

  <!-- End Favorite Trips Section Styling -->


  <!-- Start Reviews Section -->
  <section class="reviews">
      <div class="container">
          <h1>Reviews</h1>
          <div class="row">
              @if(count($tourguide->reviews) != 0)
              @foreach($tourguide->reviews as $review)
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h2><span class="bold-black">{{$review->user->firstName}} . </span>{{$review->user->nationality}}</h2>
                  <p>
                      {{$review->review}}
                  </p>
              </div>
              @endforeach
                  @endif

          </div>
      </div>
  </section>

  <!-- End Reviews Section -->

   <!-- End Reviews Section -->
<!-- End Reviews Section -->

    <!-- Start of Activites Modal -->
@foreach($tourguide->trips as $trip)
        <div class="modal fade" id="{{$trip->name}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">{{$trip->name}} Activites Menu</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price (USD)</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach(json_decode($trip->activities) as $act)
                            @php
                            $activity = \App\Models\Activity::find($act);
                            @endphp
                          <tr>
                            <td scope="row">{{$activity->name}}</td>
                            <td>{{$activity->description}}</td>
                            <td>{{$activity->price}}</td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
@endforeach
        <!-- End of Activities Modal-->

    <!-- Start of Booking Modal-->
            <div class="modal fade" id="book" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLongTitle">Travel With {{$tourguide->user->firstName}}</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <h3>Please Select the trips you wish to do</h3>
                        <div class="panel-group" id="my_accordian">
                            <form method="POST" id="bookingForm"  enctype="multipart/form-data">
                                @csrf @method('POST')
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <div id="errorResult" class="alert alert-danger" style="display: none">
                                    <ul>

                                    </ul>
                                </div>
                            @if($tourguide->trips != null)
                            @foreach($tourguide->trips as $trip)
                                <input type="hidden" id="tourguideId" name="tourguideId" value="{{$tourguide->id}}">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title" data-target="#panel-{{$trip->id}}" data-toggle="collapse" data-parent="#my_accordian">{{$trip->name}}</h4>
                                </div>

                                <div class="panel-collapse collapse" id="panel-{{$trip->id}}">
                                    <table class="table table-hover">
                                        <thead>
                                          <tr>

                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Price (USD)</th>
                                            <th scope="col">Select</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(json_decode($trip->activities) as $key => $act)
                                            @php
                                                $activity = \App\Models\Activity::find($act);
                                            @endphp

                                            <tr>
                                                <td scope="row">{{$activity->name}}</td>
                                                <td>{{$activity->description}}</td>
                                                <td>{{$activity->price}}</td>
                                                <td><input name="activityChecked[{{$trip->id}}][]" class="activityChecked" value="{{$trip->id}}=>{{$activity->id}}" type="checkbox"></td>
                                            </tr>
                                            <input type="hidden" id="actP{{$trip->id}}{{$activity->id}}" value="{{$activity->price}}">
                                        @endforeach
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>

                            <div class="form-group form-inline">
                              <label for="persons">How many persons?</label>

                                <input type="number" name="persons" id="persons" class="form-control" placeholder="2">
                            </div>

                            <div class="form-group form-inline">
                                <label for="exampleFormControlInput1">Do you need a hotel pickup?</label>
                                <input type="radio" id="hotel-pickup" class="form-control" value="1" name="hotel-pickup" > Yes
                                <input type="radio" id="hotel-pickup" class="form-control" value="0" name="hotel-pickup"> No
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Please let us know if need any special request</label>
                                <br>
                                <textarea name="notes" id="notes" cols="70" rows="5"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Please pickup the desired date</label>
                                <input type="date" id="date" name="date">
                            </div>
                        <div>
                            <div class="text-right"><h4>Total: <strong>USD <p id="total"></p></strong></h4></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="sendBooking" class="btn btn-primary">Send Request</button>
                        </div>
                        </form>
                    </div>

                </div>
                </div>
            </div>


            <div class="modal" id="success-book" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Success</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success" role="alert">
                            Thank you for Booking this trip. We will Get back to you once your booking it is confirmed!
                          </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
    <!-- End of Booking Modal-->

@include('layout.footer')
@endsection
