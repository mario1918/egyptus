@extends('layout.header')
@section('title')
    {{$tourguide->user->firstName }} Profile
@endsection
@section('content')

@include('layout.navbar')
@if ($errors->any())
<div class="m-2 alert alert-info">
   <strong> {{$errors->first()}}</strong>
</div>
@endif


 <!-- Start Main Section -->

 <section class="profile">
  <div class="container">
      <div class="info">
          <h1 class="Tourguide-name">{{$tourguide->user->firstName }} {{$tourguide->user->lastName }}</h1>
          <button data-toggle="modal" data-target="#book">Travel With {{$tourguide->user->firstName }}</button>
          <button id="edit_trips"> Edit Trips </button>
      </div>
      <div class="row">
          <div class="col-lg-4 col-md-6 col-xs-12 col-sm-12">
              <img width="100%" height="250" width="100"  src="{{asset('storage/' . $tourguide->user->profileImg  )}}" alt="user-image">
              <div class="profile-photo-hovering">
                  <i id="edit-profile-photo" class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </div>
              <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam ipsa magnam quia, tempore facilis ea, iusto, ratione vel ipsum repellat incidunt culpa iure quam quas. Ipsum quas magnam tenetur illum optio doloribus doloremque porro
                  nihil temporibus aperiam, nisi exercitationem maiores nesciunt unde sed tempora sapiente corrupti distinctio culpa eius asperiores!
              </p>
              <hr>
              <h3>Expertise</h3>
              <div class="Expertise">
                  <span>Local Cuisine</span><span>Local Culture</span>
                  <span>Safari</span><span>Biking</span>

                  <div class="Expertise-edit-hovering">
                      <i id="edit-Expertise-btn" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </div>
              </div>
              <hr>
              <h3>Languages</h3>
              <div class="Languages">
                  <span>English</span><span>Arabic</span>
                  <span>French</span><span>Chinise</span>
                  <div class="lang-edit-hovering">
                      <i id="edit-langs-btn" class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </div>

              </div>
          </div>

          <div class="Expertise-pop-up">
              <div class="edit-Expertise-popup">
                  <h2 style="text-align: right;"><i style="cursor: pointer;" class="edit-Expertise-close-button fa fa-times" aria-hidden="true"></i></h2>
                  <h1 style="text-align: center;">Edit Expertises</h1>

                  <form id="Expertise-edits">
                      <select name="language" class="custom-select" multiple>
                          <option value="Local Cuisine" selected >Local Cuisine</option>
                          <option value="Local Culture" selected>Local Culture</option>
                          <option value="Safary" selected>Safary</option>
                          <option value="Pick up and Driving Tours">Pick up and Driving Tours</option>
                          <option value="Art and Museums">Art and Museums</option>
                          <option value="Nightlife and Bars">Nightlife and Bars</option>
                          <option value="Exploration and Sightseeing">Exploration and Sightseeing</option>
                          <option value="Islamic Cairo">Islamic Cairo</option>
                          <option value="Pharaonic Cairo">Pharaonic Cairo</option>
                          <option value="Roman Dynasty">Roman Dynasty</option>
                          <option value="Modern History">Modern History</option>
                          <option value="Christian History">Christian History</option>
                          <option value="Christian History" Selected>Biking</option>
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
                                border-radius: 2px;" type="submit">Save</button>


                  </form>






              </div>

          </div>
          <div class="langs-pop-up">
              <div class="edit-langs-popup">
                  <h2 style="text-align: right;"><i class="edit-langs-close-button fa fa-times" aria-hidden="true"></i></h2>
                  <h1 style="text-align: center;">Edit Languages</h1>
                  <form id="edit-langs-form">
                      <h2>Languages</h2>
                      <div id="eduback" class="eduback">
                          <select name="languages" id="lang1">
                              <option value="">Choose the language</option>
                              <option value="Arabic">Arabic</option>
                              <option value="English">English</option>
                              <option value="French">French</option>
                              <option value="Italian">Italian</option>
                          </select>
                          <select name="Speaking" id="Speaking1">
                              <option value="">Speaking Level</option>
                              <option value="Beginner">Beginner</option>
                              <option value="Beginner">Elementary</option>
                              <option value="English">Intermediate</option>
                              <option value="English">Upper-intermediate</option>
                              <option value="French">Advanced</option>
                              <option value="Italian">Proficiency</option>
                          </select>
                          <select name="Writting" id="Writting1">
                              <option value="">Writting Level</option>
                              <option value="Beginner">Beginner</option>
                              <option value="Beginner">Elementary</option>
                              <option value="English">Intermediate</option>
                              <option value="English">Upper-intermediate</option>
                              <option value="French">Advanced</option>
                              <option value="Italian">Proficiency</option>
                          </select>
                          <select name="Comprehension" id="Comprehension1">
                              <option value="">Comprehension Level</option>
                              <option value="Beginner">Beginner</option>
                              <option value="Beginner">Elementary</option>
                              <option value="English">Intermediate</option>
                              <option value="English">Upper-intermediate</option>
                              <option value="French">Advanced</option>
                              <option value="Italian">Proficiency</option>
                          </select>
                      </div>
                      <button type="button" id="addlang">Add Another Language</button>
                      <button type="button" id="rmvlang">Remove Language</button>
                      <button type="button" id="editlang">Save Edits</button>

                  </form>


              </div>

          </div>

          <div class="col-lg-8 col-md-6 col-xs-12 col-sm-12">
              <div class="slider-container">
                  <div id="slide-number" class="slide-number"></div>
                  <img src="{{asset('images/profileimages/Hurghada.jpg')}}" alt="" />
                  <img src="{{asset('images/profileimages/Sharm.jpg')}}" alt="" />
                  <img src="{{asset('images/profileimages/Pyrimades.jpg')}}" alt="" />
                  <img src="{{asset('images/profileimages/SaltyLakes.jpg')}}" alt="" />
                  <img src="{{asset('images/profileimages/ParoonCastle.jpg')}}" alt="" />

              </div>
              <div class="slider-controls">
                  <span style="display: none;" id="prev" class="prev">previous</span>
                  <span id="indicator" class="indicator">

                  </span>
                  <span style="display: none;" id="next" class="next">next</span>
              </div>
              <div class="slider-container2">
                  <div style="display:none;" id="slide-number2" class="slide-number2"></div>
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis, dolorem? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis tempora asperiores ex dolorem dolorum eveniet corrupti dolor facere! Ab, nam. Lorem
                      ipsum dolor sit amet consectetur, adipisicing elit. Numquam, molestias Mario!
                      <br>
                      <a  data-toggle="modal" data-target="#hurgada">Click to view this trip activities</a>
                  </p>
                  <p>Lorem ipsum dolor, sit elit. Perspiciatis, dolorem? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, quibusdam, tenetur magnam nam quaerat expedita hic nemo mollitia quod nostrum eius blanditiis quam veniam. Fugit
                      quasi nobis earum? Veniam a iusto ullam eligendi quos voluptate est quo quibusdam. Libero unde repudiandae dicta cumque porro magnam ratione harum laudantium cum numquam! Lorem ipsum dolor sit amet consectetur, adipisicing
                      elit. Deserunt, ipsam Ashraf!
                  </p>
                  <p>Lorem ipsum dolor, sit amet consecteturconsecteturconsectetur adipisicing elit. Perspiciatis, dolorem? Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis reprehenderit velit, temporibus totam laudantium ipsam!
                      Nemo suscipit facere libero cum nobis blanditiis illum in fugiat sunt aperiam? Nulla, odit saepe illo at eius commodi nemo molestias voluptate, sed magnam fuga! Lorem, ipsum. Sobhy
                  </p>
                  <p>Lorem ipsum dolor, sit amet adipisicing elit. Perspiciatis, dolorem? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, officia. Deleniti minima possimus officiis facilis quo. Lorem ipsum dolor, sit amet consectetur
                      adipisicing elit. Officiis unde soluta quod voluptate vel sed nesciunt culpa illo pariatur veritatis ad assumenda odio, nobis eius aspernatur? Ea, eum!

                  </p>
                  <p>Lorem ipsum dolor, sit amet consectetur . Perspiciatis, dolorem? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure suscipit adipisci ducimus. Nemo impedit, eius quasi est similique accusamus labore dignissimos amet
                      fuga nobis facilis ea reiciendis cum nisi molestiae porro! Consequuntur culpa ipsum repellendus. Blanditiis aliquam quasi, voluptate omnis similique voluptates placeat adipisci doloribus impedit dolore et quae dolorum dolorem
                      culpa, tenetur temporibus voluptatem quia ad explicabo. Accusamus, molestias? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit, porro.
                  </p>

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

        <div class="dropdown">
            <button class="edit-trip"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                Hrurgada <i class="fa fa-caret-down" aria-hidden="true"></i>

            </button>
            <button class="delete-trip"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <img src="images/Diving.jpg">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <span>Price 50 $</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="description">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque voluptate fugiat vel quisquam ducimus quasi culpa fugit, ipsa hic, doloribus ad, repudiandae repellat aliquam praesentium eveniet totam earum commodi autem.
                                Eaque cumque dolore nesciunt fugiat aspernatur. Animi omnis, ut nostrum beatae quidem saepe quos, sequi sunt facilis aliquid voluptates aspernatur.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <h1>ACTIVITIES</h1><br>

                        <div class="activities">
                            <ul class="aval-activities">
                                <li>Local Cuisine 50$</li>
                                <li>Safary 60$</li>
                                <li>Nightlife and Bars 150$</li>
                                <li>Chirstian History 20$</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="dropdown">
            <button class="edit-trip"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                Pyramids <i class="fa fa-caret-down" aria-hidden="true"></i>

            </button>
            <button class="delete-trip"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <img src="images/Pyramids.jpg">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <span>Price 150 $</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="description">
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque voluptate fugiat vel quisquam ducimus quasi culpa fugit, ipsa hic, doloribus ad, repudiandae repellat aliquam praesentium eveniet totam earum commodi autem.
                                Eaque cumque dolore nesciunt fugiat aspernatur. Animi omnis, ut nostrum beatae quidem saepe quos, sequi sunt facilis aliquid voluptates aspernatur.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <h1>ACTIVITIES</h1><br>

                        <div class="activities">
                            <ul class="aval-activities">
                                <li>Local Cuisine 50$</li>
                                <li>Safary 60$</li>
                                <li>Nightlife and Bars 150$</li>
                                <li>Chirstian History 20$</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <button class="add-trip">Add Trip</button>
    </div>
