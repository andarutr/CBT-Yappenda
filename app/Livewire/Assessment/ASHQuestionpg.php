<?php

namespace App\Livewire\Assessment;

use Request;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\PGQuestion;

class ASHQuestionpg extends Component
{
    public $uuid;
    public $exam;
    public $pgquestion;
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
        
        PGQuestion::create([
            'uuid' => Uuid::uuid4()->toString(),
            'exam_id' => $this->exam->id,
            'pgquestion' => $this->pgquestion,
            'option' => $optionJson,
            'correct' => $this->correct,
        ]);

        $this->reset(['pgquestion','option.A','option.B','option.C','option.D','option.E']);

        return redirect()->back()->with('success', 'Berhasil membuat soal PG!');
    }

    public function render()
    {
        return view('livewire.assessment.a-s-h-questionpg');
    }
}
