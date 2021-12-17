<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Auth;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;

    public function addToWishlist($product_id,$product_name,$product_price){
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
    }

    public function removeFormWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem){
            if ($witem->id == $product_id) {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }
        }
    }
    public function store($product_id, $product_name, $product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        $this->emitTo('wishlist-count-component','refreshComponent');
        return redirect()->route('product.cart');
    }
    
    public function render()
    {
        $products = Product::paginate(12);

        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);

            Cart::instance('wishlist')->store(Auth::user()->email);
        }
        
        return view('livewire.shop-component',[
            'products' => $products,
        ])->layout('layouts.base');
    }
}
