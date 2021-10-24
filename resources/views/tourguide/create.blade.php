@extends('layout.header')

@section('template_title')
    Sign Up As Tourguide
@endsection

@section('content')
<link href="{{asset("css/plugins.bundle.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("css/prismjs.bundle.css")}}" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <div class="col-md-12">
        <div class="tour-page d-flex justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="all-elements mt-5 ">
                        <h2 class="head-line mt-3 ml-2">Sign Up As Tour Guide</h2>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-5 col-xs-12 ml-lg-4">
                                    <form method="POST" action="{{ route('tourguides.store') }}"  role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="labels-names" for="FirstName">First Name</label>
                                            <input type="text" class="form-control" id="FirstName" name="firstName"
                                                   value="{{old("firstName")}}"
                                                   placeholder="Enter Your First Name">
                                            @error('firstName')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label class="labels-names" for="lastName">Last Name</label>
                                            <input type="text" class="form-control" id="lastNmae" name="lastName"
                                                   value="{{old("lastName")}}"
                                                   placeholder="Enter Your Last Name">
                                            @error('lastName')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="labels-names" for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                   value="{{old("username")}}"
                                                   placeholder="Enter Your Username">
                                            @error('username')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="form-group activity dropdown bootstrap-select show-tick show" multiple="multiple" tabindex="null">
                                            <label class="labels-names" for="activities">Select Activities You Can do</label>
                                            <select required class=" selectpicker mr-sm-2 form-control" id="activities" name="activities[]"multiple="multiple" tabindex="null">
                                        
                                                <option class="option" value="History & Culture"> History & Culture</option>
                                                <option class="option" value="Art & Museums">Art & Museums</option>
                                                <option class="option" value=">Shopping">Shopping</option>
                                                <option class="option" value="Pick up & Driving Tours">Pick up & Driving Tours</option>                                                </option>
                                                <option class="option" value="Nighclub & Bars">Nighclub & Bars</option>
                                                <option class="option" value="Exploration & Sightseeing">Exploration & Sightseeing</option>
                                                <option class="option" value="Food & Restaurants">Food & Restaurants</option>
                                                <option class="option" value="Sports">Sports</option>
                                                <option class="option" value="Translation & Interpretation">Translation & Interpretation</option>
                                            </select>
                                            @error('activities')
                                            <div class="alert alert-danger">Select at least one activity</div>
                                            @enderror
                                            {{-- <div id="result3">
                                                <input type="hidden" name="activity[]" value="">
                                            </div> --}}
                                        </div>
                                        <div class="form-group">
                                            <label class="labels-names" for="bio">Bio</label>
                                            <textarea class="form-control" id="bio"  value="{{old("bio")}}" name="bio" rows="3"></textarea>
                                            @error('bio')
                                            <div class="alert alert-danger">The Bio field is required.</div>
                                            @enderror
                                        </div>
                                        <div class="row col-md-12">                                    
                                        <div class="form-group col-md-6">
                                            <label class="labels-names" for="fb_link">Facebook Name</label>
                                            <input class="form-control"  type="text" id="fb_link" name="fb_link" 
                                            value="{{old("fb_link")}}"
                                                   placeholder="/example">
                                            @error('fb_link')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="labels-names" for="portfolio">Your Website (optional)</label>
                                            <input class="form-control"  type="text" id="portfolio" name="portfolio" 
                                            value="{{old("portfolio")}}"
                                                   placeholder="www.egyptus.com">
                                            @error('portfolio')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                
                                        <div class="form-group">
                                            <label class="labels-names" for="profileImg">Upload Your Personal Photo</label>
                                            <input class="form-control" type="file"  id="profileImg" name="profileImg" accept="image/*">
                                            @error('profileImg')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                </div>
                                <div class="col col-md-5 col-xs-12">
                                    <div class="form-group">
                                        <label class="labels-names" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               value="{{old("email")}}"
                                               placeholder="Email" required>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="labels-names" for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required placeholder="Password">
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="labels-names" for="confirm-password">Repeat your password</label>
                                        <input type="password" class="form-control" id="confirm-password" name="confirmpassword" placeholder="Password">
                                        {!! $errors->first('confirm-password', '<div class="invalid-feedback">:message</p>') !!}
                                    </div>

                                    <div class="form-group language dropdown bootstrap-select show-tick show" multiple="multiple" tabindex="null">
                                        <label class="labels-names" for="langauges">Select Your 2 langauges</label>
                                        <select required class=" selectpicker mr-sm-2 form-control" id="langauges" name="languages[]"multiple="multiple" tabindex="null">
                                            <option class="option" value="Arabic">Arabic</option>
                                            <option class="option" value="Chinese">Chinese</option>
                                            <option class="option" value="English">English</option>
                                            <option class="option" value="French">French</option>                                                <option class="option" value="en">English</option>
                                            <option class="option" value="German">German</option>
                                            <option class="option" value="Hebrew">Hebrew</option>
                                            <option class="option" value="Hindi">Hindi</option>
                                            <option class="option" value="Irish">Irish</option>
                                            <option class="option" value="Italian">Italian</option>
                                            <option class="option" value="Japanese">Japanese</option>
                                            <option class="option" value="Korean">Korean</option>
                                            <option class="option" value="Portuguese">Portuguese</option>
                                            <option class="option" value="Romanian">Romanian</option>
                                            <option class="option" value="Russian">Russian</option>
                                            <option class="option" value="Spanish">Spanish</option>
                                            <option class="option" value="Sundanese">Sundanese</option>
                                            <option class="option" value="Swedish">Swedish </option>
                                            <option class="option" value="Turkish">Turkish</option>
                                            <option class="option" value="Ukrainian">Ukrainian</option>
                                        </select>
                                        @error('languages')
                                        <div class="alert alert-danger">Please select 2 langauges.</div>
                                        @enderror
                                    </div>
                                    
                                   
                                    <div class="form-group">

                                        <label class="labels-names" for="city"> Please Choose the cities you can work in </label>
                                        <input type="Location" name="cities"  value="{{old("cities")}}" class="form-control" id="city" placeholder="Aswan , Cairo" required>
                                        <small>If you want to add more than one.Put , between them</small>
                                        @error('cities')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <br>
                                    <div class="form-group">
                                        <label class="labels-names" for="price">Pricing rates</label>
                                        <div class="row">
                                            <div class=" col col-md-3">
                                                <input type="number" name="priceRate" value="{{old("priceRate")}}" min="1" class="form-control" id="price" required >
                                                @error('priceRate')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror                                              </div>
                                            <div class="col col-md-5">
                                                <h6 style="font-weight: bolder;font-size: 15px;padding-top: 10px;">$ / hr</h6>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="labels-names" for="video">Upload a video: describing yourself(optional) max: 3 min</label>
                                        <input  type="file" id="video" name="video" accept="video/*">

                                    </div>

                                    <button type="submit" id="submitForm" class="btn btn-info sign-up-button mt-5">Sign Up</button>
                                    <div class="form-check mt-3 mb-5">
                                        <input type="checkbox" class="form-check-input" required id="exampleCheck1" name="accept_terms">
                                        <label class="form-check-label labels-names "for="exampleCheck1">I agree to the <span class="terms-policy">Terms of Service</span> and <span class="terms-policy">Privacy Policy</span>  </label>
                                    </div>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
     $(document).ready(function() {
        $('#activities').multiselect({
            includeSelectAllOption: true,
            enableFiltering: true,
            enableCaseInsensitiveFiltering: true,
            filterPlaceholder:'Search Here..'
            });
            });

        // $('.option').click(function(){
        //     alert("yes")
        //     let rdd = $(this);
        //     $("#result").append('<input type="hidden" name="1stlang" value="' + rdd + '">');
        //     // ...
        // });
        $("#1stlang").change(function () {
            let rdd = $("#1stlang").val();
                $("#result1 input").val( rdd);

        });
        $("#2ndlang").change(function () {
            let rdd = $("#2ndlang").val();
            $("#result2 input").val( rdd);

        });
        $("#activities").select(function () {
            let rdd = $("#activities").val();
            $("#result3 input").val( rdd);

        });

        // $(document).ready(function(){
        //     $("#city").change(function(){
        //         var selectedCountry = $(this).children("option:selected").val();
        //         alert("You have selected the country - " + selectedCountry);
        //     });
        // });


    </script>


    {{--    <section class="content container-fluid">--}}
    {{--        <div class="row">--}}
    {{--            <div class="col-md-12">--}}

    {{--                @includeif('partials.errors')--}}

    {{--                <div class="card card-default">--}}
    {{--                    <div class="card-header">--}}
    {{--                        <span class="card-title">Create Tourguide</span>--}}
    {{--                    </div>--}}
    {{--                    <div class="card-body">--}}
    {{--                        <form method="POST" action="{{ route('tourguides.store') }}"  role="form" enctype="multipart/form-data">--}}
    {{--                            @csrf--}}

    {{--                            @include('tourguide.form')--}}

    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    
@endsection
