<?php

namespace App\Livewire\Score;

use Auth;
use Livewire\Component;
use App\Models\ExamResult;
use App\Helpers\ScoreHelper;
use Illuminate\Database\Eloquent\Builder;

class AstsScoreList extends Component
{
    // Jangan dihapus
    public $search;
    public $paginate = 8;

    public function toPgResult($user_id, $uuid)
    {
        return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/asts/pg/'.$user_id.'/'.$uuid);
    }

    public function toEssayResult($user_id, $uuid)
    {
        return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/asts/essay/'.$user_id.'/'.$uuid);
    }

    public function generateScore($user_id, $exam_id)
    {
        ScoreHelper::generateScore($user_id, $exam_id);
    }

    public function render()
    {
        $exam = ExamResult::whereHas('exam', function(Builder $query){
            $query->where('exam_type', 'ASTS');
        })->orderBy('date_exam','desc')->paginate($this->paginate);
        
        $result = ExamResult::whereHas('user', function(Builder $query){
            $query->where('name', 'like','%'.$this->search.'%');
        })->orderBy('date_exam','desc')->paginate($this->paginate);

        return view('livewire.score.asts-score-list', [
            'exam_results' => $this->search ? $result : $exam
        ]);
    }
}
