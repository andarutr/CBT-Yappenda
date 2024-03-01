<?php

namespace App\Livewire\Setting;

use Livewire\Component;
use App\Helpers\SettingHelper;
use Livewire\Attributes\Validate;

class ChangePassword extends Component
{
    #[Validate('required|min:8')]
    public $old_password;
    #[Validate('required|min:8')]
    public $new_password;

    public function update_password()
    {
        $this->validate();

       $data = [
           'old_password' => $this->old_password,
           'new_password' => $this->new_password,
       ];

       $update = SettingHelper::updatePassword($data);
        
    }

    public function render()
    {
        return view('livewire.setting.change-password');
    }
}
