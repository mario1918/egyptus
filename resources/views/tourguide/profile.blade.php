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
                          <button class="btn btn-outline-warning">Message</button>
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
                          <h6 class="mb-0">Mobile</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                          +20 0101898962223
                        </div>
                      </div>

                 
                    </div>
                  </div>
    
                  <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                            <h2 class="d-flex justify-content-center mb-3">About</h2>
                            <div> {{$tourguide->bio}}</div>
    
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6 mb-3">
                      <div class="card h-100">
                        <div class="card-body">
                          <h2 class="d-flex justify-content-center mb-3">Explore with </h2>
                          <div> Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur tenetur cumque numquam recusandae quas 
                              officia esse maiores omnis reiciendis illum incidunt minus sapiente deleniti quibusdam ea, laudantium beatae eveniet molestiae?</div>
                        </div>
                      </div>
                    </div>



                  </div>
    
    
    
                </div>
              </div>
    
            </div>
        </div>
@endsection