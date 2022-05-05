@extends ('layouts.master')
@section('title', 'Your Profile')
{{--
<link rel="stylesheet" href="asset/css/profile.css"> --}}

<link rel="stylesheet" href="{{asset('css/profile.css')}}">

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
                <a class="folower-num"> 1 follower</a>
                <a class="folowing-num"> 1 following</a>
            </div>
            <p class="user-describe">{{$data->describe}}</p>
        </div>
    </div>
</div>


@if ($loadIMG->isEmpty())
<div class="No-Post"> No post yet :(</div>
@else
<div id="post-container">
    @foreach($loadIMG as $img)
    <div class="post" id={{$img->postid}}>
        <img src={{asset('image/post/' . $img->imgdir) }} class="post-img" alt="">
        <div class="likes">
            <a><i class="fa-solid fa-heart heart-icon"></i></a>
            <p class="like-count">{{$img->likecount}}</p>
        </div>
    </div>
    @endforeach
</div>
@endif


{{-- modify modal --}}
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

            <div class="img-content">
                <div class="img-container">
                    {{-- <i class="fa-solid fa-user"></i> --}}
                    <img src="{{asset('image/avt/'.$avatar)}}">
                </div>
                <label for="chose-img" class="setting-icon">
                    <i class="fa-solid fa-camera"></i>
                </label>
                {{-- <input id="post_img" type="file" name="avt_img" accept="image/*" class="post-img" hidden> --}}
                <input id="chose-img" type="file" name="avt_img" class="save-img" accept="image/*" class="post-img"
                    hidden>
            </div>


            <div class="modify-input">
                <label for="fullname_mdf">Fullname </label>
                <div class="edit-input">
                    <input type="text" name="fullname_mdf" class="fullname-mdf" placeholder="Edit fullname">
                </div>
            </div>

            <div class="modify-input">
                <label for="username">Username</label>
                <div class="edit-input">
                    <input type="text" name="username_mdf" class="username-mdf" placeholder="Edit username">
                </div>
            </div>

            <div class="descripton">
                <textarea name="desciption" id="describtion" cols="30" rows="8" placeholder="description..."></textarea>
            </div>
            <div class="btn">
                <button id="edit_btn" type="submit" class="save-btn">Save</button>
            </div>
        </form>
    </div>
</div>

{{-- post-Modal --}}

<div class="post-modal">
    <div class="modal-post-close">
        <i class="fas fa-times"></i>
    </div>
    <div class="modal-post-container">
        <div class="img-post-left">
            <img class="post-photo" src="{{asset('image/avt/avatar.jpeg')}}" alt="">
        </div>
        <div class="content-post-right">
            <div class="content-post-top">
                <div class="content-post-pic">
                    <img class="user-post-avt" src="" />
                </div>
                <p class="content-post-name">Oh.Neo</p>
            </div>
            <div class="content-post-main">
                <div class="content-post-cmt">
                    <div class="content-post-pic-cmt">
                        <img src="https://pdp.edu.vn/wp-content/uploads/2021/01/hinh-anh-cute-de-thuong.jpg" />
                    </div>
                    <div class="cmt-box-main">
                        <div class="top-cmt">
                            <p class="user-cmt">username</p>
                            <p class="sub-cmt-time">1 hour ago</p>
                            <p class="cmt-sub">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique
                                accusamus, voluptatum tempora quidem fugit ab nisi possimus quam nulla suscipit
                                architecto praesentium exercitationem provident iusto! Architecto, eligendi ex? Et,
                                sint? </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-bot">
                <p class="like-post">2,154 likes</p>
                <p class="time-post">2021/12/08</p>
            </div>

            <div class="modal-caption"> Lorem ipsum dolor sit amet consectetur ..</div>
            <div class="cmt">
                <img class="user-post-avt1" class="img-cmt" src="{{asset('image/avt/'.$avatar)}}" />
                <input type="text" class="cmt-box" placeholder="Add a comment" />
                <button class="cmt-btn">post</button>
            </div>
        </div>
    </div>
</div>
@endsection