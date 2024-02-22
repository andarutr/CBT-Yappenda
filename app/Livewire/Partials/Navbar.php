<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public function logout()
    {
        Auth::logout();
        return redirect()->to('/login');
    }

    public function render()
    {
        return view('livewire.partials.navbar');
    }
}
