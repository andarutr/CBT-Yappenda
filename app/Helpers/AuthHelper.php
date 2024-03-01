<?php
namespace App\Helpers;

use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Mail;

class AuthHelper
{
    public static function login($email, $password)
    {
        if(auth()->attempt(['email' => $email, 'password' => $password])){
            if(auth()->user()->role->role === 'Admin'){
                return redirect()->to('/admin/dashboard');
            }elseif(auth()->user()->role->role === 'Guru'){
                return redirect()->to('/guru/dashboard');
            }elseif(auth()->user()->role->role === 'User'){
                return redirect()->to('/user/dashboard');
            }else{
                abort(403);
            }
        }else{
            return session()->flash('failed','Email dan password salah!');
        }
    }

    public static function forgotPassword($email)
    {
        $user = User::where('email', $email)->first();

        if($user)
        {
            $uuid = Uuid::uuid4()->toString();

            $data = [
                'name' => $user->name,
                'tokens' => $uuid
            ];
            
            \DB::table('reset_password')->insert([
                'email' => $email,
                'tokens' => $uuid
            ]);
            
            Mail::to($email)->send(new ResetPasswordMail($data));
            session()->flash('success', 'Silahkan periksa email kamu ya!');
        }else{
            session()->flash('failed', 'Email kamu tidak terdaftar!');
        }
    }
}