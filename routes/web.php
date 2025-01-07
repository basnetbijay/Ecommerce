<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login',[UserController::class, 'loginView'])->name('login');
Route::get('/signup',[UserController::class, 'SignupView'])->name('signupForm');
Route::post('/login',[UserController::class , 'login'])->name('loggedIn');
Route::post('/signup', [UserController::class, 'Signup'])->name('signuped');
Route::get('/logout',[UserController::class , 'logout'])->name('logout');