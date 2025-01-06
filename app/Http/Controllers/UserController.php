<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function loginView(){
        return view('auth.login');
    }

    public function SignupView(){
        return view('auth.signup');
    }

    public function login(Request $request){
        $data =$request->all();

    }
    public function Signup(Request $request){
      $data = $request->all();
      $rules =[
        'name'=>'required',
        'email'=> 'required|unique:users|max:255|email:rfc,dns',
        'password'=>'required|same:Confirmpassword',
      ];
      $message=[
    'required '=> 'the :attribute field is required',
    'same'=>'Password dont match'
      ];
      $request->validate($rules , $message);
      User::create($data);
      return redirect()->route('login')->with('message', 'successfully signed up');
    }
}
