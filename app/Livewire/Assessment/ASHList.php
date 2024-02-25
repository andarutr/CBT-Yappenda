<?php

namespace App\Livewire\Assessment;

use Request;
use App\Models\Exam;
use Livewire\Component;

class ASHList extends Component
{
    public $assessment;

    public function mount()
    {
        $exams = \DB::table('exams')
                    ->join('lessons','lessons.id','=','exams.lesson_id')
                    ->join('users','users.id','=','exams.user_id')
                    ->select('users.name as guru','exams.*','lessons.name as mata_pelajaran')
                    ->get();

        $this->assessment = $exams;
    }

    public function destroy($uuid)
    {
        Exam::where('uuid', $uuid)->delete();

        return redirect('/'.Request::segment(1).'/assessment/ash')->with('success','Berhasil menghapus ASH!');
    }

    public function render()
    {
        return view('livewire.assessment.a-s-h-list');
    }
}
