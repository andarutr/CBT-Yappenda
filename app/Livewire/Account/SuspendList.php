<?php

namespace App\Livewire\Account;

use App\Models\User;
use Livewire\Component;

class SuspendList extends Component
{
    public $accounts;

    public function mount()
    {
        $this->accounts = User::all();
    }

    public function suspend($uuid)
    {
        User::where('uuid', $uuid)
                ->update([
                    'roleId' => 13
                ]);

        $user = User::where('uuid', $uuid)->first();

        return redirect()->to('/admin/account/suspend')->with('success', 'Berhasil suspend akun '.$user->name);
    }

    public function un_suspend($uuid)
    {
        User::where('uuid', $uuid)
                ->update([
                    'roleId' => 3
                ]);
                
        $user = User::where('uuid', $uuid)->first();

        return redirect()->to('/admin/account/suspend')->with('success', 'Berhasil membatalkan suspend akun '.$user->name);
    }

    public function render()
    {
        return view('livewire.account.suspend-list');
    }
}
