<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;
use Cart;

class HomeComponent extends Component
{
    public function render()
    {
        if (Auth::check()) {

            Cart::instance('cart')->restore(Auth::user()->email);

            Cart::instance('wishlist')->restore(Auth::user()->email);
        }
        
        return view('livewire.home-component')->layout('layouts.base');
    }
}
