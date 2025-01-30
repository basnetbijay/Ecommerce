<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    //to redirect to google only and display the google id
    public function  googleLogin(){
     return Socialite::driver('google')->redirect() ;

    }
    //this function tells the user about the authenticated user or not
    public function googleAuth(){
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('google_id', $googleUser->id)->first();
     if($user){
        Auth::login($user);
        return redirect()->to('/dashboard');
     }
     else{
     $data= User::create([
        'name'=>$googleUser->name,
        'email'=>$googleUser->email,
        'password'=>$googleUser->password ,
        'google_id'=>$googleUser->id
      ]);
      if($data){
        Auth::login($data);
        return redirect()->to('/dashboard');
      }

     }
    }
}
