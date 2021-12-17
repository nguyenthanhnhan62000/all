<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\carthelper;
use App\Models\product;
use App\Models\order;
use App\Models\orderdetail;

use Auth;


class CheckoutController extends Controller
{

    public function __construct()
    {
         $isTrue = $this->middleware('cus');
   
    }

    public function success()
    {
        return view('checkout_success');
    }
    public function form()
    {
        return view('checkout');
    }
    public function post_form(Request $request,carthelper $cart)
    {
      
        $c_id = Auth::guard('cus')->user()->id;

       if( $order = order::create([
        'customer_id' => $c_id,
        'order_note' => $request->order_note
        ])){
            $order_id = $order->id;
            foreach ($cart->items as $product_id => $item) {
                $quantity = $item['quantity'];
                $price = $item['price'];
                orderdetail::create([
                    'order_id' => $order_id,
                    'product_id' => $product_id,
                    'price' =>$price,
                    'quantity' => $quantity
                ]);
            }
         session(['cart' => '']);   

         return redirect()->route('checkout.success')->with('success','Đặt hàng thành công');
            
        }else{
            return redirect()->back()->with('error','Đặt hàng thất bại');
         
        }


    }
}
