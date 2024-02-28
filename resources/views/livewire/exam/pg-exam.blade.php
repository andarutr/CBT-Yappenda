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
                                                <h4 class="card-title">Doa Sebelum Belajar </h4>
                                            </div><!--end card-header-->
                                            <div class="card-body"> 
                                                 <p>اللَّهُمَّ ارْزُقْنَا فَهْمَ النَّبِيِّيْنَ وَحِفْظَ اْلمَرْسَلِيْنَ وَإِلْهَامَ الْمَلَائِكَةِ الْمُقَرَّبِيْنَ، بِرَحْمَتِكَ يَاأَرْحَمَ الرَّاحِمِيْنَ</p>
                                                <p>Allâhummarzuqnâ fahman nabiyyîna wa hifdhal mursalîna wa ilhâmal malâikatil muqarrabîn birahmatika yâ arhamar râhimîna.</p>
                                                <p>Artinya: "Ya Allah, anugerahilah kami pemahaman para nabi, hafalan para rasul, dan ilhamnya para malaikat yang dekat (dengan-Mu), sebab kasih sayang-Mu, wahai Zat yang Maha Pengasih."</p>
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
