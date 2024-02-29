<?php

namespace App\Livewire\Score;

use Request;
use App\Models\User;
use App\Models\Exam;
use Livewire\Component;
use App\Models\PGQuestion;
use App\Models\PGAnswer;

class AshScorePg extends Component
{
    public $uuid;
    public $exam;
    public $user;
    public $user_id;
    public $pgscore;
    public $pganswer;
    public $pgquestion;
    public $toEssayUrls;

    public function mount()
    {
        $this->user_id = Request::segment(5);
        $this->uuid = Request::segment(6);
        $this->exam = Exam::where('uuid', $this->uuid)->first();
        $this->user = User::where('id', $this->user_id)->first();
        $this->pgquestion = PGQuestion::where('exam_id', $this->exam->id)->get();
        $linktopgquest = PGQuestion::where('exam_id', $this->exam->id)->first();
        $this->pganswer = PGAnswer::where(['user_id' => $this->user_id])->get();
        $this->pgscore = PGAnswer::where(['user_id' => $this->user_id, 'correct' => true])->count();
        $this->toEssayUrls = $linktopgquest->uuid;
    }

    public function toEssayScore()
    {
        return redirect('/guru/input-nilai/ash/essay/'.$this->user_id.'/'.$this->toEssayUrls);
    }

    public function render()
    {
        return view('livewire.score.ash-score-pg');
    }
}
