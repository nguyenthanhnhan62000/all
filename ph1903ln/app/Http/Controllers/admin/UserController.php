<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\models\User;
use App\Http\Controllers\controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin/user/index',[
            'users' => $users
        ]);
    }

    public function add()
    {
        return view('admin/user/add');
    }

    public function post_add(Request $request)
    {   
        $this->validate($request,[
            'name' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'email' => 'required|email|unique:users,email'
        ],[
            'name.required' => 'không được để trống Name',
            'name.required' => 'không được để trống password',
            'email.required' => 'không được để trống email',
            'email.unique' => 'email đã có',
            'email.email' =>'phải là email',
            'confirm_password.required' => 'Nhập lại mật khẩu',
            'confirm_password.same' => 'Mật khẩu không trùng nhau'
        ]);
        $password = bcrypt($request->password);

        $request->merge(['password'=>$password]);

        User::create($request->all());
        return redirect()->route('admin.user.index');
    }
}
