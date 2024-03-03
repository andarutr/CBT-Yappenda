<?php

namespace Database\Seeders;

use File;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/users.json');
        $users = json_decode($json);

        foreach($users as $user){
            User::create([
                "uuid" => Uuid::uuid4()->toString(),
                "name" => $user->name,
                "email" => $user->email,
                "password" => \Hash::make('test1234'),
                "nis" => $user->nis,
                "nisn" => $user->nisn,
                "kelas" => $user->kelas,
                "fase" => $user->fase,
                "role_id" => $user->role_id
            ]);
        }
    }
}
