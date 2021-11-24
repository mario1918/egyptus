<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield("title")Egyptus</title>
    <link rel="icon" href="{{asset('images/titlelogo.png')}}" type="image/icon type">

    <!-- Css Files -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;700;900&display=swap" rel="stylesheet">



</head>

<body>
<!-- Navbar -->
{{-- @include('layout.navbar') --}}

<!-- End Navbar -->

<main class="">
          @yield('content')
      
</main>
{{-- @include('layout.footer') --}}
</body>
</html>
