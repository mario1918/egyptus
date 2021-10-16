@extends('layout.header')

@section('template_title')
    Register
@endsection

@section('content')

    <div class="col-md-12">
        <div class="tour-page d-flex justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="all-elements mt-5 ">

                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 col-xs-12 ml-lg-5">
                                    <form method="POST" action="{{ route('tourists.store') }}"  role="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label class="labels-names" for="FirstName">First Name</label>
                                            <input type="text" class="form-control" required
                                                   value="{{old('firstName')}}"
                                                   id="FirstName" name="firstName" placeholder="Enter Your First Name">
                                            @error('firstName')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label class="labels-names" for="lastName">Last Name</label>
                                            <input type="text" class="form-control" required
                                                   value="{{old('lastName')}}"
                                                   id="lastNmae" name="lastName" placeholder="Enter Your Last Name">
                                            @error('lastName')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="labels-names" for="username">Username</label>
                                            <input type="text" class="form-control" required
                                                   value="{{old('username')}}"
                                                   id="username" name="username" placeholder="Enter Your Username">
                                            @error('username')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group align-content-center">
                                            <button type="submit" class="btn btn-info sign-up-button mt-5">Sign Up</button>
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
                                    <div class="form-group">
                                        <label class="labels-names" for="profileImg">Upload Your Personal Photo</label>
                                        <input type="file"  id="profileImg" name="profileImg" accept="image/*" value="{{old("profileImg")}}">
                                        @error('profileImg')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
    </div>
@endsection
