<?php

namespace Database\Seeders;

use File;
use Ramsey\Uuid\Uuid;
use App\Models\ExamResult;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/exresult.json');
        $results = json_decode($json);

        foreach($results as $result){
            ExamResult::create([
                'uuid' => Uuid::uuid4()->toString(),
                'user_id' => $result->user_id,
                'exam_id' => $result->exam_id,
                'date_exam' => $result->date_exam,
                'status' => $result->status
            ]);
        }
    }
}
