<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Support\Facades\Auth;
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
        $rules =[
         
          'email'=> 'required|max:255|email:rfc,dns',
          'password'=>'required',
        ];
        $message=[
          'required '=> 'the :attribute field is required',
            ];
          
 $creds = $request->validate($rules ,$message);
        if(Auth::attempt($creds)){
          return redirect()->to('/')->with('message', 'logged in');
        }
        return redirect()->back()->with('error', 'doesnot match with credentials');
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
    public function logout(){
      Auth::logout();
      return redirect()->to('/');
    }
}
