<?php

namespace App\Livewire\Score;

use App\Models\Exam;
use Livewire\Component;
use App\Models\PGAnswer;
use App\Models\PGQuestion;
use App\Models\ExamResult;
use App\Models\EssayAnswer;
use App\Models\EssayQuestion;

class AshScoreList extends Component
{
    public $exam_results;

    public function mount()
    {
        $this->exam_results = ExamResult::orderBy('date_exam','desc')->get();
    }

    public function toPgResult($user_id, $uuid)
    {
        return redirect('/guru/input-nilai/ash/pg/'.$user_id.'/'.$uuid);
    }

    public function toEssayResult($user_id, $uuid)
    {
        return redirect('/guru/input-nilai/ash/essay/'.$user_id.'/'.$uuid);
    }

    public function toResult($user_id, $uuid)
    {
        $pga = PGAnswer::where('user_id', $user_id)->first();
        $pgq = PGQuestion::where('id', $pga->pg_question_id)->first();
        $exa = Exam::where('id', $pgq->exam_id)->first();

        $count_pgq = PGAnswer::where(['user_id' => $user_id])
                                ->whereHas('pgQuestion', function($query) use ($exa){
                                    $exa->where('uuid', $exa->uuid);
                                })->count();

        $count_pga = PGAnswer::where(['user_id' => $user_id, 'correct' => true])
                                ->whereHas('pgQuestion', function($query) use ($exa){
                                    $exa->where('uuid', $exa->uuid);
                                })->count();

        $a = 100 / $count_pgq;
        $nilai_pg = ($count_pga*$a)*0.7;
        // dd($nilai_pg);
        // Essay TIme
        $count_esq = EssayAnswer::where(['user_id' => $user_id])
                                ->whereHas('esQuestion', function($query) use ($exa){
                                    $exa->where('uuid', $exa->uuid);
                                })->count();

        $count_esa = EssayAnswer::where(['user_id' => $user_id])
                                ->whereHas('esQuestion', function($query) use ($exa){
                                    $exa->where('uuid', $exa->uuid);
                                })->sum('score');
        
        $b = round(100 / $count_esq);
        $nilai_essay = $count_esa*0.3;

        dd($nilai_essay+$nilai_pg);
    }

    public function render()
    {
        return view('livewire.score.ash-score-list');
    }
}
