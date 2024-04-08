<?php

use App\Models\AshResult;
use Illuminate\Support\Facades\Auth;
use function Livewire\Volt\{layout, title, state, computed};

layout('components.layouts.dashboard');
title('Hasil Ujian ASH');

$ashPurposes = computed(function(){
    return AshResult::where('user_id', Auth::user()->id)->get();
});

?>

<div class="content-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('components.tables.ash-result-show')
                </div>
            </div>
        </div>
    </div>
</div>
