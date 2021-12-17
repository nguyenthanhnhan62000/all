<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }
    public function create(){
        $roles = Role::all();
        return view('admin.user.create',compact('roles'));
    }
    public function store(Request $req){

        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);    
        $roleIds = $req->roleIds;
        $user->roles()->attach($roleIds);
        return redirect()->route('user.index');

    }
    public function edit($id){
        $user = User::find($id);
        $roles = Role::all();
        $roleOfUser = $user->roles;
        return view('admin.user.edit', compact('roles','user','roleOfUser'));
    }
    public function update($id,Request $req){
        
        $user = User::find($id);
        $user->update([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);    
        $user->roles()->sync($req->roleIds);
        return redirect()->route('user.index');

    }
    public function delete(){
        dd('delete');
    }
}
