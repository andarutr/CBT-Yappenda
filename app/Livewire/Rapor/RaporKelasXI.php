<?php

namespace App\Livewire\Rapor;

use App\Models\Rapor;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class RaporKelasXI extends Component
{
    public $kelas = 'XI-1';

    public function destroy($uuid)
    {
        Rapor::where('uuid', $uuid)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus rapor!');
    }
    
    public function render()
    {
        $rapors = Rapor::whereHas('user', function(Builder $query){
            $query->where('kelas', 'XI-1');
        })->get();

        $result = Rapor::whereHas('user', function(Builder $query){
            $query->where('kelas', 'like','%'.$this->kelas.'%');
        })->get();

        return view('livewire.rapor.rapor-kelas-x-i', [
            'rapors' => $this->kelas ? $result : $rapors
        ]);
    }
}
