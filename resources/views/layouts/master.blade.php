<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/master.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/645f4b641d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="js/event.js"></script>
</head>

<body>
    <div class="wrapper">
        <div id="navbar">
            <div class="nav-wrapper">
                <a href="#" class="logo-box"><img src="img/logo.png" alt=""></a>
                <input type="text" class="search-box" placeholder="Search">

                <div class="nav-item">
                    <div class="item"><a href="{{route('home')}}"><i class="fa-solid fa-house"></i></a></div>
                    <div class="item"><a href="#2"><i class="fa-regular fa-square-plus"></i></a> </div>
                    <div class="item"><a href="{{route('inbox')}}"><i class="fa-regular fa-message"></i></a></div>
                    <div class="item">
                        <p id="drop-down-menu"><i class="fa-regular fa-user"></i></p>
                        <div class="drop-field">
                            <a href="{{route('profile')}}"><i class="fa-regular fa-user"></i> Your profile </a>
                            <a href="{{route('logout')}}"><i class="fa-solid fa-arrow-right-from-bracket"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @yield('content')


    </div>

</body>

</html>