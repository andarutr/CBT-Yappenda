<?php

namespace App\Livewire\Remedial;

use Request;
use App\Models\Exam;
use Livewire\Component;
use App\Models\PGQuestion;
use App\Models\EssayQuestion;

class PreviewRemedialExam extends Component
{
    public $uuid;
    public $exam;
    public $pg_answer;
    public $pg_question;
    public $essay_question;

    public function mount()
    {
        $this->uuid = Request::segment(4);
        $this->exam = Exam::where('uuid', $this->uuid)->first();

        $this->pg_question = PGQuestion::where('exam_id', $this->exam->id)->get(); 
        $this->essay_question = EssayQuestion::where('exam_id', $this->exam->id)->get(); 
    }


    public function render()
    {
        return view('livewire.remedial.preview-remedial-exam');
    }
}