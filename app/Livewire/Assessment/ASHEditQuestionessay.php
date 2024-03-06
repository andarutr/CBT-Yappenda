<?php

namespace App\Livewire\Assessment;

use Request;
use Carbon\Carbon;
use App\Models\Exam;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\EssayQuestion;
use App\Helpers\AssessmentHelper;

class ASHEditQuestionessay extends Component
{
    use WithFileUploads;

    public $uuid;
    public $picture;
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
        if($this->picture){
            $imageName = Carbon::parse(now())->format('dmYHis').$this->picture->getClientOriginalExtension();
            
            $data = [
                'uuid' => $this->uuid,
                'question' => $this->question,
                'picture' => $imageName
            ];

            $this->picture->storePubliclyAs('public/assets/images/exam', $imageName);
            $update = AssessmentHelper::updateEsQuestion($data);
        }else{
            $data = [
                'uuid' => $this->uuid,
                'question' => $this->question,
                'picture' => NULL
            ];

            $update = AssessmentHelper::updateEsQuestion($data);
        }

        toastr()->success('Berhasil memperbarui soal essay!');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.assessment.a-s-h-edit-questionessay');
    }
}
