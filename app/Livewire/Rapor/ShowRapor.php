<?php

namespace App\Livewire\Rapor;

use Request;
use App\Models\Rapor;
use Livewire\Component;

class ShowRapor extends Component
{
    public $uuid;
    public $user_id;
    public $rapor;

    public function mount()
    {
        $this->user_id = Request::segment(5);
        $this->uuid = Request::segment(6);
        $this->rapor = Rapor::where(['user_id' => $this->user_id, 'uuid' => $this->uuid])->first();
    }

    public function render()
    {
        return view('livewire.rapor.show-rapor');
    }
}
