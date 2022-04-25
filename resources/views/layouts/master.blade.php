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
                <a href="{{route('home')}}" class="logo-box"><img src="img/logo.png" alt=""></a>
                <input type="text" class="search-box" placeholder="Search">

                <div class="nav-item">
                    <div class="item"><a href="{{route('home')}}"><i class="fa-solid fa-house"></i></a></div>
                    <div class="item js-buy-ticket"><a><i class="fa-regular fa-square-plus"></i></a> </div>
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

        <!--popup-->
        <div class="modal js-modal">
            <div class="modal-close js-modal-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <div class="modal-container js-modal-container">
                <div class="modal-header">
                    <p>Create new post</p>
                </div>
                <form method="post" id="upload_form" enctype="multipart/form-data">
                    @csrf
                    <div class=" left-modal">
                        <label for="">Select image from computer</label>
                        <input id="post_img" accept="image/*" type="file" name="file" class="post-img">
                    </div>
                    <div class=" right-modal">
                        <div class="media-modal">
                            <div class="media-modal-left">
                                <img src={{asset('image/avt/' . $avatar)}} alt="" class="media-object">
                            </div>
                            <div class="media-modal-body">
                                <p class="name">{{$data->fullname}}</p>
                                <p class="email">{{$data->username}}</p>
                            </div>
                        </div>
                        <textarea name="caption" id="caption" cols="30" rows="10"
                            placeholder="Write a caption..."></textarea>

                        <button id="post_btn" type="submit">Post<i class="fa-regular fa-paper-plane"></i></button>
                    </div>
                    <span class="text-danger" id="image-input-error"></span>
                </form>
            </div>
        </div>
    </div>
    <div>
        <script src="./js/popup.js"></script>
    </div>
</body>

</html>