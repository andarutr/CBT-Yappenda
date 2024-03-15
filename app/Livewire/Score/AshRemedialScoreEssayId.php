<?php

namespace App\Livewire\Score;

use Request;
use App\Models\Exam;
use Livewire\Component;
use App\Models\EssayQuestion;
use App\Models\EssayRemedialAnswer;
use Illuminate\Support\Facades\Auth;

class AshRemedialScoreEssayId extends Component
{
    public $uuid;
    public $score;
    public $backToUrl;
    public $essay_answer;

    public function mount()
    {
        $this->uuid = Request::segment(6);
        $this->essay_answer = EssayRemedialAnswer::where('uuid', $this->uuid)->first();
        $essay_question = EssayQuestion::where('id', $this->essay_answer->essay_question_id)->first();
        $exam = Exam::where('id', $essay_question->exam_id)->first();
        $this->backToUrl = $exam->uuid;
        $this->score = $this->essay_answer->score;
    }

    public function update()
    {
        EssayRemedialAnswer::where('uuid', $this->uuid)
            ->update([
                'score' => $this->score
            ]);

        $essay_question = EssayQuestion::where('id', $this->essay_answer->essay_question_id)->first();
        $exam = Exam::where('id', $essay_question->exam_id)->first();

        toastr()->success('Berhasil menilai essay!');

        return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/remedial/'.strtolower($exam->exam_type).'/essay/'.$this->essay_answer->user_id.'/'.$this->backToUrl);
    }

    public function render()
    {
        return view('livewire.score.ash-remedial-score-essay-id');
    }
}
