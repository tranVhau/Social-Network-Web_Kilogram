@extends ('layouts.master')
@section('title', 'Your Profile')
<link rel="stylesheet" href="css/profile.css">
@section('content')

<div id="profile">
    <div class="user-container">
        <img src={{asset('image/avt/' . $avatar)}} class="user-avatar" alt="">
        <div class="user-info-container">
            <div class="user-name-field">
                <h1 class="user-name"> {{$data->username}}</h1>
                <a class="modify"><i class="fa-regular fa-pen-to-square"></i></a>

            </div>
            <div class=" full-name"> {{$data->fullname}}</div>
            <div class="folow-detail">
                <a class="post-num"> 1 post </a>
                <a class="folower-num"> 1 folower</a>
                <a class="folowing-num"> 1 folowing</a>
            </div>
            <p class="user-describe">{{$data->describe}}</p>
        </div>
    </div>

</div>



@if ($loadIMG->isEmpty())
<div class="No-Post"> No posts yet :(</div>
@else
<div id="post-container">
    @foreach($loadIMG as $img)
    <div class="post" id={{$img->postid}}>
        <img src={{ asset('image/post/' . $img->imgdir) }} class="post-img" alt="">
        <div class="likes">
            <a><i class="fa-solid fa-heart heart-icon"></i></a>
            <p class="like-count">{{$img->likecount}} likes</p>
        </div>
    </div>
    @endforeach
</div>
@endif



<div class="modify-modal">
    <div class="modal-mdf-close">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <div class="modal-mdf-container">
        <div class="modal-mdf-header">
            <p>Edit profile</p>
        </div>
        <form method="post" id="mdf_form" enctype="multipart/form-data">
            @csrf
            <input id="post_img" type="file" name="avt_img" accept="image/*" class="post-img">
            <input type="text" name="fullname_mdf" class="fullname-mdf" placeholder="edit fullname"> <br>
            <input type="text" name="username_mdf" class="username-mdf" placeholder="edit username"><br>
            <textarea name="desciption" id="describtion" cols="30" rows="8" placeholder="description..."></textarea><br>
            <button id="edit_btn" type="submit">Post<i class="fa-solid fa-check"></i></button>
        </form>
    </div>
</div>
@endsection