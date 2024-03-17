<?php

namespace App\Livewire\Rapor;

use App\Models\ContentRapor;
use App\Models\Exam;
use App\Models\Rapor;
use App\Models\User;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Ramsey\Uuid\Uuid;
use Request;

class RaporUpdate extends Component
{
    public $uuid;
    public $user_id;
    public $rapor;
    public $exam;
    public $user;
    public $kelas;
    #[Validate('required')]
    public $description;

    public function mount()
    {
        $this->uuid = Request::segment(6);
        $this->kelas = Request::segment(4);
        $this->rapor = Rapor::where('uuid', $this->uuid)->first();
        $content = ContentRapor::whereHas('rapor', function(Builder $query){
            $query->where('uuid', $this->uuid);
        })->first();

        $this->exam_id = $this->rapor->id;
        $this->description = $content->description;
        $this->exam = $content->exam->lesson->name.' ('.$content->exam->grade.') ['.$content->exam->exam_type.'] '.$content->exam->semester.' '.$content->exam->th_ajaran;
        //  }}
        $this->user = User::where('id', $this->rapor->user_id)->first();
    }

    public function update()
    {
        $this->validate();

        ContentRapor::where('rapor_id', $this->rapor->id)->update([
            'description' => $this->description,
        ]);
        
        toastr()->success('Berhasil memperbarui nilai!');
        return redirect('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/'.$this->kelas.'/'.$this->uuid);
    }

    public function render()
    {
        return view('livewire.rapor.rapor-update');
    }
}
