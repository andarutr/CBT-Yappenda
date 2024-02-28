<?php

namespace App\Livewire\Assessment;

use Request;
use App\Models\Exam;
use Livewire\Component;
use App\Models\PGQuestion;
use App\Models\EssayQuestion;

class AstsQuestionpr extends Component
{
    public $uuid;
    public $exam;
    public $essay_question;
    public $pg_question;

    public function mount()
    {
        $this->uuid = Request::segment(6);
        $this->exam = Exam::where('uuid', $this->uuid)->first();
        $this->essay_question = EssayQuestion::where('exam_id', $this->exam->id)->get();
        $this->pg_question = PGQuestion::where('exam_id', $this->exam->id)->get();
    }

    public function destroy_pg($id_quest)
    {
        PGQuestion::where('id', $id_quest)->delete();

        session()->flash('success', 'Berhasil menghapus soal PG!');

        return url()->current();
    }

    public function destroy_essay($id_quest)
    {
        EssayQuestion::where('id', $id_quest)->delete();

        session()->flash('success', 'Berhasil menghapus soal Essay!');

        return url()->current();
    }
    
    public function render()
    {
        return view('livewire.assessment.asts-questionpr');
    }
}
