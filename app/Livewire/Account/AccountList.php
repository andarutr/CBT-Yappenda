<?php

namespace App\Livewire\Account;

use App\Models\User;
use Livewire\Component;
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
        User::where('uuid', $uuid)->delete();
        return redirect('/admin/account')->with('success', 'Berhasil menghapus akun!');
    }

    public function render()
    {
        return view('livewire.account.account-list');
    }
}
