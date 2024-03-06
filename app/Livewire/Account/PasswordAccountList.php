<?php

namespace App\Livewire\Account;

use App\Models\User;
use Livewire\Component;
use App\Helpers\AccountHelper;
use Livewire\Attributes\Validate;

class PasswordAccountList extends Component
{
    // Jangan dihapus!
    public $statusPage = 'list';
    public $search; 
    public $paginate = 8;
    public $user_uuid;

    public $name;
    #[Validate('required|min:8')]
    public $new_password;

    public function toPage($page)
    {
        $this->statusPage = $page;
    }

    public function editPassword($uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        $this->statusPage = 'editPassword';
        $this->user_uuid = $user->uuid;
        $this->name = $user->name;
    }

    public function update()
    {
        $this->validate();

        $data = [
            'uuid' => $this->user_uuid,
            'new_password' => $this->new_password,
            'name' => $this->name,
        ];

        $update = AccountHelper::updatePassword($data);

        toastr()->success('Berhasil memperbarui password!');

        return redirect('/admin/account/reset-password');
    }

    public function render()
    {
        $accounts = User::orderByDesc('id')->paginate($this->paginate);
        $result = User::where('name','like','%'.$this->search.'%')
                        ->orwhere('email','like','%'.$this->search.'%')
                        ->paginate($this->paginate);

        return view('livewire.account.password-account-list', [
            'accounts' => $this->search ? $result : $accounts,
        ]);
    }
}
