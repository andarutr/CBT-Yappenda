<?php

namespace App\Livewire\Score;

use Request;
use App\Models\User;
use App\Models\Exam;
use Livewire\Component;
use App\Models\PGQuestion;
use App\Models\PGAnswer;

class AshScoreShow extends Component
{
    public $uuid;
    public $exam;
    public $user;
    public $pgscore;
    public $pganswer;
    public $pgquestion;

    public function mount()
    {
        $this->user = Request::segment(4);
        $this->uuid = Request::segment(5);
        $this->exam = Exam::where('uuid', $this->uuid)->first();
        $this->user = User::where('id', $this->user)->first();
        $this->pgquestion = PGQuestion::where('exam_id', $this->exam->id)->get();
        $linktopgquest = PGQuestion::where('exam_id', $this->exam->id)->first();
        $this->pganswer = PGAnswer::where(['user_id' => Request::segment(4)])->get();
        $this->pgscore = PGAnswer::where(['user_id' => Request::segment(4), 'correct' => true])->count();
    }

    public function render()
    {
        return view('livewire.score.ash-score-show');
    }
}
