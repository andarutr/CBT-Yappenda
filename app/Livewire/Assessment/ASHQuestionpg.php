<?php

namespace App\Livewire\Assessment;

use Request;
use Carbon\Carbon;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\PGQuestion;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Helpers\AssessmentHelper;

class ASHQuestionpg extends Component
{
    use WithFileUploads;

    public $uuid;
    public $exam;
    public $picture;
    #[Validate('required')]
    public $pgquestion;
    #[Validate('required')]
    public $option = [];
    public $correct;
    
    protected $rules = [
        'pgquestion' => 'required',
        'option.A' => 'required',
        'option.B' => 'required',
        'option.C' => 'required',
        'option.D' => 'required',
        'option.E' => 'required',
        'correct' => 'required',
    ];

    public function mount()
    {
        $this->uuid = Request::segment(6);
        $this->exam = Exam::where('uuid', $this->uuid)->first();
    }

    public function store_pg()
    {
        $this->validate();

        $options = [
            'A' => $this->option['A'],
            'B' => $this->option['B'],
            'C' => $this->option['C'],
            'D' => $this->option['D'],
            'E' => $this->option['E'],
        ];
        
        $optionJson = json_encode($options);
        
        if($this->picture){
            $imageName = Carbon::parse(now())->format('dmYHis').$this->picture->getClientOriginalExtension();

            $data = [
                'exam_id' => $this->exam->id,
                'pgquestion' => $this->pgquestion,
                'option' => $optionJson,
                'correct' => $this->correct,
                'picture' => $imageName
            ];

            $this->picture->storeAs('assets/images/exam', $imageName);
            $store = AssessmentHelper::storePgQuestion($data);
        }else{
            $data = [
                'exam_id' => $this->exam->id,
                'pgquestion' => $this->pgquestion,
                'option' => $optionJson,
                'correct' => $this->correct,
                'picture' => NULL
            ];

            $store = AssessmentHelper::storePgQuestion($data);
        }


        $this->reset(['pgquestion','option.A','option.B','option.C','option.D','option.E','picture']);

        toastr()->success('Berhasil membuat soal PG!');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.assessment.a-s-h-questionpg');
    }
}
