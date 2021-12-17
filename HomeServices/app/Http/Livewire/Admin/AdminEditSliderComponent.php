<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithFileUploads;
use Carbon\Carbon;


class AdminEditSliderComponent extends Component
{
    use WithFileUploads;
    public $slider_id;
    public $title;
    public $image;
    public $status;
    public $newImage;

    public function mount($slider_id){
        $slider = Slider::find($slider_id);
        $this->slider_id = $slider->id;
        $this->title = $slider->title;
        $this->image = $slider->image;
        $this->status = $slider->status;
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'title' => 'required',
            'image' => 'required',
        ]);
        if ($this->newImage) {
            $this->validateOnly($fields,[
                'image' => 'required|mimes:jpeg,png'
            ]);
        }
    }

    public function updateSlider(){
        $this->validate([
            'title' => 'required',
        ]);
        if ($this->newImage) {
            $this->validate([
                'newImage' => 'required|mimes:jpeg,png'
            ]);
        }
        $slider = Slider::find($this->slider_id);
        $slider->title = $this->title;

        if ($this->newImage) {
            unlink('images/slider/'.$slider->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newImage->extension();
            $this->newImage->storeAs('slider',$imageName);
            $slider->image = $imageName;
        }
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message','Slider has been updated successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-slider-component')->layout('layouts.base');
    }
}
