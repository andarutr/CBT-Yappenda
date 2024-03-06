<?php

namespace App\Livewire\Exam;

use Auth;
use Request;
use Carbon\Carbon;
use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\ExamResult;

class ExamList extends Component
{
    public $search;

    public function toExam($uuid)
    {
        $exam_id = Exam::where('uuid', $uuid)->first();
        
        ExamResult::updateOrCreate([
            'user_id' => Auth::user()->id,
            'exam_id' => $exam_id->id
        ],[
            'uuid' => Uuid::uuid4()->toString(),
            'user_id' => Auth::user()->id,
            'exam_id' => $exam_id->id,
            'date_exam' => now(),
            'status' => 'Belum dinilai'
        ]);

        $results_id = ExamResult::where(['user_id' => Auth::user()->id, 'exam_id' => $exam_id->id])->first();

        if($results_id->is_end == true)
        {
            toastr()->success('Anda sudah menyelesaikan ujian ini!');
            return redirect('/user/ujian/'.strtolower($exam_id->exam_type));
        }else{
            return redirect('/user/ujian/pg/'.$uuid);
        }
    }

    public function render()
    {
        $exams = Exam::where('exam_type', Request::segment(3))->get();
        $results = Exam::where('exam_type', Request::segment(3))
                            ->orWhereHas('lesson', function($query){
                                $query->where('name','like','%'.$this->search.'%');
                            })
                            ->orWhereHas('user', function($query){
                                $query->where('name','like','%'.$this->search.'%');
                            })
                            ->get();

        return view('livewire.exam.exam-list', [
            'exams' => $this->search ? $results : $exams
        ]);
    }
}
