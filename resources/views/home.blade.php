@extends('layout.header')
@section('template_title')
    Egyptus
@endsection
@section('content')
<div class="registration contact-form mx-auto">

    <div class = "container">
        <div class="justify-content-center">

            <div class="contant-shadow"> </div>

            <h2 class=" text-center  mb-3 register-txt "> Register as...</h2>

            <div class="row d-flex justify-content-center">
                <a href="{{route("tourguideSignup")}}" class="col-lg-4 col-9 register mx-3 mt-4 d-flex justify-content-center"> <span class="words-in-register">Tour Guide</span></a>
                <a href ="{{route("touristSignup")}}" class="col-lg-4 col-9 register mx-3 mt-4 d-flex justify-content-center"><span class="words-in-register">Tourist</span></a>
            </div>
        </div>
    </div>
</div>

<!-- Start loading page-->
{{--<div class="loading">--}}
{{--    <div id="preloder">--}}
{{--        <div class="loader"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!--End Loading page -->


{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
