<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome mail</title>
</head>
<body>
    <h1>welcome</h1>
    <p>Thank you for registering with us. Please click the link below to login.</p>
    {{ $user->otp }}
    <a href="{{ route('login') }}">click here to login</a>
</body>
</html>