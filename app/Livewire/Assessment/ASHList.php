<?php

namespace App\Livewire\Assessment;

use Auth;
use Request;
use App\Models\Exam;
use Livewire\Component;
use App\Helpers\AssessmentHelper;

class ASHList extends Component
{
    public $assessment;

    public function mount()
    {
        $this->assessment = Exam::where('exam_type','ASH')->orderByDesc('start_time')->get();
    }

    public function destroy($uuid)
    {
       $destroy = AssessmentHelper::destroyExam($uuid);

        return redirect('/'.strtolower(Auth::user()->role->role).'/assessment/ash')->with('success','Berhasil menghapus Assessment!');
    }

    public function render()
    {
        return view('livewire.assessment.a-s-h-list');
    }
}
