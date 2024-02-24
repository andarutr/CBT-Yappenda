<?php

namespace App\Livewire\Account;

use App\Models\User;
use Livewire\Component;

class PasswordAccountList extends Component
{
    public $accounts;

    public function mount()
    {
        $this->accounts = User::all();
    }

    public function render()
    {
        return view('livewire.account.password-account-list');
    }
}
