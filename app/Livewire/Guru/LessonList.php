<?php

namespace App\Livewire\Guru;

use App\Models\Lesson;
use Livewire\Component;

class LessonList extends Component
{
    public $lessons;

    public function mount()
    {
        $this->lessons = Lesson::all();
    }

    public function render()
    {
        return view('livewire.guru.lesson-list');
    }
}
