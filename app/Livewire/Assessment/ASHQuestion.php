<?php

namespace App\Livewire\Assessment;

use Request;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\EssayQuestion;
use Livewire\Attributes\Validate;

class ASHQuestion extends Component
{
    public $uuid;
    public $exam;
    public $essay_question;
    #[Validate('required')]
    public $question;

    public $status_panel = 'pg';

    public function mount()
    {
        $this->uuid = Request::segment(5);
        $this->exam = Exam::where('uuid', $this->uuid)->first();
        $this->essay_question = EssayQuestion::where('exam_id', $this->exam->id)->get();
    }

    public function store_essay()
    {
        $this->status_panel = 'essay';
        $this->validate();

        EssayQuestion::create([
            'uuid' => Uuid::uuid4()->toString(),
            'exam_id' => $this->exam->id,
            'question' => $this->question
        ]);
        
        $this->reset('question');

        return redirect()->back()->with('success', 'Berhasil menambahkan soal essay!');
    }
    public function render()
    {
        return view('livewire.assessment.a-s-h-question');
    }
}
