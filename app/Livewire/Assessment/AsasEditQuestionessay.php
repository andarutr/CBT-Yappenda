<?php

namespace App\Livewire\Assessment;

use Request;
use App\Models\Exam;
use Livewire\Component;
use App\Models\EssayQuestion;

class AsasEditQuestionessay extends Component
{
    public $uuid;
    public $question;
    public $redirect_url;

    public function mount()
    {
        $this->uuid = Request::segment(6);
        $essay = EssayQuestion::where('uuid', $this->uuid)->first();

        $this->question = $essay->question;
        $redirect = Exam::where('id', $essay->exam_id)->first();
        $this->redirect_url = '/guru/assessment/asas/input-soal/essay/'.$redirect->uuid;
    }

    public function store_essay()
    {
        EssayQuestion::where('uuid', $this->uuid)
                        ->update([
                            'question' => $this->question
                        ]);

        return redirect()->back()->with('success', 'Berhasil memperbarui soal essay!');
    }

    public function render()
    {
        return view('livewire.assessment.asas-edit-questionessay');
    }
}
