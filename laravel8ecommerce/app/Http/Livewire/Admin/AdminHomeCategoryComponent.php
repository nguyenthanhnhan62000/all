<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\HomeCategory;

class AdminHomeCategoryComponent extends Component
{
    public $selected_categories = [];
    public $numberofproduts;

    public function mount(){
        $category = HomeCategory::find(1);
        $this->selected_categories = explode(',', $category->sel_categories);
        $this->numberofproduts = $category->no_of_products;

    }
    public function updateHomeCategory(){
        $category = HomeCategory::find(1);
        $category->sel_categories = implode(',', $this->selected_categories);
        $category->no_of_products = $this->numberofproduts;
        $category->save();
        session()->flash('message','HomeCategory has been updatefully');
    }
    public function render()
    {
        
        $categories = Category::all();
        return view('livewire.admin.admin-home-category-component',[
            'categories' => $categories,
        ])->layout('layouts.base');
    }
}
