<?php

namespace App\Livewire\Exam;

use Request;
use Carbon\Carbon;
use App\Models\Exam;
use Livewire\Component;
use App\Models\PGQuestion;
use App\Models\EssayQuestion;
use Illuminate\Support\Collection;

class PgExam extends Component
{
    public $uuid;
    public $exam;
    public $answer;
    public $box_question;
    public $box_question_essay;

    public function mount()
    {
        $this->uuid = Request::segment(4);
        $this->exam = Exam::where('uuid', $this->uuid)->first();

        $this->box_question = PGQuestion::where('exam_id', $this->exam->id)->get();
        $this->box_question_essay = EssayQuestion::where('exam_id', $this->exam->id)->get();
    }

    public function render()
    {
        $now = Carbon::now();
        $end = Carbon::parse($this->exam->end_time);  
        if($now > $end){
            return view('end_exam');
        }else{
            return view('livewire.exam.pg-exam');
        }
    }
}
