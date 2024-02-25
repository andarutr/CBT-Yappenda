<?php

namespace App\Livewire\Setting;

use Auth;
use Request;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ProfileShow extends Component
{
    #[Validate('required')]
    public $name;
    #[Validate('required')]
    public $email;

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

    public function render()
    {
        return view('livewire.setting.profile-show');
    }
}
