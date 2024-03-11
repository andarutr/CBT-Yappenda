<?php

namespace App\Livewire\Assessment;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AshResult extends Component
{
    // Jangan dihapus
    public $statusPage = 'list';
    public $kelas;
    public $search;

    public function showScore($uuid)
    {
        return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/ash/tp/'.$uuid);
    }
    public function toPage($page)
    {
        $this->statusPage = $page;
    }

    public function show($kelas)
    {
        $this->statusPage = 'show';
        $this->kelas = $kelas;
    }

    public function render()
    {
        $users = User::where('kelas', $this->kelas)->get();
        $result = User::where('name', 'like','%'.$this->search.'%')->get();

        return view('livewire.assessment.ash-result', [
            'users' => $this->search ? $result : $users
        ]);
    }
}
