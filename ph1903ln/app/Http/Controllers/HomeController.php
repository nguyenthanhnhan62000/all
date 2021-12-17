<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Auth;
use Mail;

class HomeController extends Controller
{
    public function index()
    {
        // Auth::guard('cus')->attempt(['email' => 'nhanacc8@gmail.com','password' => 'na!2EGx8y@aZUzg']);

        $top_product = Product::where('status',1)->limit(10)->orderby('id','desc')->get();
        $sale_product = Product::where('sale_price','>',0)->where('status',0)->orderby('id','desc')->get();

        return view('index',compact('top_product','sale_product'));
    }

    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }

    public function post_contact(Request $req)
    {
       
        Mail::send('email.contact',[
            'name' => $req->name,
            'content' => $req->content,
            'email'=> $req->email

        ],function($mail) use($req)
        {
                $mail->to('nhanacc8@gmail.com','Cửa hàng');

            
                $mail->from($req->email,$req->name);

                $mail->subject('test mail');  
        });
      
      
    }
    public function logout()
    {
        Auth::guard('cus')->logout();
        return redirect()->route('home');

    }
    public function login()
    {
      
        // Auth::guard('cus')->attempt(['email' => 'nhanacc8@gmail.com','password' => 'na!2EGx8y@aZUzg']);
        return view('login');

    }
    public function post_login(request $request)
    {
        // dd($request->email);

        $isTrue = Auth::guard('cus')->attempt(['email' => $request->email,'password' => $request->password]);
        
        if ($isTrue) {
            return redirect()->route('home');
        }
        else{
            return redirect()->back();
        }
       
    }
    public function View($slug)
    {

        $product = product::where('slug',$slug)->first();

        $model = Category::where('slug',$slug)->first();

        if ($model) {
            return view('product',compact('model'));

        } elseif($product){

            return view('product-detail',['model'=>$product]);

        }else{
            return view('404');
        }
    }
  
}
