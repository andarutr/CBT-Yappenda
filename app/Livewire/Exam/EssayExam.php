<?php

namespace App\Livewire\Exam;

use Auth;
use Request;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\EssayAnswer;
use App\Models\EssayQuestion;
use Livewire\Attributes\Validate;

class EssayExam extends Component
{
    public $uuid;
    public $exam;
    public $question;
    #[Validate('required')] 
    public $answer;

    public function mount()
    {
        $this->uuid = Request::segment(4);
        $this->exam = Exam::where('uuid', $this->uuid)->first();

        $essay = EssayQuestion::where('id', $this->exam->id)->first();
        $this->question = $essay->question;
    }

    public function store()
    {
        $this->validate();

        $essay = EssayQuestion::where('id', $this->exam->id)->first();
        EssayAnswer::create([
            'uuid' => Uuid::uuid4()->toString(),
            'user_id' => Auth::user()->id,
            'essay_question_id' => $essay->id,
            'answer' => $this->answer
        ]);

        $this->reset('answer');

        return redirect()->back()->with('success','Berhasil menjawab essay!');
    }

    public function render()
    {
        return view('livewire.exam.essay-exam');
    }
}
