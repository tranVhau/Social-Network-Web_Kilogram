@extends('layouts.master1')

@section('title', 'Login')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@section('content')

<div class="Login-container">
    <div class="login-main">
        <div class="logo-login">
            <img src="{{asset('img\logo.png')}}" alt="">
        </div>
        <div class="login-content box">
            <p class="login-text">Login</p>
            <form action="{{route('login-user')}}" method="post" class="login-form">
                @csrf
                <div class="form-group">
                    <div class="login-input">
                        <input type="text" placeholder="Enter username" name="username" value="{{old('username')}}">
                        <span style="color: red">
                            @error('username') {{$message}}@enderror
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="login-input">
                        <input type="password" placeholder="Enter password" name="password">
                        <span style="color: red">@error('password') {{$message}}@enderror</span>
                    </div>
                </div>

                <div class="btn">
                    <button id="login-btn" class="login-btn" type="submit"> Login </button>
                </div>

                <div>
                    @if (Session()->has('fail'))
                    <div>{{Session()->get('fail')}}</div>
                    @endif
                </div>

                {{-- <button type="submit"> Login </button> --}}
            </form>
            <div class="or">
                <hr />
                <span>OR</span>
                <hr />

            </div>
            <div class="goto-register">
                <p> Join Kilogram Now !!! <a href="{{url('register')}}"> Register </a></p>
            </div>
        </div>
    </div>
</div>
@endsection