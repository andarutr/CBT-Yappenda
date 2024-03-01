<?php

namespace App\Livewire\Lesson;

use Request;
use App\Models\Lesson;
use Livewire\Component;
use App\Helpers\LessonHelper;
use Livewire\Attributes\Validate;

class LessonUpdate extends Component
{
    #[Validate('required')]
    public $name;
    public $uuid;

    public function mount()
    {
        $this->uuid = Request::segment(4);
        $lesson = Lesson::where('uuid', $this->uuid)->first();
        $this->name = $lesson->name;
    }

    public function update()
    {
        $update = LessonHelper::update($this->uuid, $this->name);
    }

    public function render()
    {
        return view('livewire.lesson.lesson-update');
    }
}
