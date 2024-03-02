<?php

namespace App\Livewire\Rapor;

use Request;
use App\Models\Rapor;
use Livewire\Component;
use App\Models\ContentRapor;

class RaporList extends Component
{
    public $uuid;
    public $rapor;
    public $contents;

    public function mount()
    {
        $this->uuid = Request::segment(5);
        $this->rapor = Rapor::where('uuid', $this->uuid)->first();
        $this->contents = ContentRapor::where('rapor_id', $this->rapor->id)->get();
    }

    public function destroy($uuid)
    {
        ContentRapor::where('uuid', $uuid)->delete();
        return redirect()->back()->with('success','Berhasil menghapus nilai!');
    }

    public function render()
    {
        return view('livewire.rapor.rapor-list');
    }
}
