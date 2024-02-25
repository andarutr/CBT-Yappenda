<?php

namespace Database\Seeders;

use File;
use Ramsey\Uuid\Uuid;
use App\Models\Lesson;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/lessons.json');
        $lessons = json_decode($json);

        foreach($lessons as $lesson){
            Lesson::create([
                'uuid' => Uuid::uuid4()->toString(),
                'name' => $lesson->name
            ]);
        }
    }
}
