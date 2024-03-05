<?php
namespace App\Helpers;

use Auth;
use Request;
use Ramsey\Uuid\Uuid;
use App\Models\Lesson;

class LessonHelper
{
    public static function store($name)
    {
        Lesson::create([
            'uuid' => Uuid::uuid4()->toString(),
            'name' => $name
        ]);

        return redirect('/'.strtolower(Auth::user()->role->role).'/mata-pelajaran')->with('success','Berhasil tambah mata pelajaran!');
    }

    public static function update($data)
    {
        Lesson::where('uuid', $data['uuid'])
                ->update([
                    'name' => $data['name']
                ]);
        
        return redirect('/'.strtolower(Auth::user()->role->role).'/mata-pelajaran')->with('success', 'Berhasil memperbarui mata pelajaran!');
    }

    public static function destroy($uuid)
    {
        Lesson::where('uuid', $uuid)->delete();
        
        return redirect('/'.strtolower(Auth::user()->role->role).'/mata-pelajaran')->with('success', 'Berhasil menghapus mata pelajaran');
    }
}