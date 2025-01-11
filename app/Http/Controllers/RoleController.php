<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function Roles(){
        $role= Role::all();
        return view('admin.role..roles',['roles'=>$role]);
    }

    public function addRoles(Request $request){
       
$value = $request->all();
$rules =[
'name'=>'required|unique:roles'
];
$message=[
    'required'=>'the :attribute field is required',
     'unique'=>' the role already exist in the system'
];
$request->validate($rules, $message);
Role::create($value);
return redirect()->back()->with('message', 'New role has been added successfully added');
    }
}
