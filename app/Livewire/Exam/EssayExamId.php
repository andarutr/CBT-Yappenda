<?php

namespace App\Livewire\Exam;

use Auth;
use Request;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\PgQuestion;
use App\Models\EssayAnswer;
use App\Models\EssayQuestion;

class EssayExamId extends Component
{
    public $uuid;
    public $exam;
    public $answer;
    public $id_quest;
    public $question;
    public $box_question;
    public $box_question_essay;

    public function mount()
    {
        $this->id_quest = Request::segment(4); 
        $this->uuid = Request::segment(5);
        $this->exam = Exam::where('uuid', $this->uuid)->first();
        $essay = EssayQuestion::where('id', $this->exam->id)->first();
        $this->question = EssayQuestion::where(['exam_id' => $this->exam->id, 'id' => $this->id_quest])->first();

        $this->box_question = PGQuestion::where('exam_id', $this->exam->id)->get();
        $this->box_question_essay = EssayQuestion::where('exam_id', $this->exam->id)->get();

        $fulled = EssayAnswer::where(['user_id' => Auth::user()->id, 'essay_question_id' => $this->id_quest])->first();

        if($fulled){
            $this->answer = $fulled->answer;
        }
    }

    public function store()
    {
        EssayAnswer::updateOrCreate([
            'user_id' => Auth::user()->id,
            'essay_question_id' => $this->id_quest
        ],
        [
            'uuid' => Uuid::uuid4()->toString(),
            'essay_question_id' => $this->question->id,
            'user_id' => Auth::user()->id,
            'answer' => $this->answer
        ]);
    }

    public function render()
    {
        return view('livewire.exam.essay-exam-id');
    }
}
