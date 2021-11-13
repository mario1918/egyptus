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
                    <div class="all-elements mt-5 ">
                        <h2 class="head-line mt-3 ml-2">Sign Up As Tour Guide</h2>
                        <ul class="nav nav-tabs nav-tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#step1">Personal Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#step2">Work Experience</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#step3" tabindex="-1" aria-disabled="true">Educational Background</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#step4" tabindex="-1" aria-disabled="true">Langauges Fluency</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#step5" tabindex="-1" aria-disabled="true">Documents Uplaod</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#step6" tabindex="-1" aria-disabled="true">Trips</a>
                            </li>
                        </ul>
                       
                        <form method="POST" action="{{ route('tourguides.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf
                        <div class="container tab-content mt-5" id="myTabContent">
                            {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}
                            {{-- TAB 1: PERSONAL INFO --}}
                                {{-- <div style="display: none" class="tab-pane fade show active" id="step1" role="tabpanel" aria-labelledby="step2" style="margin: 10px">
                                    <div class="row">
                                    <div class="  col-md-4 col-xs-12">
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

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="labels-names" for="region">Region</label>
                                                <input type="text" class="form-control" id="region" name="region"
                                                        value="{{old("region")}}"
                                                        placeholder="Enter Your Region">
                                                @error('region')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="labels-names" for="country">Country</label>
                                                <input type="text" class="form-control" id="country" name="country"
                                                        value="{{old("country")}}"
                                                        placeholder="Enter Your country">
                                                @error('country')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label class="labels-names" for="birthdate">Birthdate</label>
                                            <input type="date" class="form-control" id="birthdate" required name="birthdate"
                                                    value="{{old("birthdate")}}"
                                                    >
                                            @error('birthdate')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class=" col-md-4 col-xs-12" style="margin-left: 15rem">
                                        <div class="form-group">
                                            <label class="labels-names" for="phoneNo">Phone Number</label>
                                            <input type="number" class="form-control" id="number" name="phoneNo"
                                                    value="{{old("phoneNo")}}"
                                                    >
                                            @error('phoneNo')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
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
                                            <small>The password must contain: 
                                                at least One <b>upper letter</b> , One <b>special character</b> and One <b>number</b> </small>
                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="labels-names" for="confirm-password">Repeat your password</label>
                                            <input type="password" class="form-control" id="confirm-password" name="password_confirmation" placeholder="Password">
                                        </div>
                                    </div>
                                    </div>
                                </div> --}}
                            {{-- TAB 2: Work Experience --}}
                                {{-- <div class="tab-pane fade d-none" id="step2" role="tabpanel" aria-labelledby="step3" style="margin: 10px">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="labels-names" for="work_experience"><b>1) Your Work Exprience</b></label>
                                                <textarea class="form-control" id="work_experience"   name="work_experience" rows="5">{{old("work_experience")}}</textarea>
                                                @error('work_experience')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="labels-names" for="bio"><b>2) Write description about yourself (200 words)</b></label>
                                                <textarea class="form-control" id="bio"   name="bio" rows="3">{{old("bio")}}</textarea>
                                                @error('bio')
                                                <div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                            {{-- TAB 3: Educational Background --}}
                                {{-- <div class="tab-pane fade" id="step3" role="tabpanel" aria-labelledby="step4" style="margin: 10px">
                                    <div class="row">
                                        <table class="table table-striped  table-bordered">
                                            <thead class="table-dark ">
                                                <tr>
                                                    <th>Degree</th>
                                                    <th>University</th>
                                                    <th>Graduation Year</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td><input class="form-control" type="text" id="degree" value="{{old('degree.0')}}"   name="degree[]" /></td> 
                                                <td><input class="form-control" type="text" id="uni" value="{{old('uni.0')}}"   name="uni[]" /></td>
                                                <td><input class="form-control" type="date" id="gradYear"  value="{{old('gradYear.0')}}"  name="gradYear[]" /></td>
                                                <td><button class="btn btn-info">Add Another Education</button></td>
                                                </tr>
                                               
                                            </tbody>
                                        </table> 
                                    </div> 

                                </div> --}}
                            {{-- TAB 4: Languages Fluency --}}
                                {{-- <div class="tab-pane fade" id="step4" role="tabpanel" aria-labelledby="step5" style="margin: 10px">
                                    <div class="row col-md-12">
                                        <div class="form-group d-flex col-md-8">
                                            <label class="labels-names " for="langName">Language Name  </label>
                                            <input type="text" style="margin-left: 10px" class=" col-md-4 form-control" id="langName" 
                                            value="{{old('langName.0')}}" name="langName[]">
                                            @error('langName')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button class=" col-md-2 btn btn-info right" style="margin-left:10rem">Add another Language</button>

                                    </div>

                                    <div style="margin-left: 10px">
                                        <ul style="list-style-type: circle">
                                            <li>
                                                <div class="form-group">
                                                    <label>Spoken</label>
                                                    <div class="radio-inline">
                                                        <label class="radio">
                                                        <input type="radio" checked="checked" value="beginner" name="spoken[]">
                                                        <span></span>Beginner</label>
                                                        <label class="radio">
                                                        <input type="radio" value="intermediate"  name="spoken[]">
                                                        <span></span>Intermediate</label>
                                                        <label class="radio">
                                                        <input type="radio" value="advaned" name="spoken[]">
                                                        <span></span>Advanced</label>
                                                        <label class="radio">
                                                            <input type="radio" value="fluent" name="spoken[]">
                                                            <span></span>Fluent</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label>Written</label>
                                                    <div class="radio-inline">
                                                        <label class="radio">
                                                        <input type="radio" checked="checked" value="beginner" name="written[]">
                                                        <span></span>Beginner</label>
                                                        <label class="radio">
                                                        <input type="radio" value="intermediate"  name="written[]">
                                                        <span></span>Intermediate</label>
                                                        <label class="radio">
                                                        <input type="radio" value="advaned" name="written[]">
                                                        <span></span>Advanced</label>
                                                        <label class="radio">
                                                            <input type="radio" value="fluent" name="written[]">
                                                            <span></span>Fluent</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-group">
                                                    <label>Comperhension</label>
                                                    <div class="radio-inline">
                                                        <label class="radio">
                                                        <input type="radio" checked="checked" value="beginner" name="comperhension[]">
                                                        <span></span>Beginner</label>
                                                        <label class="radio">
                                                        <input type="radio" value="intermediate" name="comperhension[]">
                                                        <span></span>Intermediate</label>
                                                        <label class="radio">
                                                        <input type="radio" value="advaned" name="comperhension[]">
                                                        <span></span>Advanced</label>
                                                        <label class="radio">
                                                            <input type="radio" value="fluent" name="comperhension[]">
                                                            <span></span>Fluent</label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div> --}}

                                    
                                {{-- </div> --}}
                            {{-- TAB 5: Documents Uplaod --}}
                                {{-- <div class="tab-pane fade" id="step5" role="tabpanel" aria-labelledby="" style="margin: 10px">
                                    <div class="container">
                                        <h3>1) National Id</h3>
                                        <div class="row col-md-12">
                                            <div class="form-group col-md-4">
                                                <label class="labels-names" for="frontNation">Front</label>
                                                <input type="file" class="form-control" id="frontNation" value="{{old('frontNation')}}" name="frontNation">
                                                        
                                                @error('frontNation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
            
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="labels-names" for="backNation">Back</label>
                                                <input type="file" class="form-control" value="{{old('backNation')}}" id="backNation" name="backNation">
                    
                                                @error('backNation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
            
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="container">
                                        <h3>2) Tour Guiding License</h3>

                                        <div class="row col-md-12">
                                            <div class="form-group col-md-4">
                                                <label class="labels-names" for="frontLicense">Front</label>
                                                <input type="file" class="form-control" value="{{old('frontLicense')}}" id="frontLicense" name="frontLicense">
                                                        
                                                @error('frontLicense')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
            
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="labels-names" for="backLicense">Back</label>
                                                <input type="file" class="form-control" value="{{old('backLicense')}}" id="backLicense" name="backLicense">
                    
                                                @error('backLicense')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="container">
                                        <h3>3) Personal Photo</h3>
                                        <div class="form-group col-md-4">
                                            <label class="labels-names" for="profileImg">Personal Photo</label>
                                            <input type="file" class="form-control" id="profileImg" value="{{old('profileImg')}}" name="profileImg">
        
                                            @error('personPhoto')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
                               
                                <div class="tab-pane fade" id="step6" role="tabpanel" aria-labelledby="" style="margin: 10px">
                                    <div class="form-group">
                                        <label class="labels-names" for="frontNation">Front</label>
                                        <input type="file" class="form-control" id="frontNation" value="{{old('frontNation')}}" name="frontNation">
                                                
                                        @error('frontNation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
    
                                    </div>
                                    {{-- <input type="submit" name="submit" value="Submit"> --}}
                        </div>
                            

                                        
                                       <!-- 
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
                                -->

                                    
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // function storeData()
        // {
        //     var act=[];
        //     act[$("#actName").val()] =  $("#actPrice").val();
        //     $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        //     jQuery.ajax({
        //     url: "/storeTrip",
        //     method: 'GET',
        //     data: {
        //     "_token": "{{ csrf_token() }}",
        //     "title":$("#title").val(),
        //     "des":$("#des").val(),
        //     act,
        //     },
        //     error: function(error)
        //     {
        //     console.log(error.responseJSON);
        //     },
        //     success:function(data){
                
        //     }
        //     });
        // }

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


    </script>


    
@endsection
