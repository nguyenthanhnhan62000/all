<?php

namespace App\Http\Livewire;

use Cart;
use Carbon\Carbon;
use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Support\Str;
use Auth;

class CartComponent extends Component
{

    public $haveCouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    public function increaseQuantity($rowid)
    {
        $product = Cart::instance('cart')->get($rowid);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowid, $qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function decreaseQuantity($rowid)
    {
        $product = Cart::instance('cart')->get($rowid);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowid, $qty);
        $this->emitTo('cart-count-component','refreshComponent');

    }
    public function destroy($rowid){
        Cart::instance('cart')->remove($rowid);
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been removed');
    }
    public function destroyAll(){
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');
    }

    public function checkout(){
        $this->setAmountForCheckOut();
        if (Auth::check()) {
         
            return redirect()->route('checkout');
        }else{
            return redirect()->route('login');
        }
    }
    public function removeCoupon(){
        session()->forget('coupon');
    }

    public function setAmountForCheckOut(){
        if (!Cart::instance('cart')->count() > 0) {
            session()->forget('checkout');
            return;
        }
        if (session()->has('coupon')) {
            session()->put('checkout',[
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'tax' => $this->taxAfterDiscount,
                'total' => $this->totalAfterDisc
            ]);
        }
        else {
            session()->put('checkout',[
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
            ]);
        }
    }
    public function applyCouponCode(){
        $subtotal = Cart::instance('cart')->subtotal();
        $convertSubTotal = (float)Str::replace(',', '', $subtotal);
        
        $coupon = Coupon::where('code',$this->couponCode)
        ->where('expiry_date','>=',Carbon::today())
        ->where('cart_value','<=',$convertSubTotal)
        ->first();
        if (!$coupon) {
            session()->flash('coupon_message','Coupon code is invalid');
            return;
        }
        session()->put('coupon',[
            'code' =>$coupon->code,
            'type' =>$coupon->type,
            'value' =>$coupon->value,
            'cart_value' =>$coupon->cart_value,
        ]);
        
    }
    public function calculateDiscounts(){

        $subtotal = Cart::instance('cart')->subtotal();
        $convertSubTotal = (float)Str::replace(',', '', $subtotal);

        if (session()->has('coupon')) {
            if (session()->get('coupon')['type'] == 'fixed') {
                $this->discount = session()->get('coupon')['value'];
            }
            else {
                $this->discount = ($convertSubTotal * session()->get('coupon')['value'])/100;
            }
            $this->subtotalAfterDiscount = $convertSubTotal - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax'))/100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
    }

    public function render()
    {
        $subtotal = Cart::instance('cart')->subtotal();
        $convertSubTotal = (float)Str::replace(',', '', $subtotal);
        
        if (session()->has('coupon')) {
            if ($convertSubTotal < session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            }
            else {
                $this->calculateDiscounts();
            }
        }

        return view('livewire.cart-component')->layout('layouts.base');
    }
}
