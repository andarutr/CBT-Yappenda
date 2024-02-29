<?php

namespace Database\Seeders;

use File;
use Ramsey\Uuid\Uuid;
use App\Models\EssayAnswer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EsAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/esanswers.json');
        $answers = json_decode($json); 

        foreach($answers as $answer){
            EssayAnswer::create([
                'uuid' => Uuid::uuid4()->toString(),
                'user_id' => $answer->user_id,
                'essay_question_id' => $answer->essay_question_id,
                'answer' => $answer->answer
            ]);
        }
    }
}
