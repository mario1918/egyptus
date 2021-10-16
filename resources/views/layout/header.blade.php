<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("template_title")</title>


<!-- Styles -->
    <link rel="icon"       href="{{asset("images/logo.png")}}">
    <link rel="stylesheet" href="{{asset("css/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/main.css")}}">
    <link rel="stylesheet" href="{{asset("css/profile.css")}}">
    <link rel="stylesheet" href="{{asset("css/Front_Page.css")}}">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>
<body>
<!-- Navbar -->
@include('layout.navbar')

<!-- End Navbar -->

<main class="">
          @yield('content')
      
</main>
<footer>
</footer>
@include('layout.footer')
</body>
</html>
