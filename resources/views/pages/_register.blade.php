@extends('layouts.master1')

@section('title', 'Register')

@section('content')

<div class="register-container">
    <div>
        <div class="logo">
            <img src="img\logo.png" alt="">
        </div>
        <h1>Register</h1>
        <div>
            <form action="{{url('register-user')}}" method="post">

                @csrf
                <label for="name">Full Name</label>
                <input type="text" placeholder="Enter full name" name="fullname" value="{{old('fullname')}}">
                <span style="color: red;"> @error('fullname') {{$message}} @enderror</span>
                <br>
                <label for="username">Username</label>
                <input type="text" placeholder="Enter username" name="username" value="{{old('username')}}">
                <span style="color: red;"> @error('username') {{$message}} @enderror</span>
                <br>
                <label for="password">Password</label>
                <input type="password" placeholder="Enter password" name="password">
                <span style="color: red;"> @error('password') {{$message}} @enderror</span>
                <br>
                <Label for="gender"> Gender </Label>
                <select name="gender" id="">
                    <option value="Male">Male</option>
                    <option value="Female">Femail</option>
                    <option value="Other">Other</option>
                </select>
                <br>
                <button type="submit"> Register </button>
            </form>
        </div>
    </div>
    <div class="message-log">
        @if (Session::has('success'))
        <div>{{Session::get('success')}}</div>
        @endif
        @if (Session::has('fail'))
        <div>{{Session::get('fail')}}</div>
        @endif
    </div>
    <div>
        <p>Already have account ? <a href="{{url('login')}}"> Login </a></p>
    </div>
</div>

@endsection