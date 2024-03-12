<?php
namespace App\Helpers;

use Auth;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use App\Models\AshResult;
use App\Models\AshPurpose;
use App\Models\PGQuestion;
use App\Models\EssayQuestion;

class AssessmentHelper 
{
    public static function store($data)
    {
        Exam::create([
            'uuid' => Uuid::uuid4()->toString(),
            'user_id' => Auth::user()->id,
            'lesson_id' => $data['lesson_id'],
            'exam_type' => $data['exam_type'],
            'grade' => $data['grade'],
            'major' => $data['major'],
            'semester' => $data['semester'],
            'th_ajaran' => $data['th_ajaran'],
            'duration' => $data['duration'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ]);
    }

    public static function update($data)
    {
        Exam::where('uuid', $data['uuid'])->update([
            'uuid' => Uuid::uuid4()->toString(),
            'exam_type' => $data['exam_type'],
            'grade' => $data['grade'],
            'major' => $data['major'],
            'semester' => $data['semester'],
            'th_ajaran' => $data['th_ajaran'],
            'duration' => $data['duration'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ]);
    }

    public static function storePgQuestion($data)
    {
        PGQuestion::create([
            'uuid' => Uuid::uuid4()->toString(),
            'exam_id' => $data['exam_id'],
            'pgquestion' => $data['pgquestion'],
            'option' => $data['option'],
            'correct' => $data['correct'],
            'picture' => $data['picture']
        ]);
    }

    public static function storeEsQuestion($data)
    {
        EssayQuestion::create([
            'uuid' => Uuid::uuid4()->toString(),
            'exam_id' => $data['exam_id'],
            'question' => $data['question'],
            'picture' => $data['picture']
        ]);
    }

    public static function storeAshPurpose($data)
    {
        AshPurpose::create([
            'uuid' => Uuid::uuid4()->toString(),
            'title' => $data['title'],
            'tp_1' => $data['tp_1'],
            'tp_2' => $data['tp_2'],
            'tp_3' => $data['tp_3'],
            'tp_4' => $data['tp_4'],
            'tp_5' => $data['tp_5'],
            'tp_6' => $data['tp_6'],
            'tp_7' => $data['tp_7'],
            'tp_8' => $data['tp_8'],
        ]);
    }

    public static function storeAshResultId($data)
    {
        $uuid = Uuid::uuid4()->toString();
        AshResult::create([
            'uuid' => $uuid,
            'user_id' => $data['user_id'],
            'lesson_id' => $data['lesson_id'],
            'ash_purpose_id' => $data['ash_purpose_id'],
            'tp_1' => $data['tp_1'],
            'tp_2' => $data['tp_2'],
            'tp_3' => $data['tp_3'],
            'tp_4' => $data['tp_4'],
            'tp_5' => $data['tp_5'],
            'tp_6' => $data['tp_6'],
            'tp_7' => $data['tp_7'],
            'tp_8' => $data['tp_8'],
        ]);

        $tp1 = AshResult::where('uuid', $uuid)->whereNotNull('tp_1')->exists();
        $tp2 = AshResult::where('uuid', $uuid)->whereNotNull('tp_2')->exists();
        $tp3 = AshResult::where('uuid', $uuid)->whereNotNull('tp_3')->exists();
        $tp4 = AshResult::where('uuid', $uuid)->whereNotNull('tp_4')->exists();
        $tp5 = AshResult::where('uuid', $uuid)->whereNotNull('tp_5')->exists();
        $tp6 = AshResult::where('uuid', $uuid)->whereNotNull('tp_6')->exists();
        $tp7 = AshResult::where('uuid', $uuid)->whereNotNull('tp_7')->exists();
        $tp8 = AshResult::where('uuid', $uuid)->whereNotNull('tp_8')->exists();
        
        $totally = AshResult::where('uuid', $uuid)->sum('tp_1') + AshResult::where('uuid', $uuid)->sum('tp_2') + AshResult::where('uuid', $uuid)->sum('tp_3') + AshResult::where('uuid', $uuid)->sum('tp_4') + AshResult::where('uuid', $uuid)->sum('tp_5') + AshResult::where('uuid', $uuid)->sum('tp_6') + AshResult::where('uuid', $uuid)->sum('tp_7') + AshResult::where('uuid', $uuid)->sum('tp_8');
        
        // Hitungan
        // tp_sum = total tp terisi
        // total = penjumlahan total nilai tp / total tp terisi
        $tp_sum = $tp1 + $tp2 + $tp3 + $tp4 + $tp5 + $tp6 + $tp7 + $tp8;
        $total = round($totally/$tp_sum);

        AshResult::where('uuid', $uuid)
                    ->update([
                        'total' => number_format($total, 0, '.', '')
                    ]);
    }

    public static function updateEsQuestion($data)
    {
        EssayQuestion::where('uuid', $data['uuid'])
                        ->update([
                            'question' => $data['question'],
                            'picture' => $data['picture']
                        ]);
    }

    public static function updateAshPurpose($data)
    {
        AshPurpose::where('uuid', $data['uuid'])->update([
            'title' => $data['title'],
            'tp_1' => $data['tp_1'],
            'tp_2' => $data['tp_2'],
            'tp_3' => $data['tp_3'],
            'tp_4' => $data['tp_4'],
            'tp_5' => $data['tp_5'],
            'tp_6' => $data['tp_6'],
            'tp_7' => $data['tp_7'],
            'tp_8' => $data['tp_8'],
        ]);
    }

    public static function updateAshResultId($data)
    {
        AshResult::where('uuid', $data['uuid'])
                    ->update([
                        'lesson_id' => $data['lesson_id'],
                        'ash_purpose_id' => $data['ash_purpose_id'],
                        'tp_1' => $data['tp_1'],
                        'tp_2' => $data['tp_2'],
                        'tp_3' => $data['tp_3'],
                        'tp_4' => $data['tp_4'],
                        'tp_5' => $data['tp_5'],
                        'tp_6' => $data['tp_6'],
                        'tp_7' => $data['tp_7'],
                        'tp_8' => $data['tp_8'],
                    ]);
                    
        $tp1 = AshResult::where('uuid', $data['uuid'])->whereNotNull('tp_1')->exists();
        $tp2 = AshResult::where('uuid', $data['uuid'])->whereNotNull('tp_2')->exists();
        $tp3 = AshResult::where('uuid', $data['uuid'])->whereNotNull('tp_3')->exists();
        $tp4 = AshResult::where('uuid', $data['uuid'])->whereNotNull('tp_4')->exists();
        $tp5 = AshResult::where('uuid', $data['uuid'])->whereNotNull('tp_5')->exists();
        $tp6 = AshResult::where('uuid', $data['uuid'])->whereNotNull('tp_6')->exists();
        $tp7 = AshResult::where('uuid', $data['uuid'])->whereNotNull('tp_7')->exists();
        $tp8 = AshResult::where('uuid', $data['uuid'])->whereNotNull('tp_8')->exists();
        
        $totally = AshResult::where('uuid', $data['uuid'])->sum('tp_1') + AshResult::where('uuid', $data['uuid'])->sum('tp_2') + AshResult::where('uuid', $data['uuid'])->sum('tp_3') + AshResult::where('uuid', $data['uuid'])->sum('tp_4') + AshResult::where('uuid', $data['uuid'])->sum('tp_5') + AshResult::where('uuid', $data['uuid'])->sum('tp_6') + AshResult::where('uuid', $data['uuid'])->sum('tp_7') + AshResult::where('uuid', $data['uuid'])->sum('tp_8');
        
        // Hitungan
        // tp_sum = total tp terisi
        // total = penjumlahan total nilai tp / total tp terisi
        $tp_sum = $tp1 + $tp2 + $tp3 + $tp4 + $tp5 + $tp6 + $tp7 + $tp8;
        $total = round($totally/$tp_sum);

        AshResult::where('uuid', $data['uuid'])
                    ->update([
                        'total' => number_format($total, 0, '.', '')
                    ]);
    }

    public static function destroyPg($id_quest)
    {
        PGQuestion::where('id', $id_quest)->delete();
    }

    public static function destroyEs($id_quest)
    {
        EssayQuestion::where('id', $id_quest)->delete();
    }

    public static function destroyExam($uuid)
    {
         Exam::where('uuid', $uuid)->delete();
    }

    public static function destroyAshPurpose($uuid)
    {
        AshPurpose::where('uuid', $uuid)->delete();
    }

    public static function destroyAshResultId($uuid)
    {
        AshResult::where('uuid', $uuid)->delete();
    }
}