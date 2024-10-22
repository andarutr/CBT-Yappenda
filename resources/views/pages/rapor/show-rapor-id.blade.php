<?php

use App\Models\{Rapor, ContentRapor};
use Illuminate\Database\Eloquent\Builder;
use function Livewire\Volt\{layout, title, state, mount};

layout('components.layouts.dashboard');
title('Show Rapor');

state([
    'uuid',
    'user_id',
    'rapor',
    'content',
]);

mount(function(){
    $this->user_id = Request::segment(5);
    $this->uuid = Request::segment(6);
    $this->rapor = Rapor::where(['user_id' => $this->user_id, 'uuid' => $this->uuid])->first();
    $this->content = ContentRapor::whereHas('rapor', function(Builder $query){
        $query->where('uuid', $this->uuid);
        $query->where('user_id', $this->user_id);
    })->get();
});

?>

<div class="content-body">
    <div class="row mt-2">
        <div class="col-lg-10 mx-auto">
            <div class="row">
                <div class="col-lg-6">
                    <table>
                        <tr>
                            <td>
                                <h5>Nama</h5>
                            </td>
                            <td>
                                <h5>:</h5>
                            </td>
                            <td>
                                <h5>{{ $rapor->user->name }}</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>NIS/NISN</h5>
                            </td>
                            <td>
                                <h5>:</h5>
                            </td>
                            <td>
                                <h5>{{ $rapor->user->nis.'/'.$rapor->user->nisn }}</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Nama Sekolah</h5>
                            </td>
                            <td>
                                <h5>:</h5>
                            </td>
                            <td>
                                <h5>SMAS YAPPENDA</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Alamat Sekolah</h5>
                            </td>
                            <td>
                                <h5>:</h5>
                            </td>
                            <td>
                                <h5>Jl. Swasembada Timur V, No.10</h5>
                            </td>
                        </tr>
                    </table>    
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <table>
                        <tr>
                            <td>
                                <h5>Kelas</h5>
                            </td>
                            <td>
                                <h5>:</h5>
                            </td>
                            <td>
                                <h5>{{ $rapor->user->kelas }}</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Fase</h5>
                            </td>
                            <td>
                                <h5>:</h5>
                            </td>
                            <td>
                                <h5>{{ $rapor->user->fase }}</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Semester</h5>
                            </td>
                            <td>
                                <h5>:</h5>
                            </td>
                            <td>
                                <h5>{{ $rapor->semester }}</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Tahun Pelajaran</h5>
                            </td>
                            <td>
                                <h5>:</h5>
                            </td>
                            <td>
                                <h5>{{ $rapor->th_ajaran }}</h5>
                            </td>
                        </tr>
                    </table>    
                </div>
                <hr style="border: 1px solid #333333 !important;" class="mt-4 mb-3"/>
            </div>
            <H4 class="text-center mb-1">LAPORAN HASIL BELAJAR 
            @if($rapor->exam_type == 'ASH')
            HARIAN
            @elseif($rapor->exam_type == 'ASTS')
            TENGAH SEMESTER
            @elseif($rapor->exam_type == 'ASAS')
            AKHIR SEMESTER
            @else
            AKHIR
            @endif
            </H4>
            <table class="table table-bordered" style="border: 1px solid black;">
                <thead>
                    <tr>
                    <th scope="col" width="5%">No</th>
                    <th>Mata Pelajaran</th>
                    <th scope="col" width="7%" class="text-center">Nilai</th>
                    <th scope="col">Capaian Pembelajaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $key => $value)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $value->exam->lesson->name }}</td>
                        <td class="text-center">{{ $value->nilai }}</td>
                        <td>{{ $value->description }}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <div class="row mt-5 mb-5">
                <div class="col-lg-4">
                    <p>Mengetahui</p>
                    <p>Orang Tua / Wali</p>
                    <p class="mt-5">.......................</p>
                </div>
                <div class="col-lg-4">
                    <p>Mengetahui</p>
                    <p>Kepala Sekolah</p>
                    <p class="mt-5"><b>Wahyu Dawam Budi Utomo, M.Pd</b></p>
                </div>
                <div class="col-lg-4">
                    <p>Jakarta, {{ \Carbon\Carbon::parse($rapor->created_at)->format('d F Y') }}</p>
                    <p>Wali Kelas</p>
                    <p class="mt-5"><b>{{ $rapor->wali_kelas }}</b></p>
                </div>
            </div>
        </div>
    </div>
</div>