</div>

<div class="add-trip-pop-up">
    <div class="add-trip-form">
        <h2 style="text-align: right;" id="close_addtrip_button"><i style="cursor: pointer;" class="fa fa-times" aria-hidden="true"></i>
        </h2>
        <h1 style="text-align: center;">Add Trip</h1>
        <form>
            <input type="text" placeholder="Trip Title" value="hurgada">
            <input type="file" placeholder="Trip Photo">
            <input type="text" placeholder="Trip Description">
            <select name="language" class="custom-select" multiple>
                <option value="Local Cuisine"  >Local Cuisine</option>
                <option value="Local Culture" >Local Culture</option>
                <option value="Safary" >Safary</option>
                <option value="Pick up and Driving Tours">Pick up and Driving Tours</option>
                <option value="Art and Museums">Art and Museums</option>
                <option value="Nightlife and Bars">Nightlife and Bars</option>
                <option value="Exploration and Sightseeing">Exploration and Sightseeing</option>
                <option value="Islamic Cairo">Islamic Cairo</option>
                <option value="Pharaonic Cairo">Pharaonic Cairo</option>
                <option value="Roman Dynasty">Roman Dynasty</option>
                <option value="Modern History">Modern History</option>
                <option value="Christian History">Christian History</option>
                <option value="Christian History" >Biking</option>
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
                border-radius: 2px;" type="submit">Save</button>
        </form>

    </div>
