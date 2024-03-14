<?php

namespace App\Livewire\Remedial;

use App\Models\Exam;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\Remedial;
use Illuminate\Support\Facades\Auth;

class RemedialList extends Component
{
    public function toRemedial($uuid)
    {
        $exam_id = Exam::where('uuid', $uuid)->first();
        
        Remedial::updateOrCreate([
            'user_id' => Auth::user()->id,
            'exam_id' => $exam_id->id
        ],[
            'uuid' => Uuid::uuid4()->toString(),
            'user_id' => Auth::user()->id,
            'exam_id' => $exam_id->id,
            'date_exam' => now(),
            'status' => 'Belum dinilai'
        ]);

        $results_id = Remedial::where(['user_id' => Auth::user()->id, 'exam_id' => $exam_id->id])->first();

        if($results_id->is_end == true)
        {
            toastr()->success('Anda sudah menyelesaikan ujian ini!');
            return redirect('/user/remedial/'.strtolower($exam_id->exam_type));
        }else{
            return redirect('/user/remedial/pg/'.$uuid);
        }
    }

    public function render()
    {
        $remedials = Remedial::where('user_id', Auth::user()->id)->get();
        return view('livewire.remedial.remedial-list', [
            'remedials' => $remedials
        ]);
    }
}
