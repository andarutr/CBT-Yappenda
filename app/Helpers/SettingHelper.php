<?php
namespace App\Helpers;

use Auth;
use App\Models\User;

class SettingHelper
{
    public static function updateProfile($data)
    {
        User::where('uuid', Auth::user()->uuid)
                ->update([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'nis' => $data['nis'],
                    'nisn' => $data['nisn'],
                    'kelas' => $data['kelas'],
                    'fase' => $data['fase'],
                    'picture' => $data['picture'],
                ]);
    }

    public static function updatePassword($data)
    {
         if(auth()->attempt(['email' => Auth::user()->email, 'password' => $data['old_password']]))
        {
            User::where('uuid', Auth::user()->uuid)
                ->update([
                    'password' => \Hash::make($data['new_password'])
                ]);
            toastr()->success('Berhasil memperbarui password!');    
        }else{
            toastr()->warning('Password salah!');    
        }
    }
}