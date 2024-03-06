<?php

namespace App\Livewire\Exam;

use Auth;
use Request;
use Livewire\Component;
use App\Models\ExamResult;
use Illuminate\Database\Eloquent\Builder;

class ShowExamResults extends Component
{
    // Jangan dihapus!
    public $exam_type;
    public $paginate = 8;

    public function mount()
    {
        $this->exam_type = Request::segment(3);
    }

    public function render()
    {
        $exam_results = ExamResult::where('user_id', Auth::user()->id)
                                            ->whereHas('exam', function(Builder $query){
                                                $query->where('exam_type', $this->exam_type);
                                            })->paginate($this->paginate);

        return view('livewire.exam.show-exam-results', [
            'exam_results' => $exam_results
        ]);
    }
}
