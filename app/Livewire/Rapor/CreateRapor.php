<?php

namespace App\Livewire\Rapor;

use Auth;
use Request;
use App\Models\User;
use App\Models\Rapor;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CreateRapor extends Component
{
    public $users;
    public $kelas_id;
    #[Validate('required')]
    public $user_id;
    #[Validate('required')]
    public $exam_type;
    #[Validate('required')]
    public $semester;
    #[Validate('required')]
    public $th_ajaran;

    public function mount()
    {
        $this->kelas_id = Request::segment(4);
        $this->users = User::where('role_id', 3)->get();
    }

    public function store()
    {
        $this->validate();
        
        Rapor::create([
            'uuid' => Uuid::uuid4()->toString(),
            'user_id' => $this->user_id,
            'exam_type' => $this->exam_type,
            'semester' => $this->semester,
            'th_ajaran' => $this->th_ajaran,
            'wali_kelas' => Auth::user()->name
        ]);

        return redirect('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/'.$this->kelas_id)->with('success', 'Berhasil menambah rapor!');
    }

    public function render()
    {
        return view('livewire.rapor.create-rapor');
    }
}
