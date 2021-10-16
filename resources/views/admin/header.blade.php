<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("img/apple-icon.png")}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield("title")
    </title>
    @section("title")Admin Dashboard @endsection
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet" />
    <link href="{{asset("css/style.bundle.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("css/plugins.bundle.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("css/prismjs.bundle.css")}}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />



    <!-- CSS Just for demo purpose, don't include it in your project -->
</head>
<style>

</style>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled sidebar-enabled" data-header-scroll="on"
      data-scrolltop="on" style="margin-right: 10px;margin-left: 10px;">
<div class="wrapper m-2">
    {{-- @include("admin.sidebar") --}}
    <div class="container cont col-lg-11">

            <!--end::Toolbar-->

        @yield('content')
    </div>
    {{-- @include("admin.footer") --}}
</div>

