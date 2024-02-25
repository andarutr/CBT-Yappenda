<?php

namespace App\Livewire\Lesson;

use Ramsey\Uuid\Uuid;
use App\Models\Lesson;
use Livewire\Component;
use Livewire\Attributes\Validate;

class LessonCreate extends Component
{
    #[Validate('required|unique:lessons')]
    public $name;

    public function store()
    {
        $this->validate();

        Lesson::create([
            'uuid' => Uuid::uuid4()->toString(),
            'name' => $this->name
        ]);

        return redirect('/admin/mata-pelajaran')->with('success','Berhasil tambah mata pelajaran!');
    }

    public function render()
    {
        return view('livewire.lesson.lesson-create');
    }
}
