@section('title','Pilihan Ganda')

<div class="page-content-tab">
    <div class="container-fluid">
        <livewire:partials.breadcrumb />
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="met-profile">
                            <div class="row">
                                <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                    <div class="met-profile-main">
                                        <div class="met-profile_user-detail">
                                            <h5>Goodluck {{ Auth::user()->name }}</h5>                                                        
                                            <h5 class="met-user-name">{{ $exam->lesson->name }} ({{ $exam->grade.' '.$exam->major }})</h5>                                                        
                                            <p class="mb-0 met-user-name-post">{{ $exam->user->name }}</p> 
                                            @php
                                            $now = \Carbon\Carbon::now();
                                            $end = \Carbon\Carbon::parse($exam->end_time);
                                            @endphp                                                       
                                            <p class="mb-0 met-user-name-post" wire:poll.keep-alive>Sisa Waktu : {{ $end->diffInMinutes($now) }} menit</p>                                                        
                                        </div>
                                    </div>                                                
                                </div><!--end col-->
                                
                                <div class="col-lg-4 ms-auto align-self-center">
                                    <ul class="list-unstyled personal-detail mb-0">
                                        <li class="mt-2"><i class="fas fa-calendar text-secondary font-22 align-middle mr-2"></i> <b> Durasi </b> : {{ $exam->duration/60 }} menit</li>
                                        <li class="mt-2"><i class="fas fa-calendar text-secondary font-22 align-middle mr-2"></i> <b> Mulai </b> : {{ \Carbon\Carbon::parse($exam->start_time)->format('d F Y, H:i') }}</li>
                                        <li class="mt-2"><i class="fas fa-calendar text-secondary font-22 align-middle mr-2"></i> <b> Selesai </b> : {{ \Carbon\Carbon::parse($exam->end_time)->format('d F Y, H:i') }}</li>
                                    </ul>
                                   
                                </div>
                            </div><!--end row-->
                        </div><!--end f_profile-->                                                                                
                    </div><!--end card-body-->  
                    <div class="card-body p-0">    
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#SoalPG" role="tab" aria-selected="false">Soal</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/user/ujian/preview/'.$exam->uuid) }}" class="nav-link" wire:navigate>Preview</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane p-3 active" id="SoalPG" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-8 col-xl-8">
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h4 class="card-title">Soal PG</h4>
                                            </div><!--end card-header-->
                                            <div class="card-body"> 
                                                <form wire:submit="store">
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Soal</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        {!! $question->pgquestion !!}
                                                    </div>
                                                </div>
                                                @foreach(json_decode($question->option) as $key => $value)
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label"></label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        {{ $key }}. {{ $value }}
                                                    </div>
                                                </div>
                                                @endforeach
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Jawaban</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        <input type="radio" wire:model="answer" value="A"> A
                                                                    </th>
                                                                    <th>
                                                                        <input type="radio" wire:model="answer" value="B"> B
                                                                    </th>
                                                                    <th>
                                                                        <input type="radio" wire:model="answer" value="C"> C
                                                                    </th>
                                                                    <th>
                                                                        <input type="radio" wire:model="answer" value="D"> D
                                                                    </th>
                                                                    <th>
                                                                        <input type="radio" wire:model="answer" value="E"> E
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div> 
                                                </form>  
                                            </div><!--end card-body-->
                                        </div><!--end card-->
                                    </div> 
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="card shadow">
                                            <div class="card-body">
                                            <div class="row p-2">
                                                <p>
                                                    <b>Pilihan Ganda</b>
                                                </p>
                                                @foreach($box_question as $key => $value)
                                                <div class="col-lg-2">
                                                    <a href="{{ url('/user/ujian/pg/'.$value->id.'/'.$uuid) }}" class="bg-primary text-white p-3 mb-4" wire:navigate>{{ $key+1 }}</a>
                                                </div>
                                                @endforeach
                                                <p class="mt-4">
                                                    <b>Essay</b>
                                                </p>
                                                @foreach($box_question_essay as $key => $value)
                                                <div class="col-lg-2">
                                                    <a href="{{ url('/user/ujian/essay/'.$value->id.'/'.$uuid) }}" class="bg-warning text-white p-3 mb-4" wire:navigate>{{ $key+1 }}</a>
                                                </div>
                                                @endforeach
                                            </div>
                                            </div>
                                        </div>
                                        <button class="form-control btn btn-success mb-3">Selesai</button>
                                        <p>Note : </p>
                                        <ul>
                                            <li>Data akan tersimpan setelah klik tombol simpan</li>
                                            <li>Untuk melihat dan mengedit jawaban, klik menu preview</li>
                                            <li>Pastikan soal sudah terjawab semua ketika klik tombol selesai</li>
                                        </ul>
                                    </div> 
                                </div>
                            </div>
                        </div>        
                    </div> <!--end card-body-->                            
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    </div>
    <livewire:partials.footer />             
</div>