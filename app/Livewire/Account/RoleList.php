<?php

namespace App\Livewire\Account;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Helpers\AccountHelper;

class RoleList extends Component
{
    // Jangan dihapus!
    public $statusPage = 'list';
    public $search;
    public $user_uuid;
    public $paginate = 8;

    public $name;
    public $role_id;
    
    public function toPage($page)
    {
        $his->statusPage = $page;
    }

    public function editRole($uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        $this->statusPage = 'editRole';
        $this->user_uuid = $user->uuid;
        $this->name = $user->name;
        $this->role_id = $user->role_id;
    }

    public function update()
    {
        $data = [
            'uuid' => $this->user_uuid,
            'role_id' => $this->role_id
        ];

        $update = AccountHelper::updateRole($data);

        toastr()->success('Berhasil memperbarui role!');

        return redirect('/admin/account/role');
    }

    public function render()
    {
        $accounts = User::orderByDesc('id')->paginate($this->paginate);
        $result = User::where('name','like','%'.$this->search.'%')
                        ->orwhere('email','like','%'.$this->search.'%')
                        ->paginate($this->paginate);
        $roles = Role::all();
        
        return view('livewire.account.role-list',[
            'accounts' => $this->search ? $result : $accounts,
            'roles' => $roles
        ]);
    }
}
