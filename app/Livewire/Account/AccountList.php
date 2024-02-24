<?php

namespace App\Livewire\Account;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class AccountList extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $accounts = User::all();
        $search = User::where('name','like','%'.$this->search.'%')
                        ->orwhere('email','like','%'.$this->search.'%')
                        ->get();

        return view('livewire.account.account-list', [
            'accounts' => $this->search === null ? $accounts : $search
        ]);
    }
}
