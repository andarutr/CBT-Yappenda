<?php

namespace Database\Seeders;

use File;
use Ramsey\Uuid\Uuid;
use App\Models\Rapor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RaporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/rapors.json');
        $rapors = json_decode($json);      

        foreach($rapors as $rapor){
            Rapor::create([
                'uuid' => Uuid::uuid4()->toString(),
                'user_id' => $rapor->user_id,
                'wali_kelas' => $rapor->wali_kelas,
                'exam_type' => $rapor->exam_type,
                'semester' => $rapor->semester,
                'th_ajaran' => $rapor->th_ajaran,
            ]);
        }
    }
}
