<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomeSlider;
use CarBon\CarBon;
class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $image;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $status;

    public function addSlider(){
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;

        $imagename = CarBon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('sliders',$imagename);

        $slider->image = $imagename;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message','Slider has been added successfully');

    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.base');
    }
}
