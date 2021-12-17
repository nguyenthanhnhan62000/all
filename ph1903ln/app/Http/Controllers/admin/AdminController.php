<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\controller;
use Auth;
use App\Models\product;
use App\Models\order;

class AdminController extends Controller
{
    public function index()
    {
        $product_count = product::count();
        $order_count = 13;
        $cus_count = 14;
        $orders = order::where('status',0)->get();
        if (request()->date_from && request()->date_to) {
            $orders = order::where('status',0)->whereBetween('create_at',[request()->date_from,request()->date_to])->get();
        }

        return view('admin/index',compact('product_count','order_count','cus_count','orders'));
       
    } 
    public function login()
    {
        return view('admin/login');

    } 
    public function post_login(Request $request)
    {
            $this->validate($request,[
                'email'=> 'required|email',
                'password'=>'required'
            ],[
                'email.email'=>'email không đúng định dạng',
                'email.required'=>'email không được để trống',
                'password.required'=>'password không được để trống'
            ]);
      
            
            if (Auth::attempt($request->only('email','password'),$request->has('rmb'))) {
                return redirect()->route('admin');
            }
            else{
                return redirect()->back();
            }

            // dd($request->only('email','password')); 
    } 

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

   

}
