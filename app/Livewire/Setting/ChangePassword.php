<?php

namespace App\Livewire\Setting;

use Auth;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ChangePassword extends Component
{
    #[Validate('required')]
    public $old_password;
    #[Validate('required|min:8')]
    public $new_password;

    public function update_password()
    {
        $this->validate();

        if(auth()->attempt(['email' => Auth::user()->email, 'password' => $this->old_password]))
        {
            User::where('uuid', Auth::user()->uuid)
                ->update([
                    'password' => \Hash::make($this->new_password)
                ]);

            $this->reset();
            return redirect()->back()->with('success', 'Berhasil memperbarui password!');
        }else{
            $this->reset();
            return redirect()->back()->with('failed', 'Password salah!');
        }
        
    }

    public function render()
    {
        return view('livewire.setting.change-password');
    }
}
