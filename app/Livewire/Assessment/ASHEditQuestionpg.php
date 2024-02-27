<?php

namespace App\Livewire\Assessment;

use Request;
use App\models\Exam;
use Livewire\Component;
use App\models\PGQuestion;

class ASHEditQuestionpg extends Component
{
    public $uuid;
    public $question; 
    public $pgquestion;
    public $option = [];
    public $correct;
    public $jsonData = [];
    public $redirect_url;

    public function mount()
    {
        $this->uuid = Request::segment(6);
        $this->question = PGQuestion::where('uuid', $this->uuid)->first();
        $this->jsonData = json_decode($this->question->option);

        $this->pgquestion = $this->question->pgquestion;
        $this->correct = $this->question->correct;

        $redirect = Exam::where('id', $this->question->exam_id)->first();
        $this->redirect_url = '/guru/assessment/ash/input-soal/pg/'.$redirect->uuid;
    }

    public function render()
    {
        return view('livewire.assessment.a-s-h-edit-questionpg');
    }
}
