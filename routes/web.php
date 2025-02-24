<?php

use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
//  ->middleware('can:manage roles')
//   ->middleware('can:manage users')
//  ->middleware('can:open dashboard')

//grouping the route
Route::prefix('dashboard')->group(function(){
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    // creating the route for adding editing and deleting the products
    Route::get('/add-product', [ProductController::class, 'showForm'])->name('productForm');
    Route::get('/productListing', [ProductController::class, 'productList'])->name('productForm.test');
    Route::post('/add-product', [ProductController::class, 'addProduct'])->name('addProduct');

Route::prefix('roles')->name('role.')->group(function(){
Route::get('/', [RoleController::class, 'Roles'])->name('roles');
Route::post('/',[RoleController::class, 'addRoles'])->name('addRole');
Route::post('/assignPermission/{id}',[RoleController::class, 'assignPermission'])->name('assignPermission');

});

    Route::prefix('users')->name('user.')->group(function(){
        Route::get('/',[UserController::class ,'users'])->name('users');
        Route::post('/{id}',[UserController::class, 'roleAssign'])->name('roleAssign');
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

//for resetting the users password using forget password methods.
Route::controller(ForgetPasswordController::class)->group(function(){
Route::get('/forget-password','ForgetView')->name('password.request');
Route::post('/forget-password','ForgetPost')->name('password.email');
Route::get('/reset-password/{token}','passwordReset')->name('password.reset');
Route::post('/reset-password','passwordResetPost')->name('password.reset.post');
});
//google login  ko lagi route hai
Route::get("auth/google" , [SocialiteController::class, 'googleLogin'])->name('auth.google');
Route::get("auth/callback" , [SocialiteController::class, 'googleAuth']);
//ends here
