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
                <a class="post-num"> 1 post </a>
                <a class="folower-num"> 1 follower</a>
                <a class="folowing-num"> 1 following</a>
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
    <div class="post" id={{$post->postid}}>
        <img src={{asset('image/post/' . $post->imgdir) }} class="post-img" alt="">
        <div class="likes">
            <a><i class="fa-solid fa-heart heart-icon"></i></a>
            <p class="like-count">{{$post->likecount}}</p>
        </div>
    </div>
    @endforeach
</div>
@endif
<script src="{{asset('js/otherPr.js')}}"></script>
@endsection