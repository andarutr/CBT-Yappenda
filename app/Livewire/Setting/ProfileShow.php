<?php

namespace App\Livewire\Setting;

use Auth;
use Request;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class ProfileShow extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $name;
    #[Validate('required')]
    public $email;
    #[Validate('image|max:1024')] 
    public $picture;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function update_profile()
    {
        $this->validate();
        
        $segment_1 = Request::segment(1);

        User::where('uuid', Auth::user()->uuid)
                ->update([
                    'name' => $this->name,
                    'email' => $this->email,
                ]);

        return redirect()->back()->with('success', 'Berhasil memperbarui profile!');
    }

    public function upload_picture()
    {
         $this->picture->storePubliclyAs('public/assets/images/users', $this->picture->getClientOriginalName());
         
        User::where('uuid', Auth::user()->uuid)
                ->update([
                    'picture' => $this->picture->getClientOriginalName()
                ]);

        return redirect()->back()->with('success', 'Berhasil memperbarui foto!');    
    }

    public function render()
    {
        return view('livewire.setting.profile-show');
    }
}
