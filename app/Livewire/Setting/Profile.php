<?php

namespace App\Livewire\Setting;

use Auth;
use Request;
use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Helpers\SettingHelper;
use Livewire\Attributes\Validate;

class Profile extends Component
{
    use WithFileUploads;

    public $statusPage = 'editProfile';

    #[Validate('required')]
    public $name;
    #[Validate('required')]
    public $email;
    public $old_password;
    public $new_password;

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

    public function toPage($page)
    {
        $this->statusPage = $page;
    }

    public function updateProfile()
    {
        $this->validate();
        
        if($this->picture){
            $imageName = Carbon::parse(now())->format('dmYHis').$this->picture->getClientOriginalExtension();

            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'nis' => $this->nis,
                'nisn' => $this->nisn,
                'kelas' => $this->kelas,
                'fase' => $this->fase,
                'picture' => $imageName
            ];

            $this->picture->storePubliclyAs('public/assets/images/users', $imageName);
            $update = SettingHelper::updateProfile($data);
        }else{
            $data = [
                'name' => $this->name,
                'email' => $this->email,
                'nis' => $this->nis,
                'nisn' => $this->nisn,
                'kelas' => $this->kelas,
                'fase' => $this->fase,
                'picture' => Auth::user()->picture
            ];

            $update = SettingHelper::updateProfile($data);
        }

        toastr()->success('Berhasil memperbarui profile!');

        return redirect('/'.strtolower(Auth::user()->role->role.'/profile'));
    }

    public function updatePassword()
    {
        $this->validate();

       $data = [
           'old_password' => $this->old_password,
           'new_password' => $this->new_password,
       ];

       $this->old_password = '';
       $this->new_password = '';
       
       $update = SettingHelper::updatePassword($data);
    }

    public function render()
    {
        return view('livewire.setting.profile');
    }
}
