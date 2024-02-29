<?php

namespace Database\Seeders;

use File;
use Ramsey\Uuid\Uuid;
use App\Models\PGAnswer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PgAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/pganswers.json');
        $answers = json_decode($json); 

        foreach($answers as $answer){
            PGAnswer::create([
                'uuid' => Uuid::uuid4()->toString(),
                'user_id' => $answer->user_id,
                'pg_question_id' => $answer->pg_question_id,
                'answer' => $answer->answer,
                'correct' => $answer->correct
            ]);
        }
    }
}
