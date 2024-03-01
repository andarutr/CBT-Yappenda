<?php

namespace App\Livewire\Account;

use Request;
use App\Models\User;
use Livewire\Component;
use App\Helpers\AccountHelper;
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

        $data = [
            'uuid' => $this->uuid,
            'new_password' => $this->new_password,
            'name' => $this->name,
        ];

        $update = AccountHelper::updatePassword($data);

        return redirect('/admin/account/reset-password')->with('success', 'Berhasil memperbarui akun '.$data['name']);
    }

    public function render()
    {
        return view('livewire.account.password-account-update');
    }
}
