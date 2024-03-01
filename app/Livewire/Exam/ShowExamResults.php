<?php

namespace App\Livewire\Exam;

use Auth;
use Request;
use Livewire\Component;
use App\Models\ExamResult;
use Illuminate\Database\Eloquent\Builder;

class ShowExamResults extends Component
{
    public $exam_type;
    public $exam_results;

    public function mount()
    {
        $this->exam_type = Request::segment(3);
        $this->exam_results = ExamResult::where('user_id', Auth::user()->id)
                                            ->whereHas('exam', function(Builder $query){
                                                $query->where('exam_type', $this->exam_type);
                                            })->get();
    }

    public function render()
    {
        return view('livewire.exam.show-exam-results');
    }
}
