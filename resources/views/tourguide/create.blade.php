@extends('layout.header')

@section('template_title')
    Create Tourguide
@endsection

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>



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
                                                   placeholder="Enter Your First Name">
                                            @error('firstName')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label class="labels-names" for="lastName">Last Name</label>
                                            <input type="text" class="form-control" id="lastNmae" name="lastName" placeholder="Enter Your Last Name">
                                            @error('lastName')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="labels-names" for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Your Username">
                                            @error('username')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="labels-names" for="fb">Facebook link</label>
                                            <input type="text" class="form-control" id="fb" name="fb-link" placeholder="Please enter your Facebook Profile">
                                            @error('fb-link')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="labels-names" for="bio">Bio</label>
                                            <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
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
                                            <input type="file" required id="profileImg" name="profileImg" accept="image/*">
                                            @error('profileImg')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                </div>
                                <div class="col col-md-5 col-xs-12">
                                    <div class="form-group">
                                        <label class="labels-names" for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
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
                                        <label class="labels-names" for="language-picker-select1">Select Your First Language</label>
                                        <select required class=" selectpicker mr-sm-2" id="language-picker-select1" name="1stlanguage" data-live-search="true">
                                            <option selected disabled>Choose a Language</option>
                                        @foreach($languages as $key => $lang)
                                                <option value="{{$lang->id}}"> {{$lang->name}}</option>
                                                @endforeach

                                        </select>
                                        @error('1stlanguage')
                                        <div class="alert alert-danger">The First Lnaguage field is required.</div>
                                        @enderror
                                    </div>

                                    <div class="form-group ">
                                        <label class="labels-names" for="2ndlang">Select Your Second language</label>
                                        <select required class=" selectpicker mr-sm-2" id="2ndlang" name="2ndlanguage" data-live-search="true">
                                            <option selected disabled>Choose a Language</option>
                                            @foreach($languages as $key => $lang)
                                                <option value="{{$lang->id}}"> {{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('2ndlanguage')
                                        <div class="alert alert-danger">The Second Lnaguage field is required.
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">

                                        <label class="labels-names" for="city"> Please Choose the cities you can work in </label>
                                        <input type="Location" name="city"  class="form-control" id="city" placeholder="Aswan , Cairo" required>
                                        <small>If you want to add more than one.Put , between them</small>
                                        @error('cities')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="labels-names" for="price">Pricing rates</label>
                                        <div class="row">
                                            <div class=" col col-md-3">
                                                <input type="number" name="priceRate" min="1" class="form-control" id="price" required >
                                                @error('priceRate')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror                                              </div>
                                            <div class="col col-md-5">
                                                <h6 style="font-weight: bolder;font-size: 15px;padding-top: 10px;">$ / hr</h6>

                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info sign-up-button mt-5">Sign Up</button>
                                    <div class="form-check mt-3 mb-5">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="accept_terms">
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
        $('#submitForm').click(function () {
            let rdd = $('#2ndlang').val();
            if (rdd == ""){
                //Send user back to Go
                $("#2ndlang").append('<div class="alert alert-danger">Please Choose Second Language</div>')
            }
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
