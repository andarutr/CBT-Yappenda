<?php

namespace App\Livewire\Rapor;

use Auth;
use Request;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\{Rapor, ContentRapor};
use Illuminate\Database\Eloquent\Builder;

class ShowRaporId extends Component
{
    public $rapors;

    public function mount()
    {
        $this->rapors = Rapor::where('user_id', Auth::user()->id)->get();
    }

    public function download($user_id)
    {
        $data['content'] = ContentRapor::whereHas('rapor', function(Builder $query){
            $query->where('user_id', Auth::user()->id);
        })->get();

        $pdf = Pdf::loadView('pdf.raporId', $data);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
            }, 'rapor.pdf');
    }

    public function render()
    {
        $rapors = Rapor::where(['user_id' => Auth::user()->id, 'exam_type' => strtoupper(Request::segment(3))])->get();

        return view('livewire.rapor.show-rapor-id', [
            'rapors' => $rapors
        ]);
    }
}
