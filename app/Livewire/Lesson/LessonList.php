<?php

namespace App\Livewire\Lesson;

use App\Models\Lesson;
use Livewire\Component;

class LessonList extends Component
{
    public $lessons;

    public function mount()
    {
        $this->lessons = Lesson::all();
    }

    public function destroy($uuid)
    {
        Lesson::where('uuid', $uuid)->delete();
        
        return redirect('/admin/mata-pelajaran')->with('success', 'Berhasil menghapus mata pelajaran');
    }

    public function render()
    {
        return view('livewire.lesson.lesson-list');
    }
}
