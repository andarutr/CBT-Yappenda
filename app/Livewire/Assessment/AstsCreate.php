<?php

namespace App\Livewire\Assessment;

use Request;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use App\Models\Lesson;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class AstsCreate extends Component
{
    public $lessons;
    #[Validate('required')]
    public $lesson_id;
    #[Validate('required')]
    public $grade;
    #[Validate('required')]
    public $major;
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

        Exam::create([
            'uuid' => Uuid::uuid4()->toString(),
            'user_id' => Auth::user()->id,
            'lesson_id' => $this->lesson_id,
            'exam_type' => 'ASTS',
            'grade' => $this->grade,
            'major' => $this->major,
            'duration' => $this->duration*60,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ]);
        
        return redirect('/guru/assessment/asts')->with('success', 'Berhasil menambah ASTS');
    }

    public function render()
    {
        return view('livewire.assessment.asts-create');
    }
}
