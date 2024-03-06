<?php

namespace App\Livewire\Partials;

use Auth;
use Livewire\Component;

class NavbarApp extends Component
{
    public function logout()
    {
        Auth::logout();

        toastr()->success('success','Berhasil logout!');

        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.partials.navbar-app');
    }
}
