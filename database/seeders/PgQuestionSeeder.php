<?php

namespace Database\Seeders;

use File;
use Ramsey\Uuid\Uuid;
use App\Models\PGQuestion;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PgQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/pgquestions.json');
        $questions = json_decode($json);        

        foreach($questions as $quest){
            PGQuestion::create([
                'uuid' => Uuid::uuid4()->toString(),
                'exam_id' => $quest->exam_id,
                'question' => $quest->question,
                'option' => json_encode($quest->option),
                'correct' => $quest->correct
            ]);
        }
    }
}
