<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WishlistCountComponent extends Component
{
    public $refresh;
    
    protected $listeners = ['refreshComponent'];
    public function refreshComponent(){

    }

    public function render()
    {
        return view('livewire.wishlist-count-component');
    }
}
