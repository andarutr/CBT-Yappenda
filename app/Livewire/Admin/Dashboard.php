<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $title = 'Dashboard';
        return view('livewire.admin.dashboard')->with([
            'title' => $title
        ]);
    }
}
