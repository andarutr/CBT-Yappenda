<?php

namespace App\Livewire\Assessment;

use Request;
use Carbon\Carbon;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\EssayQuestion;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Helpers\AssessmentHelper;

class ASHQuestionessay extends Component
{
    use WithFileUploads;

    public $uuid;
    public $exam;
    public $picture;
    #[Validate('required')]
    public $question;

    public function mount()
    {
        $this->uuid = Request::segment(6);
        $this->exam = Exam::where('uuid', $this->uuid)->first();
    }

    public function store_essay()
    {
        $this->validate();

        if($this->picture){
            $imageName = Carbon::parse(now())->format('dmYHis').$this->picture->getClientOriginalExtension();
            
            $data = [
                'exam_id' => $this->exam->id,
                'question' => $this->question,
                'picture' => $imageName
            ];

            $this->picture->storePubliclyAs('public/assets/images/exam', $imageName);
            $store = AssessmentHelper::storeEsQuestion($data);
        }else{
            $data = [
                'exam_id' => $this->exam->id,
                'question' => $this->question,
                'picture' => NULL
            ];

            $store = AssessmentHelper::storeEsQuestion($data);
        }
        
        $this->reset(['question','picture']);

        toastr()->success('Berhasil menambahkan soal essay!');
        
        return redirect()->back();
    }
    
    public function render()
    {
        return view('livewire.assessment.a-s-h-questionessay');
    }
}
