<?php

namespace App\Livewire\Rapor;

use Auth;
use Request;
use App\Models\Exam;
use App\Models\Rapor;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\ContentRapor;
use Livewire\Attributes\Validate;
use Illuminate\Database\Eloquent\Builder;

class RaporUpdate extends Component
{
    public $uuid;
    public $user_id;
    public $examId;
    public $rapor;
    public $exams;
    #[Validate('required')]
    public $exam_id;
    #[Validate('required')]
    public $kelompok_mpl;
    #[Validate('required')]
    public $nilai;
    #[Validate('required')]
    public $description;

    public function mount()
    {
        $this->uuid = Request::segment(6);
        $this->rapor = Rapor::where('uuid', $this->uuid)->first();
        $this->examId = Exam::where('id', $this->rapor->id)->first();
        $this->exams = Exam::all();
        $content = ContentRapor::whereHas('rapor', function(Builder $query){
            $query->where('uuid', $this->uuid);
        })->first();

        $this->exam_id = $this->rapor->id;
        $this->kelompok_mpl = $content->kelompok_mpl;
        $this->nilai = $content->nilai;
        $this->description = $content->description;
    }

    public function update()
    {
        $this->validate();

        ContentRapor::where('rapor_id', $this->rapor->id)->update([
            'exam_id' => $this->examId->id,
            'kelompok_mpl' => $this->kelompok_mpl,
            'nilai' => $this->nilai,
            'description' => $this->description,
        ]);
        
        return redirect('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/'.$this->rapor->user->kelas.'/'.$this->uuid)->with('success','Berhasil memperbarui nilai!');
    }

    public function render()
    {
        return view('livewire.rapor.rapor-update');
    }
}
