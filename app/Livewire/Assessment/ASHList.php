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
        $this->assessment = Exam::orderByDesc('id')->get();
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
