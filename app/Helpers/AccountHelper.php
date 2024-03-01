<?php
namespace App\Helpers;

use App\Models\User;
use Ramsey\Uuid\Uuid;

// Class Khusus ADMIN!
class AccountHelper
{
    public static function store($data)
    {
        User::create([
            "uuid" => Uuid::uuid4()->toString(),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => \Hash::make('test1234'),
            'role_id' => $data['role_id'],
        ]);
    }

    public static function update($data)
    {
        User::where('uuid', $data['uuid'])->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
        ]);
    }

    public static function destroy($data)
    {
        User::where('uuid', $data['uuid'])->delete();
    }

    public static function updatePassword($data)
    {
        User::where('uuid', $data['uuid'])
                ->update([
                    'password' => \Hash::make($data['new_password'])
                ]);
    }

    public static function updateRole($data)
    {
        User::where('uuid', $data['uuid'])
                ->update([
                    'role_id' => $data['role_id']
                ]);
    }

    public static function suspend($data)
    {
         User::where('uuid', $data['uuid'])
                ->update([
                    'role_id' => 13
                ]);
    }

    public static function unSuspend($data)
    {
         User::where('uuid', $data['uuid'])
                ->update([
                    'role_id' => 3
                ]);                
    }
}