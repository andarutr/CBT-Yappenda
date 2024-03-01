<?php

namespace App\Livewire\Assessment;

use Request;
use App\Models\Exam;
use Livewire\Component;
use App\Models\EssayQuestion;
use App\Helpers\AssessmentHelper;

class ASHEditQuestionessay extends Component
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
        $this->redirect_url = '/guru/assessment/'.strtolower($redirect->exam_type).'/input-soal/preview/'.$redirect->uuid;
    }

    public function update_essay()
    {
        $data = [
            'uuid' => $this->uuid,
            'question' => $this->question,
        ];

        $update = AssessmentHelper::updateEsQuestion($data);

        return redirect()->back()->with('success', 'Berhasil memperbarui soal essay!');
    }

    public function render()
    {
        return view('livewire.assessment.a-s-h-edit-questionessay');
    }
}
