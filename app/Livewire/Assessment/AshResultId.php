<?php

namespace App\Livewire\Assessment;

use Request;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\Lesson;
use Livewire\Component;
use App\Models\AshResult;
use App\Models\AshPurpose;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class AshResultId extends Component
{
    // Jangan dihapus
    public $user_uuid;
    public $ash_uuid;
    public $statusPage = 'list';

    #[Validate('required')]
    public $lesson_id;
    #[Validate('required')]
    public $ash_purpose_id;
    #[Validate('required')]
    public $tp_1;
    #[Validate('required')]
    public $tp_2;
    public $tp_3;
    public $tp_4;
    public $tp_5;
    public $tp_6;
    public $tp_7;
    public $tp_8;

    public function mount()
    {
        $this->user_uuid = Request::segment(5);
    }

    public function toPage($page)
    {
        $this->statusPage = $page;
        $this->reset('lesson_id','ash_purpose_id','tp_1','tp_2','tp_3','tp_4','tp_5','tp_6','tp_7','tp_8');
    }

    public function create()
    {
        $this->statusPage = 'create';
    }

    public function store()
    {
        $this->validate();
        
        $user_id = User::where('uuid', $this->user_uuid)->first();

        AshResult::create([
            'uuid' => Uuid::uuid4()->toString(),
            'user_id' => $user_id->id,
            'lesson_id' => $this->lesson_id,
            'ash_purpose_id' => $this->ash_purpose_id,
            'tp_1' => $this->tp_1,
            'tp_2' => $this->tp_2,
            'tp_3' => $this->tp_3,
            'tp_4' => $this->tp_4,
            'tp_5' => $this->tp_5,
            'tp_6' => $this->tp_6,
            'tp_7' => $this->tp_7,
            'tp_8' => $this->tp_8,
        ]);
        
        $this->statusPage = 'list';

        toastr()->success('Berhasil membuat tujuan pembelajaran!');
    }

    public function edit($uuid)
    {
        $this->statusPage = 'edit';
        $ash = AshResult::where('uuid', $uuid)->first();
        $this->ash_uuid = $uuid;
        $this->lesson_id = $ash->lesson_id;
        $this->ash_purpose_id = $ash->ash_purpose_id;
        $this->tp_1 = $ash->tp_1;
        $this->tp_2 = $ash->tp_2;
        $this->tp_3 = $ash->tp_3;
        $this->tp_4 = $ash->tp_4;
        $this->tp_5 = $ash->tp_5;
        $this->tp_6 = $ash->tp_6;
        $this->tp_7 = $ash->tp_7;
        $this->tp_8 = $ash->tp_8;
    }
    public function update()
    {
        $this->validate();

        AshResult::where('uuid', $this->ash_uuid)
                    ->update([
                        'lesson_id' => $this->lesson_id,
                        'ash_purpose_id' => $this->ash_purpose_id,
                        'tp_1' => $this->tp_1,
                        'tp_2' => $this->tp_2,
                        'tp_3' => $this->tp_3,
                        'tp_4' => $this->tp_4,
                        'tp_5' => $this->tp_5,
                        'tp_6' => $this->tp_6,
                        'tp_7' => $this->tp_7,
                        'tp_8' => $this->tp_8,
                    ]);
        
        $this->statusPage = 'list';
        toastr()->success('Berhasil memperbarui tujuan pembelajaran!');
    }

    public function destroy($uuid)
    {
        AshResult::where('uuid', $uuid)->delete();
        toastr()->success('Berhasil menghapus tujuan pembelajaran!');
    }

    public function render()
    {
        $user = User::where('uuid', $this->user_uuid)->first();
        $lessons = Lesson::all();
        $purposes = AshPurpose::all();
        $ashPurposes = AshResult::where('user_id', $user->id)->get();

        return view('livewire.assessment.ash-result-id', [
            'user' => $user,
            'purposes' => $purposes,
            'lessons' => $lessons,
            'ashPurposes' => $ashPurposes
        ]);
    }
}
