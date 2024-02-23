<?php

namespace App\Livewire\Account;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AccountList extends Component
{
    public function render()
    {
        $accounts = User::paginate(10);
        return view('livewire.account.account-list')->with([
            'accounts' => $accounts
        ]);
    }
}
