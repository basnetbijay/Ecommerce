<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;


class SocialiteController extends Controller
{
    //to redirect to google only and display the google id
    public function  googleLogin(){
      return Socialite::driver('google')->redirect();
    }

    //this function tells the user about the authenticated user or not
    public function googleAuth(Request $request){
      // dd('hello');
      // Log::info(print_r($request->all(),1));

      try{
        // dd("hello");
        $googleUser =Socialite::driver('google')->user();
       dd($googleUser);
       $user = User::where('google_id', $googleUser->id)->first();
       
       if($user){
         Auth::login($user);
         return redirect()->to('/dashboard');
        }
        else{
          $data= User::create([
            'name'=>$googleUser->name,
            'email'=>$googleUser->email,
            'password'=>Hash::make("password@1234") ,
            'google_id'=>$googleUser->id 
          ]);
          if($data){
            Auth::login($data);
            return redirect()->to('/dashboard');
          }
        }
        
      }

      catch(Exception $exc){
        dd($exc->getMessage());
      }
    }}
