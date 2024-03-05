<?php

namespace App\Livewire\Partials;

use Auth;
use Livewire\Component;

class NavbarApp extends Component
{
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success','Berhasil logout!');
    }

    public function render()
    {
        return view('livewire.partials.navbar-app');
    }
}
