<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    //adding the roles in the database and displaying the roles in the view
    public function Roles(){
        $role= Role::all();
        $permisson = Permission::all();
        return view('admin.role.roles',['roles'=>$role , 'permission'=>$permisson]);
    }

    //adding the roles
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
    public function assignPermission(Request $request , $roleId){
      $value = $request->all();
     
      $role = Role::find($roleId);
      $role->syncPermissions($value['perm']);
      return redirect()->back()->with('message', 'permission has been assigned to roles');

    }
}
