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
use App\Models\EssayQuestion;
use App\Models\PgRemedialAnswer;
use App\Models\EssayRemedialAnswer;
use Illuminate\Database\Eloquent\Builder;

class ScoreHelper
{
    // Perhitungan Nilai Ujian
    public static function generateScore($user_id, $exam_id)
    {
        $count_pgq = PGQuestion::where('exam_id', $exam_id)->count();
        $count_pga = PGAnswer::where(['user_id' => $user_id, 'correct' => true])
                                ->whereHas('pgQuestion', function(Builder $query) use ($exam_id){
                                    $query->where('exam_id', $exam_id);
                                })->sum('correct');

        $a = round(100 / $count_pgq);
        $nilai_pg = ($count_pga*$a)*0.7;

        // Essay TIme
        $count_esq = EssayQuestion::where('exam_id', $exam_id)->count();
        $count_esa = EssayAnswer::where(['user_id' => $user_id])
                                ->whereHas('esQuestion', function(Builder $query) use ($exam_id){
                                    $query->where('exam_id', $exam_id);
                                })->sum('score');
        
        // $b = 100/$count_esq;
        $nilai_essay = $count_esa*0.3;
        $generate = ExamResult::where(['user_id' => $user_id, 'exam_id' => $exam_id])
                                ->update([
                                    'score' => $nilai_pg + $nilai_essay,
                                    'status' => 'Sudah dinilai'
                                ]);
        
        $remeds = $nilai_pg + $nilai_essay;

        if($remeds < 75)
        {
            Remedial::updateOrCreate([
                'user_id' => $user_id,
                'exam_id' => $exam_id,
            ],[
                'uuid' => Uuid::uuid4()->toString(),
                'user_id' => $user_id,
                'exam_id' => $exam_id,
                'date_exam' => now(),
                'is_end' => false,
                'status' => 'Belum dinilai'
            ]);
        }
        
        session()->flash('success', 'Berhasil generate nilai!');
    }

    // Perhitungan Nilai Remedial
    public static function generateScoreRemedial($user_id, $exam_id)
    {
        $count_pgq = PGQuestion::where('exam_id', $exam_id)->count();
        $count_pga = PgRemedialAnswer::where(['user_id' => $user_id, 'correct' => true])
                                ->whereHas('pgQuestion', function(Builder $query) use ($exam_id){
                                    $query->where('exam_id', $exam_id);
                                })->sum('correct');

        $a = round(100 / $count_pgq);
        $nilai_pg = ($count_pga*$a)*0.7;

        // Essay TIme
        $count_esq = EssayQuestion::where('exam_id', $exam_id)->count();
        $count_esa = EssayRemedialAnswer::where(['user_id' => $user_id])
                                ->whereHas('esQuestion', function(Builder $query) use ($exam_id){
                                    $query->where('exam_id', $exam_id);
                                })->sum('score');
        
        // $b = 100/$count_esq;
        $nilai_essay = $count_esa*0.3;
        // dd($nilai_essay);
        $generate = Remedial::where(['user_id' => $user_id, 'exam_id' => $exam_id])
                                ->update([
                                    'score' => $nilai_pg + $nilai_essay,
                                    'status' => 'Sudah dinilai'
                                ]);
        
        session()->flash('success', 'Berhasil generate nilai!');
    }
}