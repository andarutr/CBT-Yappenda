<?php

namespace Database\Seeders;

use File;
use Ramsey\Uuid\Uuid;
use App\Models\EssayQuestion;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EsQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/esquestions.json');
        $questions = json_decode($json);

        foreach($questions as $quest){
            EssayQuestion::create([
                'uuid' => Uuid::uuid4()->toString(),
                'exam_id' => $quest->exam_id,
                'question' => $quest->question
            ]);
        }
        
    }
}
