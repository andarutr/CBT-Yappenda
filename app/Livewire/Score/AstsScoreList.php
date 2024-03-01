<?php

namespace App\Livewire\Score;

use Auth;
use Livewire\Component;
use App\Models\ExamResult;
use App\Helpers\ScoreHelper;
use Illuminate\Database\Eloquent\Builder;

class AstsScoreList extends Component
{
    public $exam_results;

    public function mount()
    {
        $this->exam_results = ExamResult::whereHas('exam', function(Builder $query){
            $query->where('exam_type', 'ASTS');
        })->orderBy('date_exam','desc')->get();
    }

    public function toPgResult($user_id, $uuid)
    {
        return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/asts/pg/'.$user_id.'/'.$uuid);
    }

    public function toEssayResult($user_id, $uuid)
    {
        return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/asts/essay/'.$user_id.'/'.$uuid);
    }

    public function generateScore($user_id, $uuid)
    {
        ScoreHelper::generateScore($user_id, $uuid);
    }

    public function render()
    {
        return view('livewire.score.asts-score-list');
    }
}
