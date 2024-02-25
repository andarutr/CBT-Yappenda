<?php

namespace Database\Seeders;

use File;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/exams.json');
        $exams = json_decode($json);

        foreach($exams as $exam){
            Exam::create([
                'uuid' => Uuid::uuid4()->toString(),
                'user_id' => $exam->user_id,
                'lesson_id' => $exam->lesson_id,
                'exam_type' => $exam->exam_type,
                'grade' => $exam->grade,
                'major' => $exam->major,
                'duration' => $exam->duration,
                'start_time' => $exam->start_time,
                'end_time' => $exam->end_time
            ]);
        }
    }
}
