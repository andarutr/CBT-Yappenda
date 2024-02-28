@section('title','Preview')

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
                                <a href="{{ url('/user/ujian/pg/'.$exam->uuid) }}" class="nav-link" wire:navigate>Soal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#Preview" role="tab" aria-selected="false">Preview</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane p-3 active" id="Preview" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h4 class="card-title">Soal PG</h4>
                                            </div><!--end card-header-->
                                            <div class="card-body"> 
                                                <form wire:submit="">
                                                <div class="form-group mb-3 row">
                                                    <div class="col-lg-12 col-xl-12">
                                                        @foreach($pg_question as $key => $value)
                                                        <p>{{ $key+1 }}. {{ $value->pgquestion }}</p>
                                                        <ul>
                                                            @foreach(json_decode($value->option) as $huruf => $opsi)
                                                            <li>{{ $huruf }}. {{ $opsi }}</li>
                                                            @endforeach
                                                        </ul>
                                                            @foreach($value->pgAnswer as $val)
                                                            <p>Jawaban : <b>{{ $val->answer }}</b></p>
                                                            @endforeach
                                                        @endforeach

                                                    </div>
                                                </div>
                                                </form>  
                                            </div><!--end card-body-->
                                        </div><!--end card-->
                                    </div> <!-- end col -->
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h4 class="card-title">Soal Essay</h4>
                                            </div><!--end card-header-->
                                            <div class="card-body"> 
                                                <form wire:submit="">
                                                <div class="form-group mb-3 row">
                                                    <div class="col-lg-12 col-xl-12">
                                                        @foreach($essay_question as $key => $value)
                                                        <p>{{ $key+1 }}. {{ $value->question }}</p>
                                                            @foreach($value->esAnswer as $v)
                                                            <p>Jawaban : <b>{{ $v->answer }}</b></p>
                                                            @endforeach
                                                        @endforeach
                                                        <p>
                                                    </div>
                                                </div>
                                                </form>  
                                            </div><!--end card-body-->
                                        </div><!--end card-->
                                    </div> <!-- end col -->               
                                </div><!--end row-->
                            </div>
                        </div>        
                    </div> <!--end card-body-->                            
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    </div>
    <livewire:partials.footer />             
</div>
