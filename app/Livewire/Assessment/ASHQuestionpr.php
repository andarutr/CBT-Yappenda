<?php

namespace App\Livewire\Assessment;

use Request;
use App\Models\Exam;
use Livewire\Component;
use App\Models\PGQuestion;
use App\Models\EssayQuestion;
use App\Helpers\AssessmentHelper;

class ASHQuestionpr extends Component
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
        $destroy = AssessmentHelper::destroyPg($id_quest);

        session()->flash('success', 'Berhasil menghapus soal PG!');

        return redirect()->back();
    }

    public function destroy_essay($id_quest)
    {
        $destroy = AssessmentHelper::destroyEs($id_quest);

        session()->flash('success', 'Berhasil menghapus soal Essay!');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.assessment.a-s-h-questionpr');
    }
}
