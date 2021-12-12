<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->
  {!! Html::style('admin/plugins/@mdi/font/css/materialdesignicons.min.css') !!}
  {!! Html::style('admin/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  {!! Html::style('admin/plugins/app.css') !!}
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/admin/dashboaord')}}">

  <div class="container-scroller" id="app">
    @include('admin.header')
    <div class="container-fluid page-body-wrapper">
      @include('admin.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @include('admin.footer')
      </div>
    </div>
  </div>

  <!-- base js -->
  {!! Html::script('js/app.js') !!}
  {!! Html::script('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js') !!}
  <!-- end base js -->

  <!-- plugin js -->
  @stack('plugin-scripts')
  <!-- end plugin js -->

  <!-- common js -->
  {!! Html::script('admin/js/off-canvas.js') !!}
  {!! Html::script('admin/js/hoverable-collapse.js') !!}
  {!! Html::script('admin/js/misc.js') !!}
  {!! Html::script('admin/js/settings.js') !!}
  {!! Html::script('admin/js/todolist.js') !!}
  <!-- end common js -->

  @stack('custom-scripts')
</body>
</html>