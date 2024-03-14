<?php

namespace App\Livewire\Exam;

use Auth;
use Request;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\Remedial;
use App\Models\ExamResult;
use App\Models\PGQuestion;
use App\Models\EssayAnswer;
use App\Models\EssayQuestion;

class EssayExamId extends Component
{
    public $uuid;
    public $exam;
    public $answer;
    public $id_quest;
    public $picture;
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
        $this->picture = $this->question->picture;
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

        toastr()->success('Jawaban tersimpan!');
    }

    public function endExam()
    {
        $remed = Remedial::where(['user_id' => Auth::user()->id, 'exam_id' => $this->exam->id])->exists();
        
        if($remed){
            Remedial::where(['exam_id' => $this->exam->id, 'user_id' => Auth::user()->id])
                        ->updateOrCreate([
                            'exam_id' => $this->exam->id, 
                            'user_id' => Auth::user()->id
                        ],[
                            'is_end' => true
                        ]);
        }else{
            ExamResult::where(['exam_id' => $this->exam->id, 'user_id' => Auth::user()->id])
                        ->updateOrCreate([
                            'exam_id' => $this->exam->id, 
                            'user_id' => Auth::user()->id
                        ],[
                            'is_end' => true
                        ]);
        }
        
        toastr()->success('Selamat anda telah menyelesaikan ujian!');

        return redirect('/user/ujian/'.strtolower($this->exam->exam_type));
    }

    public function render()
    {
        return view('livewire.exam.essay-exam-id');
    }
}