</div>

<div class="edit-trip-pop-up">
    <div class="edit-trip-form">
        <h2 style="text-align: right;" id="close_edittrip_button"><i style="cursor: pointer;" class="fa fa-times" aria-hidden="true"></i>
        </h2>
        <h1 style="text-align: center;">Edit Trip</h1>
        <form>
            <input type="text" placeholder="Trip Title" value="hurgada">
            <input type="file" placeholder="Trip Photo">
            <input type="text" placeholder="Trip Description">
            <select name="language" class="custom-select" multiple>
                <option value="Local Cuisine" selected >Local Cuisine</option>
                <option value="Local Culture" selected>Local Culture</option>
                <option value="Safary" selected>Safary</option>
                <option value="Pick up and Driving Tours">Pick up and Driving Tours</option>
                <option value="Art and Museums">Art and Museums</option>
                <option value="Nightlife and Bars">Nightlife and Bars</option>
                <option value="Exploration and Sightseeing">Exploration and Sightseeing</option>
                <option value="Islamic Cairo">Islamic Cairo</option>
                <option value="Pharaonic Cairo">Pharaonic Cairo</option>
                <option value="Roman Dynasty">Roman Dynasty</option>
                <option value="Modern History">Modern History</option>
                <option value="Christian History">Christian History</option>
                <option value="Christian History" Selected>Biking</option>
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
                border-radius: 2px;" type="submit">Save</button>
        </form>

    </div>
