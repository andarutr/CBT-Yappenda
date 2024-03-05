<?php

namespace App\Livewire\Lesson;

use App\Models\Lesson;
use Livewire\Component;
use App\Helpers\LessonHelper;
use Livewire\Attributes\Validate;

class LessonList extends Component
{
    // Jangan Dihapus
    public $lesson_uuid;
    public $search;
    public $statusPage = 'list';

    #[Validate('required|unique:lessons')]
    public $name;

    public function toPage($a)
    {
        $this->statusPage = $a;
        $this->name = '';
    }

    public function store()
    {
        $this->validate();
        $store = LessonHelper::store($this->name);
    }

    public function edit($uuid)
    {
        $this->statusPage = 'edit';
        $lesson = Lesson::where('uuid', $uuid)->firstOrFail();
        $this->lesson_uuid = $uuid;   
        $this->name = $lesson->name;
    }

    public function update()
    {
        $data = [
            'uuid' => $this->lesson_uuid,
            'name' => $this->name
        ];

        $update = LessonHelper::update($data);
    }

    public function destroy($uuid)
    {
        $destroy = LessonHelper::destroy($uuid);
    }

    public function render()
    {
        $lessons = Lesson::all();
        $result = Lesson::where('name','like','%'.$this->search.'%')->get();
        return view('livewire.lesson.lesson-list', [
            'lessons' => $this->search ?  $result : $lessons
        ]);
    }
}
