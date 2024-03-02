<?php

namespace App\Livewire\Rapor;

use App\Models\Rapor;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class RaporKelasXI extends Component
{
    public $rapors;

    public function mount()
    {
        $this->rapors = Rapor::whereHas('user', function(Builder $query){
            $query->where('kelas','XI');
        })->get();
    }

    public function render()
    {
        return view('livewire.rapor.rapor-kelas-x-i');
    }
}
