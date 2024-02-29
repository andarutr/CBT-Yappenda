<?php

namespace App\Livewire\Score;

use Request;
use App\Models\User;
use App\Models\Exam;
use Livewire\Component;
use App\Models\EssayAnswer;
use App\Models\EssayQuestion;

class AshScoreEssay extends Component
{
    public $uuid;
    public $exam;
    public $question;
    public $essay;
    public $user;
    public $user_id;
    public $essay_question;
    public $count;

    public function mount()
    {
        $this->user_id = Request::segment(5);
        $this->uuid = Request::segment(6);
        $this->user = User::where('id', $this->user_id)->first();
        $this->exam = Exam::where('uuid', $this->uuid)->first();
        $this->essay_question = EssayQuestion::where('exam_id', $this->exam->id)->get();
        $this->essay = EssayAnswer::where(['user_id' => $this->user_id])->get();
    }

    public function addScoreEssay($uuid)
    {
        return redirect('/guru/input-nilai/ash/nilai-essay/'.$uuid);
    }

    public function render()
    {
        return view('livewire.score.ash-score-essay');
    }
}
