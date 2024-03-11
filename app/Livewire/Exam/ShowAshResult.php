<?php

namespace App\Livewire\Exam;

use Livewire\Component;
use App\Models\AshResult;
use Illuminate\Support\Facades\Auth;

class ShowAshResult extends Component
{
    public function render()
    {
        $ashPurposes = AshResult::where('user_id', Auth::user()->id)->get();
        return view('livewire.exam.show-ash-result', [
            'ashPurposes' => $ashPurposes
        ]);
    }
}
