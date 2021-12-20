@extends('layout.header')
@section('title')
    Tourguides Profile
@endsection
@section('content')

    @include('layout.navbar')


    <section class="tourguides-profiles">
        <h1 style="text-align: center;">Our TourGuides</h1>
        <div class="container">
            <div class="row">
                @foreach($tourguides as $tourguide)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="animate__animated animate__fadeInLeft card">
                        <h1 class="tourguide-name">{{$tourguide->firstName}} {{$tourguide->lastName}} </h1>
                        <img class="tourguide-image" src="{{asset('storage/' . $tourguide->user->profileImg  )}}" alt="TourGuide">
                        <div class="row rate">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 colsm-6 col-xs-6">
                                <span class="nationality">Egyption</span>
                            </div>
                            <div class="col-lg-6 col-md-6 colsm-6 col-xs-6">
                                <a class="visit-profile" href="{{route("toruguideProfile",$tourguide->id)}}">Visit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@include('layout.footer')
@endsection
