@extends('layouts.master1')

@section('title', 'Login')

@section('content')

<div class="Login-container">
    <div class="logo">
        <img src="img\logo.png" alt="">
    </div>
    <h1>Login</h1>
    <div>
        <form action="{{route('login-user')}}" method="post">
            @csrf
            <label for="username">Username</label>
            <input type="text" placeholder="Enter username" name="username" value="{{old('username')}}">
            <span style="color: red">
                @error('username') {{$message}}@enderror
            </span>
            <br>
            <label for="password">Password</label>
            <input type="password" placeholder="Enter password" name="password">
            <span style="color: red">
                @error('password') {{$message}}@enderror
            </span>
            <br>
            <button type="submit"> Login </button>
        </form>
    </div>
    <div>
        @if (Session()->has('fail'))
        <div>{{Session()->get('fail')}}</div>
        @endif
    </div>
    <div>
        <p> Join Kilogram Now !!! <a href="{{url('register')}}"> Register </a></p>
    </div>
</div>
@endsection