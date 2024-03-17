<?php

namespace Database\Seeders;

use File;
use Ramsey\Uuid\Uuid;
use App\Models\AshPurpose;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AshPurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/ashpurposes.json');
        $purposes = json_decode($json);

        foreach($purposes as $purpose){
            AshPurpose::create([
                'uuid' => Uuid::uuid4()->toString(),
                'title' => $purpose->title,
                'tp_1' => $purpose->tp_1,
                'tp_2' => $purpose->tp_2,
                'tp_3' => $purpose->tp_3,
                'tp_4' => $purpose->tp_4,
                'tp_5' => $purpose->tp_5,
                'tp_6' => $purpose->tp_6,
                'tp_7' => $purpose->tp_7,
                'tp_8' => $purpose->tp_8,
            ]);
        }
    }
}
