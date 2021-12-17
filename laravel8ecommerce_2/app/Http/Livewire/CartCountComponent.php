<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCountComponent extends Component
{
    
    protected $listeners = ['refreshComponent'];
    public function refreshComponent(){

    }

    public function render()
    {
        return view('livewire.cart-count-component');
    }
}
