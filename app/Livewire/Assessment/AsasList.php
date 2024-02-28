<?php

namespace App\Livewire\Assessment;

use App\Models\Exam;
use Livewire\Component;

class AsasList extends Component
{
    public $assessment;

    public function mount()
    {
        $this->assessment = Exam::where('exam_type','ASAS')->orderByDesc('id')->get();
    }

    public function render()
    {
        return view('livewire.assessment.asas-list');
    }
}
