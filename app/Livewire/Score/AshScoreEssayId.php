<?php

namespace App\Livewire\Score;

use Request;
use App\Models\Exam;
use App\Models\EssayAnswer;
use App\Models\EssayQuestion;
use Livewire\Component;

class AshScoreEssayId extends Component
{
    public $uuid;
    public $score;
    public $backToUrl;
    public $essay_answer;

    public function mount()
    {
        $this->uuid = Request::segment(5);
        $this->essay_answer = EssayAnswer::where('uuid', $this->uuid)->first();
        $essay_question = EssayQuestion::where('id', $this->essay_answer->essay_question_id)->first();
        $exam = Exam::where('id', $essay_question->exam_id)->first();
        $this->backToUrl = $exam->uuid;
        $this->score = $this->essay_answer->score;
    }

    public function update()
    {
        try{

        EssayAnswer::where('uuid', $this->uuid)
            ->update([
                'score' => $this->score
            ]);
        }catch (\Exception $e) {
            dd($e->getMessage());
        }

        return redirect('/guru/input-nilai/ash/essay/'.$this->essay_answer->user_id.'/'.$this->backToUrl);
    }

    public function render()
    {
        return view('livewire.score.ash-score-essay-id');
    }
}
