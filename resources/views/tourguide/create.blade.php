@extends('layout.header')

@section('template_title')
    Create Tourguide
@endsection

@section('content')
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
                                        <div class="form-group 1st">
                                            <label class="labels-names" for="1stlang">Select Your First Language</label>
                                            <select required class=" selectpicker mr-sm-2" id="1stlang" name="1stlanguage" data-live-search="true">
                                                <option   selected disabled>
                                                        Choose a Language
                                                </option>
                                            @foreach($languages as $key => $lang)
                                                    <option class="option" value="{{$lang->id}}"> {{$lang->name}}</option>
                                                    @endforeach
    
                                            </select>
                                            @error('1stlang')
                                            <div class="alert alert-danger">The First Language field is required.</div>
                                            @enderror
                                            <div id="result1">
                                                <input type="hidden" name="1stlang" value="">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="labels-names" for="bio">Bio</label>
                                            <textarea class="form-control" id="bio"  value="{{old("bio")}}" name="bio" rows="3"></textarea>
                                            @error('bio')
                                            <div class="alert alert-danger">The Bio field is required.</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="labels-names" for="video">Upload a video: describing yourself(optional) max: 3 min</label>
                                            <input  type="file" id="video" name="video" accept="video/*">

                                        </div>
                                        <div class="form-group">
                                            <label class="labels-names" for="profileImg">Upload Your Personal Photo</label>
                                            <input type="file"  id="profileImg" name="profileImg" accept="image/*">
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
                                    
                                    <div class="form-group ">
                                        <label class="labels-names" for="2ndlang">Select Your Second language</label>
                                        <select required class=" selectpicker mr-sm-2" id="2ndlang" name="2ndlanguage" data-live-search="true">
                                            <option   selected disabled>
                                                    Choose a Language
                                            </option>
                                            @foreach($languages as $key => $lang)
                                                <option value="{{$lang->id}}"> {{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('2ndlang')
                                        <div class="alert alert-danger">The Second Language field is required.
                                        </div>
                                        @enderror
                                        <div id="result2">
                                            <input type="hidden" name="2ndlang" value="">

                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="labels-names" for="city"> Please Choose the cities you can work in </label>
                                        <input type="Location" name="cities"  value="{{old("cities")}}" class="form-control" id="city" placeholder="Aswan , Cairo" required>
                                        <small>If you want to add more than one.Put , between them</small>
                                        @error('cities')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
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
