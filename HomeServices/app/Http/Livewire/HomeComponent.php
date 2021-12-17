<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Slider;

class HomeComponent extends Component
{
    public function render()
    {
        $service = Service::find(7);

        // dd($service->category);

        $scategories = ServiceCategory::inRandomOrder()->take(18)->get();
        $fservices = Service::where('featured',1)->inRandomOrder()->take(8)->get();
        $fcategories = ServiceCategory::where('featured',1)->inRandomOrder()->take(8)->get();
        $sid = ServiceCategory::whereIn('slug',['ac','beauty','plumbing','electrical','shower-filter'])->get()->pluck('id');
        $aservices = Service::whereIn('service_category_id',$sid)->inRandomOrder()->take(8)->get();
        $sliders = Slider::where('status','1')->get();
        return view('livewire.home-component',[
            'scategories' => $scategories,
            'fservices' => $fservices,
            'fcategories' => $fcategories,
            'aservices' => $aservices,
            'sliders' => $sliders,
        ])->layout('layouts.base');
    }
}
