<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function index($tokens)
    {
        $reset = \DB::table('reset_password')->where('tokens', $tokens)->first();

        if($reset){
            $data['tokens'] = $reset->tokens;
            return view('reset_password', $data);
        }else{
            return 'Error';
        }
    }

    protected function update(Request $req, $tokens)
    {
        $this->validate($req, [
            'new_password' => 'required|min:8'
        ]);

        $reset = \DB::table('reset_password')->where('tokens', $tokens)->first();

        User::where('email', $reset->email)->update([
            'password' => \Hash::make($req->new_password)
        ]);

        $delete_tokens = \DB::table('reset_password')->where('tokens', $reset->tokens)->delete();

        return redirect('/login')->with('success', 'Berhasil memperbarui password!');
    }
}
