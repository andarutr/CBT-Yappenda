<?php

namespace App\Livewire\Account;

use App\Models\User;
use Livewire\Component;
use App\Helpers\AccountHelper;

class SuspendList extends Component
{
    // Jangan dihapus
    public $search;
    public $paginate = 8;

    public function suspend($uuid)
    {
        $data = [
            'uuid' => $uuid,
        ];

       $suspend = AccountHelper::suspend($data);

       toastr()->success('Berhasil suspend akun!');

        return redirect()->to('/admin/account/suspend');
    }

    public function unSuspend($uuid)
    {
        $data = [
            'uuid' => $uuid,
        ];

       $suspend = AccountHelper::unSuspend($data);
       
       toastr()->success('Berhasil un-suspend akun!');

       return redirect()->to('/admin/account/suspend');
    }

    public function render()
    {
        $accounts = User::orderByDesc('id')->paginate($this->paginate);
        $result = User::where('name','like','%'.$this->search.'%')
                        ->orwhere('email','like','%'.$this->search.'%')
                        ->paginate($this->paginate);

        return view('livewire.account.suspend-list',[
            'accounts' => $this->search ? $result : $accounts
        ]);
    }
}
