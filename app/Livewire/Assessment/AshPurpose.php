<?php

namespace App\Livewire\Assessment;

use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Helpers\AssessmentHelper;
use Livewire\Attributes\Validate;
use App\Models\AshPurpose as Purpose;

class AshPurpose extends Component
{
    // Jangan dihapus
    public $search;
    public $paginate;
    public $statusPage = 'list';
    public $ash_uuid;

    #[Validate('required')]
    public $title;
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

    public function toPage($page)
    {
        $this->statusPage = $page;
        $this->reset('title','tp_1','tp_2','tp_3','tp_4','tp_5','tp_6','tp_7','tp_8');
    }

    public function store()
    {
        $this->validate();

        $data = [
            'uuid' => Uuid::uuid4()->toString(),
            'title' => $this->title,
            'tp_1' => $this->tp_1,
            'tp_2' => $this->tp_2,
            'tp_3' => $this->tp_3,
            'tp_4' => $this->tp_4,
            'tp_5' => $this->tp_5,
            'tp_6' => $this->tp_6,
            'tp_7' => $this->tp_7,
            'tp_8' => $this->tp_8,
        ];

        $store = AssessmentHelper::storeAshPurpose($data);

        $this->statusPage = 'list';
        
        toastr()->success('Berhasil membuat tujuan pembelajaran!');
    }

    public function edit($uuid)
    {
        $this->statusPage = 'edit';

        $purpose = Purpose::where('uuid', $uuid)->first();
        $this->ash_uuid = $purpose->uuid;
        $this->title = $purpose->title;
        $this->tp_1 = $purpose->tp_1;
        $this->tp_2 = $purpose->tp_2;
        $this->tp_3 = $purpose->tp_3;
        $this->tp_4 = $purpose->tp_4;
        $this->tp_5 = $purpose->tp_5;
        $this->tp_6 = $purpose->tp_6;
        $this->tp_7 = $purpose->tp_7;
        $this->tp_8 = $purpose->tp_8;
    }

    public function update()
    {
        $data = [
            'uuid', $this->ash_uuid,
            'title' => $this->title,
            'tp_1' => $this->tp_1,
            'tp_2' => $this->tp_2,
            'tp_3' => $this->tp_3,
            'tp_4' => $this->tp_4,
            'tp_5' => $this->tp_5,
            'tp_6' => $this->tp_6,
            'tp_7' => $this->tp_7,
            'tp_8' => $this->tp_8,
        ];
        $update = AssessmentHelper::updateAshPurpose($data);

        $this->statusPage = 'list';
        
        toastr()->success('Berhasil memperbarui tujuan pembelajaran!');
    }

    public function destroy($uuid)
    {
        $destroy = AssessmentHelper::destroyAshPurpose($uuid);

        toastr()->success('Berhasil menghapus tujuan pembelajaran!');
    }

    public function render()
    {
        $purposes = Purpose::paginate($this->paginate);
        $result = Purpose::where('title', 'like','%'.$this->search.'%');

        return view('livewire.assessment.ash-purpose', [
            'purposes' => $this->search ? $result : $purposes
        ]);
    }
}