</div>


<div class="pop-ups-2">
    <div class="edit-profile-photo">
        <h2><i class="close-edit-photo-popup fa fa-times" aria-hidden="true"></i></h2>
        <img class="editable-photo" src="images/CairoTower.jpg">
        <button id="for-edit-photo-input">Edit Photo</button>
        <form class="edit-profile-photo-input" method="GET">
            <input id="edit-profile-photo-input" type="file" name="profile-photo" place-holder="profile photo">
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
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h2><span class="bold-black">Josh . </span>Thailand</h2><span>Reivew provided by John</span>
                  <p>
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit, voluptate placeat. Atque fugit expedita repudiandae quibusdam accusantium amet voluptatum fugiat itaque unde saepe, delectus assumenda dignissimos facilis asperiores magnam possimus voluptatibus
                      tempora perferendis beatae corrupti porro nemo laboriosam quos rerum? Debitis, delectus illum. Quae quia eius neque porro repellat earum!
                  </p>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h2><span class="bold-black">Josh . </span>Egypt</h2><span>Reivew provided by John</span>
                  <p>
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit, voluptate placeat. Atque fugit expedita repudiandae quibusdam accusantium amet voluptatum fugiat itaque unde saepe, delectus assumenda dignissimos facilis asperiores magnam possimus voluptatibus
                      tempora perferendis beatae corrupti porro nemo laboriosam quos rerum? Debitis, delectus illum. Quae quia eius neque porro repellat earum!
                  </p>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <h2><span class="bold-black">Josh . </span>USA</h2><span>Reivew provided by John</span>
                  <p>
                      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit, voluptate placeat. Atque fugit expedita repudiandae quibusdam accusantium amet voluptatum fugiat itaque unde saepe, delectus assumenda dignissimos facilis asperiores magnam possimus voluptatibus
                      tempora perferendis beatae corrupti porro nemo laboriosam quos rerum? Debitis, delectus illum. Quae quia eius neque porro repellat earum!
                  </p>
              </div>
          </div>
      </div>
  </section>

  <!-- End Reviews Section -->

   <!-- End Reviews Section -->
