<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithFileUploads;

class AdminSliderComponent extends Component
{
    use WithFileUploads;

    public function deleteSlider($slider_id){
        $slider = Slider::find($slider_id);
        unlink('images/slider/'. $slider->image);
        $slider->delete();
        session()->flash('message','Slider has been deleted successfully');

    }
    public function render()
    {
        $sliders = Slider::paginate(10);
        return view('livewire.admin.admin-slider-component',[
            'sliders' => $sliders,
        ])->layout('layouts.base');
    }
}
