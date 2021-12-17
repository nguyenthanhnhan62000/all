<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserEditProfileComponent extends Component
{
    
    use WithFileUploads;
 
    public  $name;
    public  $email;
    public  $phone;
    public  $image;
    public  $line1;
    public  $line2;
    public  $city;
    public  $province;
    public  $country;
    public  $zipcode;
    public  $newimage;

    public function mount(){
        $user = User::find(auth()->user()->id);

        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->profile->mobile;
        $this->image = $user->profile->image;
        $this->line1 = $user->profile->line1;
        $this->line2 = $user->profile->line2;
        $this->city = $user->profile->city;
        $this->province = $user->profile->province;
        $this->country = $user->profile->country;
        $this->zipcode = $user->profile->zipcode;
    }
    public function updateProfile(){
        $user = User::find(auth()->user()->id);
        $user->name = $this->name;
        $user->save();

        $user->profile->mobile = $this->phone;

        if ($this->newimage) {
            if ($this->image) {
                unlink('assets/images/profiles/'.$this->image);
            }
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('profiles',$imageName);
            $user->profile->image = $imageName;
        }

        $user->profile->line1 = $this->line1;
        $user->profile->line2 = $this->line2;
        $user->profile->city = $this->city;
        $user->profile->province = $this->province;
        $user->profile->country = $this->country;
        $user->profile->zipcode = $this->zipcode;
        $user->profile->save();
        session()->flash('message','Profile has been updated successfully');

    }

    public function render()
    {
        return view('livewire.user.user-edit-profile-component')->layout('layouts.base');
    }
}
