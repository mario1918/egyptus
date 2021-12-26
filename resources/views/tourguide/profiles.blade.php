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
                @if(count($tourguides) != 0)
                @foreach($tourguides as $tourguide)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="animate__animated animate__fadeInLeft card">
                        <h1 class="tourguide-name">{{$tourguide->user->firstName}} {{$tourguide->user->lastName}} </h1>
                        <img class="tourguide-image" src="{{asset( $tourguide->user->profileImg  )}}" alt="TourGuide">
                        <div class="row rate">
                            @for($i=0;$i<= $tourguide->personalRate;$i++)
                            <i class="fa fa-star" aria-hidden="true"></i>
                            @endfor
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 colsm-6 col-xs-6">
                                <span class="nationality">{{$tourguide->nationality}}</span>
                            </div>
                            <div class="col-lg-6 col-md-6 colsm-6 col-xs-6">
                                <a class="visit-profile" href="{{route("tourguideProfile",$tourguide->id)}}">Visit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                    @endif
            </div>
        </div>
    </section>
@include('layout.footer')
@endsection
