<?php

namespace App\Livewire\Account;

use Request;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;

class PasswordAccountUpdate extends Component
{
    public $uuid; 
    public $name;
    #[Validate('required|min:8')]
    public $new_password;

    public function mount()
    {
        $this->uuid = Request::segment(4);

        $user = User::where('uuid', $this->uuid)->first();
        $this->name = $user->name;
    }

    public function update()
    {
        $this->validate();

        User::where('uuid', $this->uuid)
                ->update([
                    'password' => \Hash::make($this->new_password)
                ]);

        $this->reset('new_password');
        return session()->flash('success', 'Berhasil memperbarui password '.$this->name);
    }

    public function render()
    {
        return view('livewire.account.password-account-update');
    }
}
