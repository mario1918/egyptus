@extends('layout.header')
@section('template_title')
    {{$tourguide->user->firstName }} Profile
@endsection
@section('content')
@if ($errors->any())
<div class="m-2 alert alert-info">
   <strong> {{$errors->first()}}</strong>
</div>
@endif
<div class="profile-page">
    <div class="container">
        <div class="main-body">

              <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex flex-column align-items-center text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                        <div class="mt-3">
                          <h4>{{$tourguide->user->firstName}}</h4>
                          <p class="text-muted font-size-sm">{{$tourguide->bio}}</p>
                          <div class="clearfix mb-1"> <span class="float-start">
                            @for ($i = 0; $i < $tourguide->personalRate; $i++)
                            <i class="fa fa-star text-warning"></i>
                            @endfor
                            </span></div>
                          <button class="btn btn-outline-warning btn-block">Message</button>
                          <button class="btn btn-outline-primary btn-block btn-lg ">Request guide</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"> <i class="fa fa-google mr-3" aria-hidden="true"></i>Website</h6>
                        <span class="text-secondary">{{$tourguide->user->portfolio}}</span>
                      </li> 
                      <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><i class="fa fa-facebook mr-3" aria-hidden="true"></i>Facebook</h6>
                        <a href="https://www.facebook.com/{{$tourguide->user->fb_link}}"><span class="text-secondary">{{$tourguide->user->fb_link}}</span></a>
                      </li>
                    </ul>
                  </div>

                </div>

                <div class="col-md-8">
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          {{$tourguide->user->firstName}}      {{$tourguide->user->lastName}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Locations & places</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          {{$tourguide->cities}}
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Price rate</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          <strong>${{$tourguide->priceRate}}</strong>/hour
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                          <h6 class="mb-0">Languages</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <p>{{$tourguide->languages}}</p>
                        </div>
                      </div>

                 
                    </div>
                  </div>
    
                  <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                            <h2 class="d-flex justify-content-center mb-3">About me</h2>
                            <div> {{$tourguide->bio}}</div>
    
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h2 class="d-flex justify-content-center mb-3">Activities </h2>
                          <div> 
                            <ul>
                              @foreach(explode(",",$tourguide->activities) as $activity)
                              <li>{{$activity}}</li>
                              @endforeach
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>



                  </div>
    
    
    
                </div>
              </div> 
              <hr>
              {{-- review cards --}}
              <div class="container m-2">
                @if ($errors->any())
                <div class="m-2 alert alert-success">
                  <strong> {{$errors->first()}}</strong>
                </div>
                @endif
                <h2>Some Reviews</h2>
                <div class="row col-md-12">
                  @if (!empty($tourguide->reviews) )
                      @foreach ($tourguide->reviews as $review)
                      <div class="card col-md-4 mx-1" style="width: 20rem;">
                        <div class="card-body">
                          <h5 class="card-title"></h5>
                          <div class="text-center m-2">
                            <p>{{$review->reviewername->firstName}}</p>
                            <small>{{date('d-m-Y', strtotime($review->created_at))}}</small>
                           </div>
                           <hr>
                          <q class="card-text">{{$review->review}}</q>
                        </div>
                      </div>
                      @endforeach
                  @endif

                
                
              </div>
              <br>

                <div class="card col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">Add new review</h5>
                    <form action="{{route('addReviews')}}" role="form" method="POST">
                      @csrf
                      <div class="form-group">
                        <input type="hidden" name="tourguide" value="{{Crypt::encryptString($tourguide->id)}}">
                        <textarea class="form-control" id="review"  name="review" rows="3"></textarea>
                      </div>  
                      <button type="submit" id="submitForm"  class="btn btn-info sign-up-button mx-2">Add</button>
                    </form>
                  </div>
                </div>
    
            </div>
        </div>

        {{-- <script>
          function addReview() {

            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
            jQuery.ajax({
                url: "/addReview",
                method: 'GET',
                data: {
                    "_token": "{{ csrf_token() }}",
                    trans,
                },
                error: function(error)
                {
                    console.log(error.responseJSON);
                },
                success:function(data){
                    
                }
            });
}
        </script> --}}
@endsection