<?php

namespace App\Livewire\Assessment;

use Request;
use App\Models\Exam;
use Livewire\Component;
use App\Models\PGQuestion;
use App\Models\EssayQuestion;

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

    public function render()
    {
        return view('livewire.assessment.a-s-h-questionpr');
    }
}
