@extends('layouts.master1')

@section('title', 'Register')

@section('content')

<div class="register-container">
    <div class="register-main">
        <div class="register-logo">
            <img src="{{asset('img\logo.png')}}" alt="">
        </div>
        <div class="register-content box">

            <h1>Register</h1>
            <div>
                <form action="{{url('register-user')}}" method="post">
                    @csrf
                    <div class="register-group">
                        <label for="name">Full Name</label>
                        <div class="register-input">
                            <input type="text" placeholder="Enter full name" name="fullname"
                                value="{{old('fullname')}}">
                            <span style="color: red;"> @error('fullname') {{$message}} @enderror</span>
                        </div>
                    </div>


                    <div class="register-group">
                        <label for="username">Username</label>
                        <div class="register-input">

                            <input type="text" placeholder="Enter username" name="username" value="{{old('username')}}">

                            <div><span style="color: red;"> @error('username') {{$message}} @enderror</span></div>
                        </div>
                    </div>

                    <div class="register-group">
                        <label for="password">Password</label>
                        <div class="register-input">
                            <input type="password" placeholder="Enter password" name="password">

                            <div><span style="color: red;"> @error('password') {{$message}} @enderror</span></div>
                        </div>
                    </div>

                    <div class="register-group">
                        <Label for="gender"> Gender </Label>
                        <select name="gender" id="">
                            <option value="Male">Male</option>
                            <option value="Female">Femail</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="message-log">
                        @if (Session::has('success'))
                        <div>{{Session::get('success')}}</div>
                        @endif
                        @if (Session::has('fail'))
                        <div>{{Session::get('fail')}}</div>
                        @endif
                    </div>
                    <div class="btn">
                        <button type="submit" id="login-btn" class="register-btn"> Register </button>
                    </div>
            </div>

            </form>
            <div class="or">
                <hr />
                <span>OR</span>
                <hr />
            </div>

            <div class="goto-login">
                <p>Already have account ? <a href=" {{url('login')}}"> Login </a></p>
            </div>
        </div>
    </div>

</div>


</div>

@endsection