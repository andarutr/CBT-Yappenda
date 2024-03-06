@section('title','Preview Jawaban')

<div class="content-body">
    <section class="app-user-view-account">
        <div class="row">
            <div class="col-xl-8 col-lg-7 col-md-7">
                <div class="card">
                    <h4 class="card-header">Selamat Mengerjakan</h4>
                    <div class="card-body pt-1">
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
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- User Card -->
                <div class="card">
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
                    </div>
                </div>
                <a href="{{ url('/user/ujian/pg/'.$exam->uuid) }}" class="form-control btn btn-success mb-3" wire:navigate>Soal</a>
            </div>
        </div>
    </section>
</div>
