<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\Coupon;
use Illuminate\Support\Str;
use Carbon\Carbon;
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
    public function switchToSaveForLater($rowId){
        $item = Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been saved for later');
    }

    public function moveToCart($rowId){
        $item = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('s_success_message','Item has been moved to cart');
    }
    public function deleteFromSaveForLater($rowId){
        Cart::instance('saveForLater')->remove($rowId);
        session()->flash('s_success_message','Item has been removed from save for later');
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
    public function removeCoupon(){
        session()->forget('coupon');
    }
    public function checkout(){
        if (Auth::check()) {
         
            return redirect()->route('checkout');
        }else{
            return redirect()->route('login');
        }
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
        $this->setAmountForCheckOut();

        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }

        return view('livewire.cart-component')->layout('layouts.base');
    }
}
