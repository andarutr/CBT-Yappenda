<?php

namespace App\Livewire\Account;

use App\Models\User;
use Livewire\Component;
use App\Helpers\AccountHelper;
use Illuminate\Support\Facades\Auth;

class AccountList extends Component
{
    public $accounts;

    public function mount()
    {
        $this->accounts = User::all();
    }

    public function destroy($uuid)
    {
        $data = [
            'uuid' => $uuid
        ];

        $destroy = AccountHelper::destroy($data);
    }

    public function render()
    {
        return view('livewire.account.account-list');
    }
}
