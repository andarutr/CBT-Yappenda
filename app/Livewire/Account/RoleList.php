<?php

namespace App\Livewire\Account;

use App\Models\User;
use Livewire\Component;

class RoleList extends Component
{
    public $accounts;

    public function mount()
    {
        $this->accounts = User::all();
    }

    public function render()
    {
        return view('livewire.account.role-list');
    }
}
