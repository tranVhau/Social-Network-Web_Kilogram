<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="icon" type="image/png" href="{{ asset('img/kilogram_favicon.png') }}">
</head>

<body>
    @yield('content')
</body>


</html>