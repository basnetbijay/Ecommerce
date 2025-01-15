<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function ForgetView(){
        return view('auth.forget-password');
    }

    //sending the email for reset password 
public function ForgetPost(Request $request){
    $request->validate([
        'email'=>'required|email'
    ]);
    //Password will automatically check if the user exists or not
    $status = Password::sendResetLink(
        $request->only('email')
    );
    return $status === Password::ResetLinkSent
    ? back()->with(['status' => __($status)])
    : back()->withErrors(['email' => __($status)]);
}

//final submission of new password  
public function passwordReset(String $token){
    return view('auth.reset-password',['token'=>$token]);
}

public function passwordResetPost(Request $request){
    $request->validate([
        'email'=>'required',
        'token'=>'required',
        'password'=>'required|confirmed|min:8',
        'password_confirmation'=>'required'
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
            $user->save();
 //send the email to user  to know if the user has updated the password
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PasswordReset
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
}
    
}