<!-- End Reviews Section -->

    <!-- Start of Activites Modal -->
        <div class="modal fade" id="hurgada" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Hurghada Activites Menu</h3>
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
                          <tr>

                            <td scope="row">Diving</td>
                            <td>bla bla bla blaaaah</td>
                            <td>50</td>
                          </tr>
                          <tr>

                            <td scope="row">Snorkling</td>
                            <td>Another bla bla bla blaaahh</td>
                            <td>30</td>
                          </tr>
                          <tr>
                            <td scope="row">Beach</td>
                            <td>bla bla bla blaaaah</td>
                            <td>25</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
    <!-- End of Activities Modal-->

    <!-- Start of Booking Modal-->
            <div class="modal fade" id="book" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLongTitle">Travel With John</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <h3>Please Select the activites you wish to do</h3>
                        <div class="panel-group" id="my_accordian">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title" data-target="#panel-hurgada" data-toggle="collapse" data-parent="#my_accordian">Hurgada</h4>
                                </div>
                                <div class="panel-collapse collapse" id="panel-hurgada">
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
                                          <tr>

                                            <td scope="row">Diving</td>
                                            <td>bla bla bla blaaaah</td>
                                            <td>50</td>
                                            <td><input type="checkbox"></td>
                                          </tr>
                                          <tr>

                                            <td scope="row">Snorkling</td>
                                            <td>Another bla bla bla blaaahh</td>
                                            <td>30</td>
                                            <td><input type="checkbox"></td>
                                          </tr>
                                          <tr>
                                            <td scope="row">Beach</td>
                                            <td>bla bla bla blaaaah</td>
                                            <td>25</td>
                                            <td><input type="checkbox"></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                            </div>

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title" data-target="#panel-sharm" data-toggle="collapse" data-parent="#my_accordian">Sharm</h4>
                                </div>
                                <div class="panel-collapse collapse" id="panel-sharm">
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
                                          <tr>

                                            <td scope="row">Diving</td>
                                            <td>bla bla bla blaaaah</td>
                                            <td>50</td>
                                            <td><input type="checkbox"></td>
                                          </tr>
                                          <tr>

                                            <td scope="row">Snorkling</td>
                                            <td>Another bla bla bla blaaahh</td>
                                            <td>30</td>
                                            <td><input type="checkbox"></td>
                                          </tr>
                                          <tr>
                                            <td scope="row">Beach</td>
                                            <td>bla bla bla blaaaah</td>
                                            <td>25</td>
                                            <td><input type="checkbox"></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                            </div>

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title" data-target="#panel-pyramids" data-toggle="collapse" data-parent="#my_accordian">Pyramids</h4>
                                </div>
                                <div class="panel-collapse collapse" id="panel-pyramids">
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
                                          <tr>

                                            <td scope="row">Diving</td>
                                            <td>bla bla bla blaaaah</td>
                                            <td>50</td>
                                            <td><input type="checkbox"></td>
                                          </tr>
                                          <tr>

                                            <td scope="row">Snorkling</td>
                                            <td>Another bla bla bla blaaahh</td>
                                            <td>30</td>
                                            <td><input type="checkbox"></td>
                                          </tr>
                                          <tr>
                                            <td scope="row">Beach</td>
                                            <td>bla bla bla blaaaah</td>
                                            <td>25</td>
                                            <td><input type="checkbox"></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                            </div>

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title" data-target="#panel-salty" data-toggle="collapse" data-parent="#my_accordian">Salty Lakes</h4>
                                </div>
                                <div class="panel-collapse collapse" id="panel-salty">
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
                                          <tr>

                                            <td scope="row">Diving</td>
                                            <td>bla bla bla blaaaah</td>
                                            <td>50</td>
                                            <td><input type="checkbox"></td>
                                          </tr>
                                          <tr>

                                            <td scope="row">Snorkling</td>
                                            <td>Another bla bla bla blaaahh</td>
                                            <td>30</td>
                                            <td><input type="checkbox"></td>
                                          </tr>
                                          <tr>
                                            <td scope="row">Beach</td>
                                            <td>bla bla bla blaaaah</td>
                                            <td>25</td>
                                            <td><input type="checkbox"></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                            </div>

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title" data-target="#panel-paroon" data-toggle="collapse" data-parent="#my_accordian">Paroon Palace</h4>
                                </div>
                                <div class="panel-collapse collapse" id="panel-paroon">
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
                                          <tr>

                                            <td scope="row">Diving</td>
                                            <td>bla bla bla blaaaah</td>
                                            <td>50</td>
                                            <td><input type="checkbox"></td>
                                          </tr>
                                          <tr>

                                            <td scope="row">Snorkling</td>
                                            <td>Another bla bla bla blaaahh</td>
                                            <td>30</td>
                                            <td><input type="checkbox"></td>
                                          </tr>
                                          <tr>
                                            <td scope="row">Beach</td>
                                            <td>bla bla bla blaaaah</td>
                                            <td>25</td>
                                            <td><input type="checkbox"></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>

                        <form>
                            <div class="form-group form-inline">
                              <label for="exampleFormControlInput1">How many persons?</label>
                              <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="2">
                            </div>

                            <div class="form-group form-inline">
                                <label for="exampleFormControlInput1">Do you need a hotel pickup?</label>
                                <input type="radio" class="form-control" name="hotel-pickup" > Yes
                                <input type="radio" class="form-control" name="hotel-pickup"> No
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Please let us know if need any special request</label>
                                <br>
                                <textarea name="special-request" id="" cols="70" rows="5"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">Please pickup the desired date</label>
                                <input type="date">
                            </div>

                        </form>

                        <div>
                            <div class="text-right"><h4>Total: <strong>USD###</strong></h4></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#success-book" data-dismiss="modal">Send Request</button>
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
