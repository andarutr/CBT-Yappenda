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
                "id" => Uuid::uuid4(),
                "name" => $user->name,
                "email" => $user->email,
                "password" => \Hash::make('test1234'),
                "roleId" => $user->roleId
            ]);
        }
    }
}
