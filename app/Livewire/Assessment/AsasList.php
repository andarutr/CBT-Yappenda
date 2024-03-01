<?php

namespace App\Livewire\Assessment;

use Auth;
use App\Models\Exam;
use Livewire\Component;
use App\Helpers\AssessmentHelper;

class AsasList extends Component
{
    public $assessment;

    public function mount()
    {
        $this->assessment = Exam::where('exam_type','ASAS')->orderByDesc('id')->get();
    }

    public function destroy($uuid)
    {
       $destroy = AssessmentHelper::destroyExam($uuid);

        return redirect('/'.strtolower(Auth::user()->role->role).'/assessment/asas')->with('success','Berhasil menghapus Assessment!');
    }

    public function render()
    {
        return view('livewire.assessment.asas-list');
    }
}
