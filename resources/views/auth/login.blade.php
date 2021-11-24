
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/titlelogo.png" type="image/icon type">
    <title>Egyptus</title>

     <!-- Css Files -->
     <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
     <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/front.css')}}">
     <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
 
 
     <!-- Google Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;700;900&display=swap" rel="stylesheet">
 


</head>

<body>

    <div class="tourguideregpage">
        <h1 class="backhome"> <a href="index.html"><i class="fa fa-chevron-left" aria-hidden="true"></i> Go Back Home</a></h1>>


        <div class="container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group">
                    <div class="row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                        <div class="" id="password">
                            <input type="password" class="col-md-6 form-control @error('password') 
                            is-invalid @enderror" name="password" required autocomplete="current-password"
                            id="pass_log_id" />
                            <span style="padding-top: 12px" id="password" toggle="#password-field" class=" fa fa-fw fa-eye field_icon toggle-password p-3"></span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4" style="padding-bottom: 10px">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                <script>
                    $("#password").on('click', '.toggle-password', function() {
                    $(this).toggleClass("fa-eye fa-eye-slash");
                    var input = $("#pass_log_id");
                    if (input.attr("type") === "password") {
                        input.attr("type", "text");
                    } else {
                        input.attr("type", "password");
                    }

                });
                    </script> 
            </form>
        </div>


    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>
                        