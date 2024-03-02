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

class ASHUpdate extends Component
{
    public $uuid;
    public $exam;
    public $lessons;
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
        $this->uuid = Request::segment(5);
        $this->lessons = Lesson::all();
        $this->exam = Exam::where('uuid', $this->uuid)->first();

        $this->lesson_id = $this->exam->lesson->name;
        $this->exam_type = $this->exam->exam_type;
        $this->grade = $this->exam->grade;
        $this->major = $this->exam->major;
        $this->semester = $this->exam->semester;
        $this->th_ajaran = $this->exam->th_ajaran;
        $this->duration = $this->exam->duration;
        $this->start_time = $this->exam->start_time;
        $this->start_time = $this->exam->start_time;
        $this->end_time = $this->exam->end_time;
    }

    public function update()
    {
        $this->validate();

        $data = [
            'uuid' => $this->uuid,
            'exam_type' => $this->exam_type,
            'grade' => $this->grade,
            'major' => $this->major,
            'semester' => $this->semester,
            'th_ajaran' => $this->th_ajaran,
            'duration' => $this->duration,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ];
        
        $store = AssessmentHelper::update($data);

        return redirect('/'.strtolower(Auth::user()->role->role).'/assessment/'.strtolower($this->exam_type))->with('success', 'Berhasil menambah Assessment!');
    }

    public function render()
    {
        return view('livewire.assessment.a-s-h-update');
    }
}
