<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Subcategory;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    
    public function deleteCategory($id){
        $category = Category::find($id)->delete();
        session()->flash('message','Category has been deleted successfully');
    }
    public function deleteSubcategory($id){
        
        $Subcategory = Subcategory::find($id)->delete();
        session()->flash('message','Subcategory has been deleted successfully');
    }

    public function render()
    {
        $categoies = Category::paginate(5);
        return view('livewire.admin.admin-category-component',[
            'categoies' => $categoies,
        ])->layout('layouts.base');
    }
}
