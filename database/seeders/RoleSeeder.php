<?php

namespace Database\Seeders;

use File;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/roles.json');
        $roles = json_decode($json);

        foreach($roles as $role){
            Role::create([
                "id" => $role->id,
                "roles" => $role->roles,
            ]);
        }
    }
}
