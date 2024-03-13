<?php
namespace App\Helpers;

use Request;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use App\Models\PGAnswer;
use App\Models\Remedial;
use App\Models\ExamResult;
use App\Models\PGQuestion;
use App\Models\EssayAnswer;

class ScoreHelper
{
    public static function generateScore($user_id, $uuid)
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

        $a = round(100 / $count_pgq);
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
        
        // $b = 100/$count_esq;
        $nilai_essay = $count_esa*0.3;
        // dd($nilai_essay);
        $generate = ExamResult::where(['user_id' => $user_id, 'exam_id' => $exa->id])
                                ->update([
                                    'score' => $nilai_pg + $nilai_essay,
                                    'status' => 'Sudah dinilai'
                                ]);
        
        $remeds = $nilai_pg + $nilai_essay;

        if($remeds < 75)
        {
            Remedial::create([
                'uuid' => Uuid::uuid4()->toString(),
                'user_id' => $pga->user_id,
                'exam_id' => $exa->id,
                'date_exam' => now(),
                'is_end' => false,
                'status' => 'Belum dinilai'
            ]);
        }
        
        session()->flash('success', 'Berhasil generate nilai!');
    }
}