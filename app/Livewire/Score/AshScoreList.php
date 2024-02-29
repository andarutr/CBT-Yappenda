<?php

namespace App\Livewire\Score;

use Livewire\Component;
use App\Models\ExamResult;

class AshScoreList extends Component
{
    public $exam_results;

    public function mount()
    {
        $this->exam_results = ExamResult::orderBy('date_exam','desc')->get();
    }

    public function toExamResult($user_id, $uuid)
    {
        return redirect('/guru/input-nilai/ash/'.$user_id.'/'.$uuid);
    }

    public function render()
    {
        return view('livewire.score.ash-score-list');
    }
}
