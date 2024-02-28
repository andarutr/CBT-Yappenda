<?php

namespace App\Livewire\Exam;

use Auth;
use Request;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\PGAnswer;
use App\Models\PGQuestion;

class PgExamId extends Component
{
    public $uuid;
    public $exam;
    public $id_quest;
    public $question;
    public $answer;
    public $box_question;
    public $terisi;

    public function mount()
    {
        $this->id_quest = Request::segment(4); 
        $this->uuid = Request::segment(5);
        $this->exam = Exam::where('uuid', $this->uuid)->first();
        $this->question = PGQuestion::where(['exam_id' => $this->exam->id, 'id' => $this->id_quest])->first();

        $this->box_question = PGQuestion::where('exam_id', $this->exam->id)->get();

        $fulled = PGAnswer::where(['user_id' => Auth::user()->id, 'pg_question_id' => $this->id_quest])->first();

        if($fulled){
            $this->answer = $fulled->answer;
        }
    }

    public function store()
    {
        PGAnswer::updateOrCreate([
            'user_id' => Auth::user()->id,
            'pg_question_id' => $this->id_quest
        ],
        [
            'uuid' => Uuid::uuid4()->toString(),
            'pg_question_id' => $this->question->id,
            'user_id' => Auth::user()->id,
            'answer' => $this->answer,
            'score' => 10
        ]);
    }

    public function render()
    {
        return view('livewire.exam.pg-exam-id');
    }
}
