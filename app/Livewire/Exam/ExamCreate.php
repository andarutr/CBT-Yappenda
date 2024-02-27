<?php

namespace App\Livewire\Exam;

use Request;
use Carbon\Carbon;
use App\Models\Exam;
use Livewire\Component;

class ExamCreate extends Component
{
    public $uuid;
    public $exam;

    public function mount()
    {
        $this->uuid = Request::segment(3);
        $this->exam = Exam::where('uuid', $this->uuid)->first();
    }

    public function render()
    {
        $now = Carbon::now();
        $end = Carbon::parse($this->exam->end_time);  
        if($now > $end){
            dd('Waktu Habis!');
        }else{
            return view('livewire.exam.exam-create');
        }
    }
}
