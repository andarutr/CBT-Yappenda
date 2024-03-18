<?php

namespace App\Livewire\Score;

use Livewire\Component;
use App\Models\Remedial;
use App\Helpers\ScoreHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class AsasRemedialScoreList extends Component
{
    // Jangan dihapus
    public $search;
    public $paginate = 8;

    public function toPgResult($user_id, $uuid)
    {
        return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/remedial/asas/pg/'.$user_id.'/'.$uuid);
    }

    public function toEssayResult($user_id, $uuid)
    {
        return redirect('/'.strtolower(Auth::user()->role->role).'/input-nilai/remedial/asas/essay/'.$user_id.'/'.$uuid);
    }

    public function generateScoreRemedial($user_id, $exam_id)
    {
        ScoreHelper::generateScoreRemedial($user_id, $exam_id);
    }

    public function render()
    {
        $exam = Remedial::whereHas('exam', function(Builder $query){
            $query->where(['exam_type' => 'ASAS', 'user_id' => Auth::user()->id]);
        })->orderBy('date_exam','desc')->paginate($this->paginate);
        
        $result = Remedial::whereHas('user', function(Builder $query){
            $query->where('name', 'like','%'.$this->search.'%');
        })->orderBy('date_exam','desc')->paginate($this->paginate);

        return view('livewire.score.asas-remedial-score-list', [
            'exam_results' => $this->search ? $result : $exam
        ]);
    }
}
