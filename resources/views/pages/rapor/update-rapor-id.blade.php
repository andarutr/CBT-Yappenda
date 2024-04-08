<?php

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Models\{Exam, User, Rapor, ContentRapor};
use function Livewire\Volt\{layout, title, state, rules, mount};

layout('components.layouts.dashboard');
title('Perubahan Nilai Rapor');

state([
    'uuid',
    'user_id',
    'rapor',
    'exam',
    'user',
    'kelas',
    'description',
]);

rules([
    'description' => 'required',
]);

mount(function(){
    $this->uuid = Request::segment(6);
    $this->kelas = Request::segment(4);
    $this->rapor = Rapor::where('uuid', $this->uuid)->first();
    $content = ContentRapor::whereHas('rapor', function(Builder $query){
        $query->where('uuid', $this->uuid);
    })->first();
    
    $this->exam_id = $this->rapor->id;
    $this->description = $content->description;
    $this->exam = $content->exam->lesson->name.' ('.$content->exam->grade.') ['.$content->exam->exam_type.'] '.$content->exam->semester.' '.$content->exam->th_ajaran;
    $this->user = User::where('id', $this->rapor->user_id)->first();
});

$update = function(){
    $this->validate();

    ContentRapor::where('rapor_id', $this->rapor->id)->update([
        'description' => $this->description,
    ]);
    
    toastr()->success('Berhasil memperbarui nilai!');
    return redirect('/'.strtolower(Auth::user()->role->role).'/rapor/kelas/'.$this->kelas.'/'.$this->uuid);
};

?>

<div class="content-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow">
                <div class="card-body">
                    <form wire:submit="update">
                        <div class="mt-1">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="{{ $user->name }}" disabled>
                        </div>
                        <div class="mt-1">
                            <label>Mata Pelajaran</label>
                            <input type="text" class="form-control" placeholder="{{ $exam }}" disabled>
                        </div>
                        <div class="mt-1">
                            <label>Deskripsi</label>
                            <textarea class="form-control" wire:model.live="description" rows="8"></textarea> 
                            @error('description')<p class="text-danger">{{ $message }}</p>@enderror
                        </div>
                        <div class="mt-1">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
