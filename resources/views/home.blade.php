@extends('layout.header')
@section('template_title')
    Egyptus
@endsection
@section('content')
@include('layout.navbar')
<div class="container m-2">
  @if ($errors->any())
  <div class="m-2 alert alert-danger">
     <strong> {{$errors->first()}}</strong>
  </div>
@endif
    <div class="jumbotron" style="background-color: rgb(227, 230, 231)">
        <h3 class="p-">Eyptus</h3>
        <p class="lead">This is a Platform for booking with the best tourguides</p>
        <hr class="my-4">
        <h3>Featured Tourguides</h3>
        <!-- foreach tourguides  -->
        <div class="row">
        @foreach ($users as $user)
        <div class="col-md-4">
        <div class="card m-2" style="width: 15rem;">
          <img class="card-img-top" width="60" height="150" src="{{asset('storage/' . $user->profileImg  )}}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{$user->firstName . " " . $user->lastName}}</h5>
            <p class="card-text">
              <h4>Activities: {{$user->hasType->activities}}</h4> 
              <h4> <strong>Cities:</strong> {{$user->hasType->cities}}</h4> 
            <a href="#" class="btn btn-primary">Book With Me</a>
          </div>
        </div>
      </div>
        @endforeach
        </div>
        <!-- end foreach tourguides  -->
    </div>
</div>
@endsection
