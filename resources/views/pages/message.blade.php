@extends ('layouts.master')
@section('title', 'Inbox')
<link rel="stylesheet" href="css/message.css">
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="user-wrapper">
            <ul class=" users">
                <li class="contact">
                    <div>
                        Your contacts
                    </div>
                </li>
                @foreach($users as $user)
                <li class="user" id="{{$user->id}}">
                    <div class="media">
                        <div class="media-left">
                            <img src="https://via.placeholder.com/150" alt="" class="media-object">
                        </div>
                        <div class="media-body">
                            <p class="name">{{$user->fullname}}</p>
                            <p class="email">{{$user->username}}</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="" id="messages">
            <div class="intro">
                <i class="fa-regular fa-message intro-icon"></i>
                <p class="intro-title">Your Messages</p>
                <p class="intro-body">send private messages to your friend</p>
            </div>
        </div>
        <input type="hidden" value="{{ $myID }}" id="myIDVal">
    </div>
</div>

@endsection