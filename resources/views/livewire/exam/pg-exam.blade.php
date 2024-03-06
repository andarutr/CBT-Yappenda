@section('title','Pilihan Ganda')
<div class="content-body">
    <section class="app-user-view-account">
        <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                <!-- User Card -->
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        @foreach($box_question as $key => $value)
                        <div class="col-lg-3 mb-2">
                            <a href="{{ url('/user/ujian/pg/'.$value->id.'/'.$uuid) }}" class="btn btn-primary text-white" wire:navigate>{{ $key+1 }}</a><br>
                        </div>
                        @endforeach
                        </div>
                        <div class="row">
                            <p class="mt-4">
                                <b>Essay</b>
                            </p>
                            @foreach($box_question_essay as $key => $value)
                            <div class="col-lg-3 mb-2">
                                <a href="{{ url('/user/ujian/essay/'.$value->id.'/'.$uuid) }}" class="btn btn-warning text-white" wire:navigate>{{ $key+1 }}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <div class="card">
                    <h4 class="card-header">Doa Sebelum Ujian</h4>
                    <div class="card-body pt-1">
                        <p>اللَّهُمَّ ارْزُقْنَا فَهْمَ النَّبِيِّيْنَ وَحِفْظَ اْلمَرْسَلِيْنَ وَإِلْهَامَ الْمَلَائِكَةِ الْمُقَرَّبِيْنَ، بِرَحْمَتِكَ يَاأَرْحَمَ الرَّاحِمِيْنَ</p>
                        <p>Allâhummarzuqnâ fahman nabiyyîna wa hifdhal mursalîna wa ilhâmal malâikatil muqarrabîn birahmatika yâ arhamar râhimîna.</p>
                        <p>Artinya: "Ya Allah, anugerahilah kami pemahaman para nabi, hafalan para rasul, dan ilhamnya para malaikat yang dekat (dengan-Mu), sebab kasih sayang-Mu, wahai Zat yang Maha Pengasih."</p>
                    </div>
                </div>
            </div>
            <!--/ User Content -->
        </div>
    </section>
</div>
