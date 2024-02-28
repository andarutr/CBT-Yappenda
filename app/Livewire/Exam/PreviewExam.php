<?php

namespace App\Livewire\Exam;

use Auth;
use Request;
use App\Models\Exam;
use Livewire\Component;
use App\Models\PGQuestion;
use App\Models\EssayAnswer;
use App\Models\EssayQuestion;

class PreviewExam extends Component
{
    public $uuid;
    public $exam;
    public $pg_question;
    public $essay_question;
    public $essay_answer;

    public function mount()
    {
        $this->uuid = Request::segment(4);
        $this->exam = Exam::where('uuid', $this->uuid)->first();

        $this->pg_question = PGQuestion::where('exam_id', $this->exam->id)->get(); 
        $this->essay_question = EssayQuestion::where('exam_id', $this->exam->id)->get(); 
        $answer = EssayQuestion::where('exam_id', $this->exam->id)->first();
        $this->essay_answer = EssayAnswer::where(['user_id' => Auth::user()->id])->get();
    }

    public function render()
    {
        return view('livewire.exam.preview-exam');
    }
}
