<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Symfony\Component\Mime\MessageConverter;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login',[LoginController::class,'login'])->name('login')->middleware('AlreadyLogedIn');
Route::get('/register',[LoginController::class,'registration'])->name('register')->middleware('AlreadyLogedIn');
Route::post('/register-user',[LoginController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[LoginController::class,'loginUser'])->name('login-user');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


Route::get('/home',[HomeController::class, 'home'])->name('home')->middleware('isLogedIn');
Route::get('/profile',[ProfileController::class, 'profile'])->name('profile')->middleware('isLogedIn');
Route::get('/inbox',[MessageController::class, 'message'])->name('inbox')->middleware('isLogedIn');


Route::get('/message/{id}',[MessageController::class,'getmessage'])->name('message');
Route::post('/message', [MessageController::class, 'sendmessage']);