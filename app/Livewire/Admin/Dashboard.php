<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Lesson;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $title = 'Dashboard';
        $admin = User::where('role_id', 1)->count();
        $guru = User::where('role_id', 2)->count();
        $siswa = User::where('role_id', 3)->count();
        $lesson = Lesson::count();
        
        return view('livewire.admin.dashboard')->with([
            'title' => $title,
            'admin' => $admin,
            'guru' => $guru,
            'siswa' => $siswa,
            'lesson' => $lesson
        ]);
    }
}
