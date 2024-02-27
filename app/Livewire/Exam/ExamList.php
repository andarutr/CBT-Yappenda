<?php

namespace App\Livewire\Exam;

use App\Models\Exam;
use Livewire\Component;

class ExamList extends Component
{
    public $exams;

    public function mount()
    {
        $this->exams = Exam::all();
    }

    public function toExam($uuid)
    {
        return redirect('/user/ujian/'.$uuid);
    }
    public function render()
    {
        return view('livewire.exam.exam-list');
    }
}
