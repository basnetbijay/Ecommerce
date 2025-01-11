<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//grouping the route
Route::prefix('dashboard')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::prefix('roles')->name('role.')->group(function(){
Route::get('/', [RoleController::class, 'Roles'])->name('roles');
Route::post('/',[RoleController::class, 'addRoles'])->name('addRole');

    });
    Route::prefix('users')->name('user.')->group(function(){
        Route::get('/',[UserController::class ,'users'])->name('users');
        Route::post('/',[UserController::class, 'roleAssign'])->name('roleAssign');
    });
});
Route::get('/', function(){
    return view('user.Home');
})->name('userHome');

Route::get('/login',[UserController::class, 'loginView'])->name('login');
Route::get('/signup',[UserController::class, 'SignupView'])->name('signupForm');
Route::post('/login',[UserController::class , 'login'])->name('loggedIn');
Route::post('/signup', [UserController::class, 'Signup'])->name('signuped');
Route::get('/logout',[UserController::class , 'logout'])->name('logout');