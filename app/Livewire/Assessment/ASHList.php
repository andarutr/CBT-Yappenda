<?php

namespace App\Livewire\Assessment;

use Auth;
use Request;
use App\Models\Exam;
use App\Models\Lesson;
use Livewire\Component;
use App\Helpers\AssessmentHelper;
use Livewire\Attributes\Validate;

class ASHList extends Component
{
    // Jangan dihapus!
    public $statusPage = 'list';
    public $assessment;
    public $lessons;
    public $exam_uuid;

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

    public function toPage($page)
    {
        $this->statusPage = $page;

        $this->lesson_id = '';
        $this->exam_type = '';
        $this->grade = '';
        $this->major = '';
        $this->semester = '';
        $this->th_ajaran = '';
        $this->duration = '';
        $this->start_time = '';
        $this->start_time = '';
        $this->end_time = '';
    }

    public function mount()
    {
        $this->assessment = Exam::where('exam_type','ASH')->orderByDesc('start_time')->get();
    }
    
    public function create()
    {
        $this->statusPage = 'create';

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

        toastr()->success('Berhasil menambahkan assessment!');

        return redirect('/'.strtolower(Auth::user()->role->role).'/assessment/'.strtolower($this->exam_type));
    }

    public function edit($uuid)
    {
        $this->statusPage = 'edit';
        $exam = Exam::where('uuid', $uuid)->firstOrFail();
        $this->exam_uuid = $exam->uuid;
        $this->lesson_id = $exam->lesson->name;
        $this->exam_type = $exam->exam_type;
        $this->grade = $exam->grade;
        $this->major = $exam->major;
        $this->semester = $exam->semester;
        $this->th_ajaran = $exam->th_ajaran;
        $this->duration = $exam->duration;
        $this->start_time = $exam->start_time;
        $this->start_time = $exam->start_time;
        $this->end_time = $exam->end_time;
    }

    public function update()
    {
        $this->validate();

        $data = [
            'uuid' => $this->exam_uuid,
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

        toastr()->success('Berhasil menambah Assessment!');
        
        return redirect('/'.strtolower(Auth::user()->role->role).'/assessment/'.strtolower($this->exam_type));
    }
    
    public function destroy($uuid)
    {
       $destroy = AssessmentHelper::destroyExam($uuid);
        
        toastr()->success('Berhasil menghapus assessment!');
        
        return redirect('/'.strtolower(Auth::user()->role->role).'/assessment/ash');
    }

    public function render()
    {
        return view('livewire.assessment.a-s-h-list');
    }
}
