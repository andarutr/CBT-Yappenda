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
    public $nis;
    public $nisn;
    public $kelas;
    public $fase;
    public $picture;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->nis = Auth::user()->nis;
        $this->nisn = Auth::user()->nisn;
        $this->kelas = Auth::user()->kelas;
        $this->fase = Auth::user()->fase;
    }

    public function update_profile()
    {
        $this->validate();
        
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'nis' => $this->nis,
            'nisn' => $this->nisn,
            'kelas' => $this->kelas,
            'fase' => $this->fase,
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
