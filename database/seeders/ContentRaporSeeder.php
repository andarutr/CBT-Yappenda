<?php

namespace Database\Seeders;

use File;
use Ramsey\Uuid\Uuid;
use App\Models\ContentRapor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContentRaporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/contentrapors.json');
        $rapors = json_decode($json);

        foreach($rapors as $rapor){
            ContentRapor::create([
                'uuid' => Uuid::uuid4()->toString(),
                'rapor_id' => $rapor->rapor_id,
                'exam_id' => $rapor->exam_id,
                'nilai' => $rapor->nilai,
                'description' => $rapor->description,
            ]);
        }
    }
}
