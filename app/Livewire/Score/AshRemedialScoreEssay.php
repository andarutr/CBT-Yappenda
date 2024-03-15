<?php

namespace App\Livewire\Score;

use Request;
use App\Models\Exam;
use App\Models\User;
use Livewire\Component;
use App\Models\EssayQuestion;
use App\Models\EssayRemedialAnswer;
use Illuminate\Support\Facades\Auth;

class AshRemedialScoreEssay extends Component
{
    public $uuid;
    public $exam;
    public $question;
    public $essay;
    public $user;
    public $user_id;
    public $essay_question;
    public $count;
    public $exam_type;

    public function mount()
    {
        $this->user_id = Request::segment(6);
        $this->uuid = Request::segment(7);
        $this->exam_type = Request::segment(4);
        $this->user = User::where('id', $this->user_id)->first();
        $this->exam = Exam::where('uuid', $this->uuid)->first();
        $this->essay_question = EssayQuestion::where('exam_id', $this->exam->id)->get();
        $this->essay = EssayRemedialAnswer::where(['user_id' => $this->user_id])->get();
    }

    public function addScoreEssay($uuid)
    {
        return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/remedial/'.$this->exam_type.'/nilai-essay/'.$uuid);
    }
    
    public function render()
    {
        return view('livewire.score.ash-remedial-score-essay');
    }
}
