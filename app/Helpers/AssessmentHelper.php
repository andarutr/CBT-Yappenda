<?php
namespace App\Helpers;

use Auth;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
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
            'duration' => $data['duration']*60,
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
        ]);
    }

    public static function storeEsQuestion($data)
    {
        EssayQuestion::create([
            'uuid' => Uuid::uuid4()->toString(),
            'exam_id' => $data['exam_id'],
            'question' => $data['question']
        ]);
    }

    public static function updateEsQuestion($data)
    {
        EssayQuestion::where('uuid', $data['uuid'])
                        ->update([
                            'question' => $data['question']
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
}