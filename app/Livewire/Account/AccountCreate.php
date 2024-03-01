<?php

namespace App\Livewire\Account;

use App\Models\Role;
use Livewire\Component;
use App\Helpers\AccountHelper;
use Livewire\Attributes\Validate;

class AccountCreate extends Component
{
    #[Validate('required')]
    public $name;
    #[Validate('required|unique:users|email')]
    public $email;
    #[Validate('required')]
    public $role_id;
    public $roles;

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function store()
    {
        $this->validate();

        $data = [
            'role_id' => $this->role_id,
            'name' => $this->name,
            'email' => $this->email,
        ];

        $store = AccountHelper::store($data);
        
        return redirect('/admin/account')->with('success','Berhasil menambah akun!');
    }

    public function render()
    {
        return view('livewire.account.account-create');
    }
}
