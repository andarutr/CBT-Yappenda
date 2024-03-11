<?php

namespace App\Livewire\Assessment;

use Request;
use App\Models\User;
use Livewire\Component;

class AshResultId extends Component
{
    public $user_uuid;

    public function mount()
    {
        $this->user_uuid = Request::segment(5);
    }

    public function render()
    {
        $user = User::where('uuid', $this->user_uuid)->first();
        return view('livewire.assessment.ash-result-id', [
            'user' => $user
        ]);
    }
}
