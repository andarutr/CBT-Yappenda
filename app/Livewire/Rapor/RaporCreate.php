<?php

namespace App\Livewire\Rapor;

use Auth; 
use Request;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\{User, Rapor, Exam, ExamResult, Remedial, AshResult, ContentRapor};
use Livewire\Attributes\Validate;
use Illuminate\Database\Eloquent\Builder;

class RaporCreate extends Component
{
    public $uuid;
    public $user_id;
    public $rapor;
    public $exams;
    public $user;
    public $kelas;
    #[Validate('required')]
    public $exam_id;
    #[Validate('required')]
    public $description;

    public function mount()
    {
        $this->kelas = Request::segment(4);
        $this->user_id = Request::segment(5);
        $this->uuid = Request::segment(6);
        $this->rapor = Rapor::where('uuid', $this->uuid)->first();
        $this->exams = Exam::all();
        $this->user = User::where('id', $this->rapor->user_id)->first();
    }

    public function store()
    {
        $this->validate();
        $exam = Exam::where('id', $this->exam_id)->first();
        if($exam->exam_type == 'ASTS'){
            $asts = ExamResult::where(['exam_id' => $this->exam_id, 'user_id' => $this->user->id])
                ->whereHas('exam', function(Builder $query) use($exam){
                    $query->where('exam_type', $exam->exam_type);
                })->sum('score');
            $asts_remedial = Remedial::where(['exam_id' => $this->exam_id, 'user_id' => $this->user->id])
                ->whereHas('exam', function(Builder $query) use($exam){
                    $query->where('exam_type', $exam->exam_type);
                })->sum('score');
            // Nilai asli + remed :2
            $asts_ = ($asts + $asts_remedial)/2;

            $tp_count = AshResult::where(['user_id' => $this->user->id, 'lesson_id' => $exam->lesson_id])->count();  
            $tp = AshResult::where(['user_id' => $this->user->id, 'lesson_id' => $exam->lesson_id])->sum('total');
            $tp_ = $tp/$tp_count;

            $total = number_format(round(($tp_ + $asts_)/2),0,'.','');
        }

        if($exam->exam_type === 'ASAS'){
            $asts = ExamResult::where(['exam_id' => $this->exam_id, 'user_id' => $this->user->id])
                ->whereHas('exam', function(Builder $query) use($exam){
                    $query->where('exam_type', 'ASTS');
                })->sum('score');
            $asts_remedial = Remedial::where(['exam_id' => $this->exam_id, 'user_id' => $this->user->id])
                ->whereHas('exam', function(Builder $query) use($exam){
                    $query->where('exam_type', 'ASTS');
                })->sum('score');
            // Nilai asli + remed :2
            $asts_ = ($asts + $asts_remedial)/2;

            $asas = ExamResult::where(['exam_id' => $this->exam_id, 'user_id' => $this->user->id])
                ->whereHas('exam', function(Builder $query) use($exam){
                    $query->where('exam_type', $exam->exam_type);
                })->sum('score');
            $asas_remedial = Remedial::where(['exam_id' => $this->exam_id, 'user_id' => $this->user->id])
                ->whereHas('exam', function(Builder $query) use($exam){
                    $query->where('exam_type', $exam->exam_type);
                })->sum('score');
            // Nilai asli + remed :2
            $asas_ = ($asas + $asas_remedial)/2;

            $tp_count = AshResult::where(['user_id' => $this->user->id, 'lesson_id' => $exam->lesson_id])->count();  
            $tp = AshResult::where(['user_id' => $this->user->id, 'lesson_id' => $exam->lesson_id])->sum('total');
            $tp_ = $tp/$tp_count;

            $total = number_format(round(($tp_ + $asts_ + $asas_)/3),0,'.','');
        }

        ContentRapor::create([
            'uuid' => Uuid::uuid4()->toString(),
            'rapor_id' => $this->rapor->id,
            'exam_id' => $this->exam_id,
            'nilai' => $total,
            'description' => $this->description,
        ]);
        
        toastr()->success('Berhasil memperbarui nilai!');
        return redirect('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/'.$this->kelas.'/'.$this->uuid);
    }

    public function render()
    {
        return view('livewire.rapor.rapor-create');
    }
}
