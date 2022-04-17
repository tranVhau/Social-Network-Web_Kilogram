@extends ('layouts.master')
@section('title', 'Your Profile')
<link rel="stylesheet" href="css/master.css">
@section('content')

<div id="profile">
    <div class="user-container">
        <img src="img/avatar.jpeg" class="user-avatar" alt="">
        <div class="user-info-container">
            <div class="user-name-field">
                <h1 class="user-name"> Tran Hau</h1>
                <a class="modify" href="#"><i class="fa-regular fa-pen-to-square"></i></a>
            </div>
            <div class="folow-detail">
                <a href="#" class="post-num"> 1 post </a>
                <a href="#" class="folower-num"> 1 folower</a>
                <a href="#" class="folowing-num"> 1 folowing</a>
            </div>
            <p class="user-describe">hello world</p>
        </div>
    </div>
</div>


<div id="post-container">
    <div class="post">
        <img src="img/avatar.jpeg" class="post-img" alt="">
        <div class="likes">
            <a href="#"><i class="fa-solid fa-heart heart-icon"></i></a>
            <p class="like-count">100 likes</p>
        </div>
    </div>

    <div class="post">
        <img src="img/avatar.jpeg" class="post-img" alt="">
        <div class="likes">
            <a href="#"><i class="fa-solid fa-heart heart-icon"></i></a>
            <p class="like-count">100 likes</p>
        </div>
    </div>

    <div class="post">
        <img src="img/avatar.jpeg" class="post-img" alt="">
        <div class="likes">
            <a href="#"><i class="fa-solid fa-heart heart-icon"></i></a>
            <p class="like-count">100 likes</p>
        </div>
    </div>

    <div class="post">
        <img src="img/avatar.jpeg" class="post-img" alt="">
        <div class="likes">
            <a href="#"><i class="fa-solid fa-heart heart-icon"></i></a>
            <p class="like-count">100 likes</p>
        </div>
    </div>

    <div class="post">
        <img src="img/avatar.jpeg" class="post-img" alt="">
        <div class="likes">
            <a href="#"><i class="fa-solid fa-heart heart-icon"></i></a>
            <p class="like-count">100 likes</p>
        </div>
    </div>

    <div class="post">
        <img src="img/avatar.jpeg" class="post-img" alt="">
        <div class="likes">
            <a href="#"><i class="fa-solid fa-heart heart-icon"></i></a>
            <p class="like-count">100 likes</p>
        </div>
    </div>

    <div class="post">
        <img src="img/avatar.jpeg" class="post-img" alt="">
        <div class="likes">
            <a href="#"><i class="fa-solid fa-heart heart-icon"></i></a>
            <p class="like-count">100 likes</p>
        </div>
    </div>

    <div class="post">
        <img src="img/avatar.jpeg" class="post-img" alt="">
        <div class="likes">
            <a href="#"><i class="fa-solid fa-heart heart-icon"></i></a>
            <p class="like-count">100 likes</p>
        </div>
    </div>
</div>
</div>

@endsection