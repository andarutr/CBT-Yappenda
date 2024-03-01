<?php

namespace App\Livewire\Lesson;

use Livewire\Component;
use App\Helpers\LessonHelper;
use Livewire\Attributes\Validate;

class LessonCreate extends Component
{
    #[Validate('required|unique:lessons')]
    public $name;

    public function store()
    {
        $this->validate();
        $store = LessonHelper::store($this->name);
    }

    public function render()
    {
        return view('livewire.lesson.lesson-create');
    }
}
