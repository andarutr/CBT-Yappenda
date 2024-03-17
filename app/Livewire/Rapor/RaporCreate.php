<?php

namespace App\Livewire\Rapor;

use Auth; 
use Request;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\{User, Rapor, Exam, ContentRapor};
use Livewire\Attributes\Validate;
use Illuminate\Database\Eloquent\Builder;

class RaporCreate extends Component
{
    public $uuid;
    public $user_id;
    public $rapor;
    public $exams;
    public $user;
    public $kelas;
    #[Validate('required')]
    public $exam_id;
    #[Validate('required')]
    public $description;

    public function mount()
    {
        $this->kelas = Request::segment(4);
        $this->user_id = Request::segment(5);
        $this->uuid = Request::segment(6);
        $this->rapor = Rapor::where('uuid', $this->uuid)->first();
        $this->exams = Exam::all();
        $this->user = User::where('id', $this->rapor->user_id)->first();
    }

    public function store()
    {
        $this->validate();
        ContentRapor::create([
            'uuid' => Uuid::uuid4()->toString(),
            'rapor_id' => $this->rapor->id,
            'exam_id' => $this->exam_id,
            'nilai' => 1,
            'description' => $this->description,
        ]);
        
        toastr()->success('Berhasil memperbarui nilai!');
        return redirect('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/'.$this->kelas.'/'.$this->uuid);
    }

    public function render()
    {
        return view('livewire.rapor.rapor-create');
    }
}
