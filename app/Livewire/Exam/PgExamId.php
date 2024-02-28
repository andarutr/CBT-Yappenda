<?php

namespace App\Livewire\Exam;

use Request;
use App\Models\Exam;
use Livewire\Component;
use App\Models\PGQuestion;

class PgExamId extends Component
{
    public $uuid;
    public $exam;
    public $id_quest;
    public $question;
    public $answer;
    public $box_question;

    public function mount()
    {
        $this->id_quest = Request::segment(4); 
        $this->uuid = Request::segment(5);
        $this->exam = Exam::where('uuid', $this->uuid)->first();
        $this->question = PGQuestion::where(['exam_id' => $this->exam->id, 'id' => $this->id_quest])->first();

        $this->box_question = PGQuestion::where('exam_id', $this->exam->id)->get();
    }

    public function render()
    {
        return view('livewire.exam.pg-exam-id');
    }
}
