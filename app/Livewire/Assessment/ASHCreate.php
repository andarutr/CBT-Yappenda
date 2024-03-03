<?php

namespace App\Livewire\Assessment;

use Request;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use App\Models\Lesson;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Helpers\AssessmentHelper;
use Illuminate\Support\Facades\Auth;

class ASHCreate extends Component
{
    public $lessons;
    #[Validate('required')]
    public $lesson_id;
    #[Validate('required')]
    public $exam_type;
    #[Validate('required')]
    public $grade;
    #[Validate('required')]
    public $major;
    #[Validate('required')]
    public $semester;
    #[Validate('required')]
    public $th_ajaran;
    #[Validate('required')]
    public $duration;
    #[Validate('required')]
    public $start_time;
    #[Validate('required')]
    public $end_time;

    public function mount()
    {
        $this->lessons = Lesson::all();
    }

    public function store()
    {
        $this->validate();

        $data = [
            'lesson_id' => $this->lesson_id,
            'exam_type' => $this->exam_type,
            'grade' => $this->grade,
            'major' => $this->major,
            'semester' => $this->semester,
            'th_ajaran' => $this->th_ajaran,
            'duration' => $this->duration,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ];
        
        $store = AssessmentHelper::store($data);

        return redirect('/'.strtolower(Auth::user()->role->role).'/assessment/'.strtolower($this->exam_type))->with('success', 'Berhasil menambah Assessment!');
    }
    
    public function render()
    {
        return view('livewire.assessment.a-s-h-create');
    }
}
