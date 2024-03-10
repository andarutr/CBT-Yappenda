@section('title','Dashboard')
<div class="grid grid-cols-12 gap-6"><div class="content-body"><!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
        <div class="row match-height">
            <!-- Greetings Card starts -->
            <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-congratulations">
                <div class="card-body text-center">
                <img
                    src="{{ url('assets/images/elements/decore-left.png') }}"
                    class="congratulations-img-left"
                    alt="card-img-left"
                />
                <img
                    src="{{ url('assets/images/elements/decore-right.png') }}"
                    class="congratulations-img-right"
                    alt="card-img-right"
                />
                <div class="avatar avatar-xl bg-primary shadow">
                    <div class="avatar-content">
                        <img src="{{ asset('assets/images/users/'.Auth::user()->picture) }}" alt="">
                    </div>
                </div>
                <div class="text-center">
                    <h1 class="mb-1 text-white">Selamat datang<br> {{ Auth::user()->name }}</h1>
                    <p class="card-text m-auto w-75">
                    "Belajarlah seperti Anda akan hidup selamanya, dan hiduplah seperti Anda akan mati besok." <strong>Mahatma Gandhi</strong>
                    </p>
                </div>
                </div>
            </div>
            </div>
            <!-- Greetings Card ends -->
        </div>
    </section>
</div>
