<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function loginView(){
        return view('auth.login');
    }

    public function SignupView(){
        return view('auth.signup');
    }


    //login function
    public function login(Request $request){
        $data =$request->all();
        // dd($data);
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
//signup  functions
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
    
    //logout function
    public function logout(){
      Auth::logout();
      return redirect()->to('/');
    }


  public function users(){
    $users= User::all();
    $roles= Role::all();
    return view('admin.role.user',['users'=>$users, 'roles'=>$roles]);
  }

  public function roleAssign(Request $request,  $id){
    // dd($request->all());
$user=User::find($id);

$user->syncRoles($request->role);
return redirect()->back()->with('succcess', 'role assigned successfully');
  }

}
