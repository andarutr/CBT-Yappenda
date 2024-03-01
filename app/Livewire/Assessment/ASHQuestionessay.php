<?php

namespace App\Livewire\Assessment;

use Request;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\EssayQuestion;
use Livewire\Attributes\Validate;
use App\Helpers\AssessmentHelper;

class ASHQuestionessay extends Component
{
    public $uuid;
    public $exam;
    #[Validate('required')]
    public $question;

    public function mount()
    {
        $this->uuid = Request::segment(6);
        $this->exam = Exam::where('uuid', $this->uuid)->first();
    }

    public function store_essay()
    {
        $this->validate();

        $data = [
            'exam_id' => $this->exam->id,
            'question' => $this->question
        ];

        $store = AssessmentHelper::storeEsQuestion($data);
        
        $this->reset('question');

        return redirect()->back()->with('success', 'Berhasil menambahkan soal essay!');
    }
    
    public function render()
    {
        return view('livewire.assessment.a-s-h-questionessay');
    }
}
