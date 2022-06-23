@extends ('layouts.master')
@section('title', $info->username)
<link rel="stylesheet" href="{{asset('css/otherprf.css')}}">
@section('content')

<div id="profile">
    <div class="user-container">
        <img src="{{asset('image/avt/'.$info->avatar)}}" class="user-avatar" alt="">
        <div class="user-info-container">
            <div class="user-name-field">
                <h1 class="user-name"> {{$info->username}}</h1>
                <button class={{$status}} id={{$info->id}}>{{$text}}</button>
            </div>
            <div class=" full-name"> {{$info->fullname}}</div>
            <div class="folow-detail">
                <a class="post-num"> {{$info->postCount}} posts </a>
                <a class="folower-num"> {{$info->follower}} followers</a>
                <a class="folowing-num"> {{$info->following}} following</a>
            </div>
            <p class="user-describe">{{$info->describe}}</p>
        </div>
    </div>
</div>

@if ($posts->isEmpty())
<div class="No-Post"> No post yet</div>
@else
<div id="post-container">
    @foreach($posts as $post)
    <div class="user-post" id={{$post->postid}}>
        <img src={{asset('image/post/' . $post->imgdir) }} class="post-img" alt="">
        <div class="likes">
            <a><i class="fa-solid fa-heart heart-icon"></i></a>
            <p class="like-count">{{$post->likecount}}</p>
        </div>
    </div>
    @endforeach
</div>
@endif


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
                <p class="content-post-name">vanhau</p>

            </div>
            <div class="content-post-main">
                <div class="content-post-cmt">
                    <div class="content-post-pic-cmt">
                        <img src="" />
                    </div>
                    <div class="cmt-box-main">
                        <div class="top-cmt">
                            <p class="user-cmt">username</p>
                            <p class="sub-cmt-time">1 hour ago</p>
                            <p class="cmt-sub">Lorem, ipsum </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-bot">
                <p class="like-post">2 likes</p>
                <p class="time-post">2021/12/08</p>
            </div>

            <div class="modal-caption"> Lorem ipsum dolor </div>
            <div class="cmt">
                <img class="user-post-avt1" class="img-cmt" src="{{asset('image/avt/'.$avatar)}}" />
                <input type="text" class="cmt-box" placeholder="Add a comment" />
                <button class="cmt-btn">post</button>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/otherPr.js')}}"></script>
<script src="{{asset('js/comment.js')}}"></script>
@endsection