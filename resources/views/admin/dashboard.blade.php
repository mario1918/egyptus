@extends('admin.master')

@push('plugin-styles')
  <!-- {!! Html::style('/admin/plugins/plugin.css') !!} -->
@endpush

@section('content')
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-cube text-danger icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Tourguides</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">{{$tourguides}}</h3>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-receipt text-warning icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Trips</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">0</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
    <div class="card card-statistics">
      <div class="card-body">
        <div class="d-flex flex-md-column flex-xl-row flex-wrap justify-content-between align-items-md-center justify-content-xl-between">
          <div class="float-left">
            <i class="mdi mdi-account-box-multiple text-info icon-lg"></i>
          </div>
          <div class="float-right">
            <p class="mb-0 text-right">Tourists</p>
            <div class="fluid-container">
              <h3 class="font-weight-medium text-right mb-0">0</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-md-6 col-xl-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Tourguides Requests</h4>
              {{-- <div class="shedule-list d-flex align-items-center justify-content-between mb-3">
                <h3>27 Sep 2018</h3>
                <small>21 Events</small>
              </div> --}}
              {{-- for each tourguide request that is inactive name of the tourguide and show --}}
              <div class="event py-3 border-bottom">
                <p class="mb-2 font-weight-medium">Data Analysing with team</p>
                <div class="d-flex align-items-center">
                  <div class="badge badge-warning">12.30 AM</div>
                  <small class="text-muted ml-2">San Francisco, CA</small>
                  <div class="ml-auto">
                      <a class="btn btn-success" href="">Show</a>
                     </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    {{-- <div class="col-md-6 col-xl-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Trips</h4>
          <div class="shedule-list d-flex align-items-center justify-content-between mb-3">
            <h3>27 Sep 2018</h3>
            <small>21 Trips</small>
          </div>
          <div class="event border-bottom py-3">
            <p class="mb-2 font-weight-medium">Skype call with alex</p>
            <div class="d-flex align-items-center">
              <div class="badge badge-success">3:45 AM</div>
              <small class="text-muted ml-2">London, UK</small>
              <div class="image-grouped ml-auto">
                <img src="{{ url('assets/images/faces/face10.jpg') }}" alt="profile image">
                <img src="{{ url('assets/images/faces/face13.jpg') }}" alt="profile image"> </div>
            </div>
          </div>
          <div class="event py-3 border-bottom">
            <p class="mb-2 font-weight-medium">Data Analysing with team</p>
            <div class="d-flex align-items-center">
              <div class="badge badge-warning">12.30 AM</div>
              <small class="text-muted ml-2">San Francisco, CA</small>
              <div class="image-grouped ml-auto">
                <img src="{{ url('assets/images/faces/face20.jpg') }}" alt="profile image">
                <img src="{{ url('assets/images/faces/face17.jpg') }}" alt="profile image">
                <img src="{{ url('assets/images/faces/face14.jpg') }}" alt="profile image"> </div>
            </div>
          </div>
          <div class="event py-3">
            <p class="mb-2 font-weight-medium">Meeting with client</p>
            <div class="d-flex align-items-center">
              <div class="badge badge-danger">4.15 AM</div>
              <small class="text-muted ml-2">San Diego, CA</small>
              <div class="image-grouped ml-auto">
                <img src="{{ url('assets/images/faces/face21.jpg') }}" alt="profile image">
                <img src="{{ url('assets/images/faces/face16.jpg') }}" alt="profile image"> </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    
</div>
<div class="row">
    <div class="col-lg-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tourguides</h4>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th> # </th>
                  <th> First name </th>
                  <th> Progress </th>
                  <th> Activities </th>
                  <th> Trips </th>
                  <th> Show </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="font-weight-medium"> 1 </td>
                  <td> Herman Beck </td>
                  <td>
                    <div class="progress">
                      <div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </td>
                  <td> $ 77.99 </td>
                  <td class="text-danger"> 53.64% <i class="mdi mdi-arrow-down"></i>
                  </td>
                  <td> May 15, 2015 </td>
                </tr>
               
           
               
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4">Reviews</h5>
        <div class="fluid-container">
          <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
            <div class="col-md-1">
              <img class="img-sm rounded-circle mb-4 mb-md-0 d-block mx-md-auto" src="{{ url('admin/images/faces/face1.jpg') }}" alt="profile image"> </div>
            <div class="ticket-details col-md-9">
              <div class="d-flex">
                <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">James :</p>
                <p class="mb-0 ellipsis">Donec rutrum congue leo eget malesuada.</p>
              </div>
              <p class="text-gray ellipsis mb-2">Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim vivamus. </p>
            
            </div>
          
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  {!! Html::script('/admin/plugins/chartjs/chart.min.js') !!}
  {!! Html::script('/admin/plugins/jquery-sparkline/jquery.sparkline.min.js') !!}
@endpush

@push('custom-scripts')
  {!! Html::script('/admin/js/dashboard.js') !!}
@endpush