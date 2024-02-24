<?php

namespace App\Livewire\Account;

use Request;
use App\Models\User;
use App\Models\Role;
use Livewire\Component;

class RoleUpdate extends Component
{
    public $uuid;
    public $roles;
    public $name;
    public $role_id;

    public function mount()
    {
        $this->roles = Role::all();
        $this->uuid = Request::segment(4);

        $user = User::where('uuid', $this->uuid)->first();

        $this->name = $user->name;
        $this->role_id = $user->role_id;
    }

    public function update()
    {
        User::where('uuid', $this->uuid)
                ->update([
                    'role_id' => $this->role_id
                ]);

        return session()->flash('success','Berhasil memperbarui role!');
    }

    public function render()
    {
        return view('livewire.account.role-update');
    }
}
