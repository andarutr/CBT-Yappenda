<?php

namespace App\Livewire\Lesson;

use App\Models\Lesson;
use Livewire\Component;
use App\Helpers\LessonHelper;

class LessonList extends Component
{
    public $lessons;

    public function mount()
    {
        $this->lessons = Lesson::all();
    }

    public function destroy($uuid)
    {
        $destroy = LessonHelper::destroy($uuid);
    }

    public function render()
    {
        return view('livewire.lesson.lesson-list');
    }
}
