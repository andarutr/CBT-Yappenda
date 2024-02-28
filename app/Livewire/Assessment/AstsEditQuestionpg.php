<?php

namespace App\Livewire\Assessment;

use Request;
use App\models\Exam;
use Livewire\Component;
use App\models\PGQuestion;

class AstsEditQuestionpg extends Component
{
    public $uuid;
    public $question; 
    public $pgquestion;
    public $option = ['A','B','C','D','E'];
    public $correct;
    public $jsonData = [];
    public $redirect_url;

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
        $this->question = PGQuestion::where('uuid', $this->uuid)->first();
        $this->jsonData = json_decode($this->question->option);

        $this->pgquestion = $this->question->pgquestion;
        $this->correct = $this->question->correct;

        $redirect = Exam::where('id', $this->question->exam_id)->first();
        $this->redirect_url = '/guru/assessment/asts/input-soal/pg/'.$redirect->uuid;
    }

    public function update_pg()
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
        
        PGQuestion::where('uuid', $this->question)->update([
            'pgquestion' => $this->pgquestion,
            'option' => $optionJson,
            'correct' => $this->correct,
        ]);

        return redirect()->back()->with('success', 'Berhasil memperbarui soal PG!');
    }

    public function render()
    {
        return view('livewire.assessment.asts-edit-questionpg');
    }
}
