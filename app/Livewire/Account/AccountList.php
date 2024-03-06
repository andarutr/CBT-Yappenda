<?php

namespace App\Livewire\Account;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Helpers\AccountHelper;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class AccountList extends Component
{
    // Jangan dihapus!
    public $statusPage = 'list';
    public $user_uuid;
    public $search;
    public $paginate = 8;
    
    #[Validate('required')]
    public $name;
    #[Validate('required|unique:users|email')]
    public $email;
    #[Validate('required')]
    public $role_id;

    public function toPage($page)
    {
        $this->statusPage = $page;
        $this->name = '';
        $this->email = '';
        $this->role_id = '';
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
        
        toastr()->success('Berhasil menambah akun!');

        return redirect('/admin/account');
    }
    
    public function edit($uuid)
    {
        $this->statusPage = 'edit';
        $account = User::where('uuid', $uuid)->firstOrFail();

        $this->user_uuid = $account->uuid;
        $this->name = $account->name;
        $this->email = $account->email;
        $this->role_id = $account->role_id;
    }

    public function update()
    {
        $this->validate();

        $data = [
            'uuid' => $this->user_uuid,
            'name' => $this->name,
            'email' => $this->email,
            'role_id' => $this->role_id,
        ];

        $update = AccountHelper::update($data);
        
        toastr()->success('Berhasil memperbarui akun!');

        return redirect('/admin/account');
    }

    public function destroy($uuid)
    {
        $data = [
            'uuid' => $uuid
        ];

        $destroy = AccountHelper::destroy($data);

        toastr()->success('Berhasil menghapus akun!');

        return redirect('/admin/account');
    }

    public function render()
    {
        $accounts = User::orderByDesc('id')->paginate($this->paginate);
        $result = User::where('name','like','%'.$this->search.'%')
                        ->orwhere('email','like','%'.$this->search.'%')
                        ->paginate($this->paginate);
        $roles = Role::all();
        
        return view('livewire.account.account-list', [
            'accounts' => $this->search ? $result : $accounts,
            'roles' => $roles
        ]);
    }
}
