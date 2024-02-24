<?php

namespace App\Livewire\Account;

use App\Models\User;
use App\Models\Role;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
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

        // Logic Store 
        User::create([
            "uuid" => Uuid::uuid4()->toString(),
            'name' => $this->name,
            'email' => $this->email,
            'password' => \Hash::make('test1234'),
            'role_id' => $this->role_id,
        ]);

        return redirect('/admin/account')->with('success','Berhasil menambah akun!');
    }

    public function render()
    {
        return view('livewire.account.account-create');
    }
}
