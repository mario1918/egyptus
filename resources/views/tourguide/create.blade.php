<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('images/titlelogo.png')}}" type="image/icon type">
    <title>Egyptus</title>

    <!-- Css Files -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;700;900&display=swap" rel="stylesheet">



</head>


<div class="tourguideregpage">
    <h1 class="backhome"> 
        <a href="{{route('home')}}"><i class="fa fa-chevron-left" aria-hidden="true"></i> Go Back Home</a></h1>>


    <div class="container">
        <h1>Sign Up as a Tour Guide</h1>
        <form method="POST" id="form1" action="{{route('tourguides.store')}}">
            @csrf
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <h2>Personal Information</h2>
            <div id="errorResult" class="alert alert-danger" style="display: none">
                <ul>
                    
                </ul>
            </div>
            <input required="required" id="Fname" name="firstName"  value="{{old("firstName")}}" type="text" placeholder="First Name">
            @error('firstName')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input required="required" id="Lname" name="lastName"  value="{{old("lastName")}}" type="text" placeholder="Last Name" required>
            @error('lastName')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input required="required" id="region" name="region"  value="{{old("region")}}" type="text" placeholder="Region">
            @error('region')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input required="required" id="country" name="country"  value="{{old("country")}}" type="text" placeholder="Country" required>
            @error('country')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input required="required" id="birthdate" name="birthdate" value="{{old("birthdate")}}" type="date" data-toggle="tooltip" data-placement="top" title="Your Age must be equal or more than 21">
            @error('birthdate')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input required="required" id="pnonenumber"  name="phoneNo" value="{{old("phoneNo")}}" type="number" placeholder="Phone Number" data-toggle="tooltip" data-placement="top" title="Phone number must be between 11 and 14 number" required>
            @error('phoneNo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input required="required" id="Email" name="email" value="{{old("email")}}" type="email" placeholder="Email">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input required="required" id="password" name="password" type="password" placeholder="Password" data-toggle="tooltip" data-placement="top" title="password must contain at least one upper letter and one number" required>
            <input required="required" id="confirm-password" name="password_confirmation" type="password" placeholder="Repeat Your Password" required>


            <div class="btn-box">
                <button type="button" id="next1">Next</button>
            </div>
        </form>
<script>
   
</script>
        <form id="form2" method="post" action="{{route('tourguides.store')}}">
            @csrf
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <h2> Work Experience</h2>
            <h1> Your Recent Work Experience </h1>
            <input id="rec-work-experience" class=" input-lg" name="work_experience" placeholder="Recent work experience">

            <h1> Job Title </h1>
            <input id="jobtitle" name="jobTitle" placeholder="Your Job Title"><br>
            <h1> Years Of Experience as a Tour Guide </h1>
            <label class="radio-inline"><input id="yearExp" type="radio" name="yearExp" value="0To2">&nbsp;&nbsp;&nbsp;0 to 2</label>
            <label class="radio-inline"><input type="radio" id="yearExp" name="yearExp" value="2To5">&nbsp;&nbsp;&nbsp;2 to 5</label>
            <label class="radio-inline"><input type="radio" id="yearExp" name="yearExp" value="5+">&nbsp;&nbsp;5+</label>

            <div class="btn-box">
                <button type="button" id="back1">Back</button>
                <button type="button" id="next2">Next</button>

            </div>
        </form>

        <form id="form3"  method='post' action="{{route('tourguides.store')}}">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            @csrf
            <h2>Educational Background</h2>
            <div id="eduback" class="eduback">
                <input id="degree-one" type="text" placeholder="Degree" name="degree" required>
                <input id="university-one" type="text" placeholder="University" name="uni" required>
                <input id="date-one" type="date" placeholder="Gradutaion Year" name="gradYear" data-toggle="tooltip" data-placement="top" title="the Graduation Year" required>
            </div>
            <button style="margin-top: 12px;height: 41px;border-radius: 2px;background-color: #111;background-image: none;" type="button" id="addedu">Add Another Education</button>

            <div class="btn-box">
                <button type="button" id="back2">Back</button>
                <button type="button" id="next3">Next</button>

            </div>
        </form>

        <form id="form4" method='post' action="{{route('tourguides.store')}}">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <h2>Languages</h2>
            <div id="eduback" class="eduback">
                <select name="langName" id="lang1">
                    <option value="">Choose the language</option>
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
                <select name="speaking" id="Speaking1">
                    <option value="">Speaking Level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Beginner">Elementary</option>
                    <option value="English">Intermediate</option>
                    <option value="English">Upper-intermediate</option>
                    <option value="French">Advanced</option>
                    <option value="Italian">Proficiency</option>
                </select>
                <select name="writting" id="Writting1">
                    <option value="">Writting Level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Beginner">Elementary</option>
                    <option value="English">Intermediate</option>
                    <option value="English">Upper-intermediate</option>
                    <option value="French">Advanced</option>
                    <option value="Italian">Proficiency</option>
                </select>
                <select name="comprehension" id="Comprehension1">
                    <option value="">Comprehension Level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Beginner">Elementary</option>
                    <option value="English">Intermediate</option>
                    <option value="English">Upper-intermediate</option>
                    <option value="French">Advanced</option>
                    <option value="Italian">Proficiency</option>
                </select>
            </div>
            <button style="margin-top: 12px;height: 41px;border-radius: 2px;background-color: #111;background-image: none;" type="button" id="addedu">Add Another Language</button>

            <div class="btn-box">
                <button type="button" id="back3">Back</button>
                <button type="button" id="next4">Next</button>

            </div>
        </form>


        <form id="form5" method="post" action="{{route('steps')}}" enctype="multipart/form-data">
            @csrf
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <input type="hidden" name="step" value="5">
            <h2>Upload Your Personal Documents</h2>
            <div style="margin-bottom:50px;">

                <div class="row">
                    <!--National ID-->
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <input style="display: none;" id="f01" type="file" name="frontNation" value="{{old('frontNation')}}" placeholder="Add profile picture" />
                        <label for="f01">Add  National ID Photo (Front)</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <input style="display: none;" id="f02" type="file" name="backNation" value="{{old('backNation')}}" placeholder="Add profile picture" />
                        <label for="f02">Add  National ID Photo (Back)</label>
                    </div>
                    <!--Tou Guide Licenses-->
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <input style="display: none;" id="f03" type="file" name="frontLicense" value="{{old('frontLicense')}}" placeholder="Add profile picture" />
                        <label for="f03">Add Tour Guide Licenses Photo (Front)</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <input style="display: none;" id="f04" type="file" name="backLicense" value="{{old('backLicense')}}" placeholder="Add profile picture" />
                        <label for="f04">Add Tour Guide Licenses Photo (Back)</label>
                    </div>
                    <!--Personal Photo-->
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <input style="display: none;" id="f05" type="file" name="profileImg" value="{{old('profileImg')}}" placeholder="Add profile picture" />
                        <label style="top: -15px;" for="f05">Add Personal Photo</label>
                    </div>

                </div>

            </div>

            <div class="btn-box">
                <button type="button" id="back4">Back</button>
                <button id="submit-all-forms" type="submit">Submit</button>

            </div>
        </form>

        <div class="step-row">
            <div id="progress">

            </div>
            <div class="step-col"><small> Step 1</small></div>
            <div class="step-col"><small> Step 2</small></div>
            <div class="step-col"><small> Step 3</small></div>
            <div class="step-col"><small> Step 4</small></div>
            <div class="step-col"><small> Step 5</small></div>
        </div>
    </div>
</div>


    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/tourguideregpage.js')}}"></script>
</body>

</html>