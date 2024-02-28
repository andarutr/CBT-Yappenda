<?php

namespace App\Livewire\Exam;

use Request;
use Carbon\Carbon;
use App\Models\Exam;
use Livewire\Component;

class ExamList extends Component
{
    public $search;

    public function toExam($uuid)
    {
        return redirect('/user/ujian/pg/'.$uuid);
    }
    public function render()
    {
        $exams = Exam::where('exam_type', Request::segment(3))->get();
        $results = Exam::where('exam_type', Request::segment(3))
                            ->orWhereHas('lesson', function($query){
                                $query->where('name','like','%'.$this->search.'%');
                            })
                            ->orWhereHas('user', function($query){
                                $query->where('name','like','%'.$this->search.'%');
                            })
                            ->get();
        
        return view('livewire.exam.exam-list', [
            'exams' => $this->search ? $results : $exams
        ]);
    }
}
