<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Verify Mail</title>
</head>
<body>
<section class="Container">
    <h1>Welcome {{$user['firstName']}} To Egptus</h1>
    <p>Please Help Us And Verify Your Account</p>
    <a href="http://127.0.0.1:3000/verify/{{$user['id']}}" class="btn-info">Verify</a>
    <p>Thanks,Egyptus</p>
</section>
</body>
</html>
