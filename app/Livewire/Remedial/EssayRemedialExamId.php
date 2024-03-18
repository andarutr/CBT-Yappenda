<?php

namespace App\Livewire\Remedial;

use Request;

use Carbon\Carbon;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\Remedial;
use App\Models\ExamResult;
use App\Models\PGQuestion;
use App\Models\EssayQuestion;
use App\Models\EssayRemedialAnswer;
use Illuminate\Support\Facades\Auth;

class EssayRemedialExamId extends Component
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

        $fulled = EssayRemedialAnswer::where(['user_id' => Auth::user()->id, 'essay_question_id' => $this->id_quest])->first();

        if($fulled){
            $this->answer = $fulled->answer;
        }
    }

    public function store()
    {
        EssayRemedialAnswer::updateOrCreate([
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
        
        toastr()->success('Selamat anda telah menyelesaikan remedial!');

        return redirect('/user/remedial/'.strtolower($this->exam->exam_type));
    }

    public function render()
    {
        $now = Carbon::now();
        $end = Carbon::parse($this->exam->end_time);  
        if($now > $end){
            return view('end_exam');
        }else{
            return view('livewire.remedial.essay-remedial-exam-id');
        }
    }
}
