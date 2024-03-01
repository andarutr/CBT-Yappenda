<?php

namespace App\Livewire\Account;

use App\Models\User;
use Livewire\Component;
use App\Helpers\AccountHelper;

class SuspendList extends Component
{
    public $accounts;

    public function mount()
    {
        $this->accounts = User::all();
    }

    public function suspend($uuid)
    {
        $data = [
            'uuid' => $uuid,
        ];

       $suspend = AccountHelper::suspend($data);
    }

    public function un_suspend($uuid)
    {
        $data = [
            'uuid' => $uuid,
        ];

       $suspend = AccountHelper::unSuspend($data);
    }

    public function render()
    {
        return view('livewire.account.suspend-list');
    }
}
