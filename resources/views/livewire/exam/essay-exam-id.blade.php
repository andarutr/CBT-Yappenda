@section('title','Essay')

<div class="content-body">
    <section class="app-user-view-account">
        <div class="row">
            <div class="col-xl-8 col-lg-7 col-md-7">
                <div class="card">
                    <h4 class="card-header">Selamat Mengerjakan</h4>
                    <div class="card-body pt-1">
                    <form wire:submit="store">
                        @if($picture)
                        <div class="form-group mb-3 row">
                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Gambar</label>
                            <div class="col-lg-9 col-xl-8">
                                <a href="{{ asset('assets/images/exam/'.$picture) }}" data-lightbox="image-1">
                                    <img src="{{ asset('assets/images/exam/'.$picture) }}" class="img-fluid" width="150">
                                </a>
                            </div>
                        </div>
                        @endif
                        <div class="form-group mb-3 row">
                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Soal</label>
                            <div class="col-lg-9 col-xl-8">
                                <p>{{ $question->question }}</p>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Jawaban</label>
                            <div class="col-lg-9 col-xl-8">
                                <textarea class="form-control" type="text" wire:model="answer" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <div class="col-lg-9 col-xl-8 offset-lg-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div> 
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- User Card -->
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                    @php
                    $now = \Carbon\Carbon::now();
                    $end = \Carbon\Carbon::parse($exam->end_time);
                    @endphp 
                    <h3 class="mb-0 met-user-name-post text-center mb-3 mt-1" wire:poll.keep-alive>Sisa Waktu : <br>{{ $end->diffInMinutes($now) }} menit</h3>  
                        @foreach($box_question as $key => $value)
                        <div class="col-lg-3 mb-2">
                            <a href="{{ url('/user/ujian/pg/'.$value->id.'/'.$uuid) }}" class="btn btn-primary text-white" wire:navigate>{{ $key+1 }}</a><br>
                        </div>
                        @endforeach
                        </div>
                        <div class="row">
                            <p class="mt-1">
                                <b>Essay</b>
                            </p>
                            @foreach($box_question_essay as $key => $value)
                            <div class="col-lg-3 mb-2">
                                <a href="{{ url('/user/ujian/essay/'.$value->id.'/'.$uuid) }}" class="btn btn-warning text-white" wire:navigate>{{ $key+1 }}</a>
                            </div>
                            @endforeach
                            <a href="{{ url('/user/ujian/preview/'.$exam->uuid) }}" class="text-center" wire:navigate>Preview Jawaban</a>
                        </div>
                    </div>
                </div>
                <button class="form-control btn btn-success mb-3" wire:click="endExam" wire:confirm="Yakin ingin menyelesaikan ujian ini? Pastikan semua soal telah terisi...">Selesai</button>
            </div>
        </div>
    </section>
</div>
