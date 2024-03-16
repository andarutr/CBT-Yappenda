<?php

namespace App\Livewire\Exam;

use Request;
use Livewire\Component;
use App\Models\Remedial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class ShowRemedialResults extends Component
{
    // Jangan dihapus!
    public $exam_type;
    public $paginate = 8;

    public function mount()
    {
        $this->exam_type = Request::segment(4);
    }

    public function render()
    {
        $remedials = Remedial::where('user_id', Auth::user()->id)
                                ->whereHas('exam', function(Builder $query){
                                    $query->where('exam_type', $this->exam_type);
                                })->paginate($this->paginate);

        return view('livewire.exam.show-remedial-results', [
            'remedials' => $remedials
        ]);
    }
}
