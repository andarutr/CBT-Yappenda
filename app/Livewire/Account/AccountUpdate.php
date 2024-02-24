<?php

namespace App\Livewire\Account;

use Request;
use App\Models\Role;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Http\Request as Req;

class AccountUpdate extends Component
{
    public $uuid;
    public $account;
    public $roles;
    #[Validate('required')]
    public $name;
    #[Validate('required')]
    public $email;
    #[Validate('required')]
    public $role_id;

    public function mount()
    {
        $this->roles = Role::all();
        $this->uuid = Request::segment(4);

        $account = User::where('uuid', $this->uuid)->first();

        $this->name = $account->name;
        $this->email = $account->email;
        $this->role_id = $account->role_id;
    }
    public function update()
    {
        $this->validate();

        User::where('uuid', $this->uuid)->update([
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => $this->role_id,
        ]);
        return redirect('/admin/account')->with('success', 'Berhasil memperbarui akun!');
    }

    public function render()
    {
        return view('livewire.account.account-update');
    }
}
