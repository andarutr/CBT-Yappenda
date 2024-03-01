<?php

namespace App\Livewire\Setting;

use Auth;
use Request;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\SettingHelper;
use Livewire\Attributes\Validate;

class ProfileShow extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $name;
    #[Validate('required')]
    public $email;
    public $picture;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function update_profile()
    {
        $this->validate();
        
        $data = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        $update = SettingHelper::updateProfile($data);

        return redirect()->back()->with('success', 'Berhasil memperbarui profile!');
    }

    public function upload_picture()
    {
        $name_picture = $this->picture->getClientOriginalName();
        $this->picture->storePubliclyAs('public/assets/images/users', $name_picture);
        
        $data = [
            'picture' => $name_picture
        ];

        $update = SettingHelper::updatePicture($data);

        return redirect()->back()->with('success', 'Berhasil memperbarui foto!');    
    }

    public function render()
    {
        return view('livewire.setting.profile-show');
    }
}
