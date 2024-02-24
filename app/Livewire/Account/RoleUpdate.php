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
    public $roleId;

    public function mount()
    {
        $this->roles = Role::all();
        $this->uuid = Request::segment(4);

        $user = User::where('uuid', $this->uuid)->first();

        $this->name = $user->name;
        $this->roleId = $user->roleId;
    }

    public function update()
    {
        User::where('uuid', $this->uuid)
                ->update([
                    'roleId' => $this->roleId
                ]);

        return session()->flash('success','Berhasil memperbarui role!');
    }

    public function render()
    {
        return view('livewire.account.role-update');
    }
}
