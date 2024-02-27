<?php

namespace App\Livewire\Exam;

use Request;
use App\Models\Exam;
use Livewire\Component;

class PreviewExam extends Component
{
    public $uuid;
    public $exam;

    public function mount()
    {
        $this->uuid = Request::segment(4);
        $this->exam = Exam::where('uuid', $this->uuid)->first();
    }

    public function render()
    {
        return view('livewire.exam.preview-exam');
    }
}
