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

        return redirect('/admin/account')->with('success','Berhasil menambah akun!');
    }

    public static function update($data)
    {
        User::where('uuid', $data['uuid'])->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
        ]);

        return redirect('/admin/account')->with('success', 'Berhasil memperbarui akun!');
    }

    public static function destroy($data)
    {
        User::where('uuid', $data['uuid'])->delete();
        return redirect('/admin/account')->with('success', 'Berhasil menghapus akun!');
    }

    public static function updatePassword($data)
    {
        User::where('uuid', $data['uuid'])
                ->update([
                    'password' => \Hash::make($data['new_password'])
                ]);

        return redirect('/admin/account/reset-password')->with('success', 'Berhasil memperbarui akun '.$data['name']);
    }

    public static function updateRole($data)
    {
        User::where('uuid', $data['uuid'])
                ->update([
                    'role_id' => $data['role_id']
                ]);

        return session()->flash('success','Berhasil memperbarui role!');
    }

    public static function suspend($data)
    {
         User::where('uuid', $data['uuid'])
                ->update([
                    'role_id' => 13
                ]);

        $user = User::where('uuid', $data['uuid'])->first();

        return redirect()->to('/admin/account/suspend')->with('success', 'Berhasil suspend akun '.$user->name);
    }

    public static function unSuspend($data)
    {
         User::where('uuid', $data['uuid'])
                ->update([
                    'role_id' => 3
                ]);
                
        $user = User::where('uuid', $data['uuid'])->first();

        return redirect()->to('/admin/account/suspend')->with('success', 'Berhasil membatalkan suspend akun '.$user->name);
    }
}