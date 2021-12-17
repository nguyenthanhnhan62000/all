<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminAddSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $image;
    public $status = 0;

    public function updated($fields){
        $this->validateOnly($fields,[
            'title' => 'required',
            'image' => 'required',
        ]);
    }

    public function addNewSlider(){
        $this->validate([
            'title' => 'required',
            'image' => 'required',
        ]);
        $slider = new Slider();
        $slider->title = $this->title;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('slider',$imageName);
        $slider->image = $imageName;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message','Slider has been created successfully');
    }
    public function render()
    {

        return view('livewire.admin.admin-add-slider-component')->layout('layouts.base');
    }
}
