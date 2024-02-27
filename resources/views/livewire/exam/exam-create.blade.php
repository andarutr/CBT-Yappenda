@section('title','Question')

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
                                <a class="nav-link active" data-bs-toggle="tab" href="#SoalPG" role="tab" aria-selected="false">Soal PG</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#SoalEssay" role="tab" aria-selected="false">Soal Essay</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Preview" role="tab" aria-selected="false">Preview</a>
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
                                                <form wire:submit="">
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Soal</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit quaerat iure eligendi impedit consequatur ipsam molestiae itaque vero similique accusamus, pariatur totam facere veritatis ab optio, ducimus a architecto! Aspernatur.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label"><input type="radio"> A</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        .....
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label"><input type="radio"> B</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        .....
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label"><input type="radio"> C</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        .....
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label"><input type="radio"> D</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        .....
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
                            <div class="tab-pane p-3" id="SoalEssay" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-8 col-xl-8">
                                        <div class="card shadow">
                                            <div class="card-header">
                                                <h4 class="card-title">Soal Essay</h4>
                                            </div><!--end card-header-->
                                            <div class="card-body"> 
                                                <form wire:submit="">
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Soal</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis dolore blanditiis fugiat delectus? Veritatis, et? Sunt id numquam amet, alias repellendus adipisci officia corporis eaque excepturi a dignissimos molestias ullam!
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Jawaban</label>
                                                    <div class="col-lg-9 col-xl-8">
                                                        <textarea class="form-control border border-3 rounded-3" type="text"></textarea>
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
                                        <button class="form-control btn btn-success mb-3">Selesai</button>
                                        <p>Note : </p>
                                        <ul>
                                            <li>Data akan tersimpan setelah klik tombol simpan</li>
                                            <li>Untuk melihat dan mengedit jawaban, klik menu preview</li>
                                            <li>Pastikan soal sudah terjawab semua ketika klik tombol selesai</li>
                                        </ul>
                                    </div>                         
                                </div><!--end row-->
                            </div>
                            <div class="tab-pane p-3" id="Preview" role="tabpanel">
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
                                                        <p>1. Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia at tempora accusantium consequatur sequi error nobis eaque enim molestias tempore est quaerat, voluptates rem. Dolor aut pariatur officia dicta repellat.</p>
                                                        <p>Jawaban : A .....</p>
                                                    </div>
                                                </div>
                                                </form>  
                                            </div><!--end card-body-->
                                            <div class="align-self-right">
                                                <a href="#" class="btn btn-sm btn-success form-control"><i class="fas fa-edit"></i></a>
                                            </div>
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
                                                        <p>1. Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia at tempora accusantium consequatur sequi error nobis eaque enim molestias tempore est quaerat, voluptates rem. Dolor aut pariatur officia dicta repellat.</p>
                                                        <p>Jawaban : ...</p>
                                                    </div>
                                                </div>
                                                </form>  
                                            </div><!--end card-body-->
                                            <div class="align-self-right">
                                                <a href="#" class="btn btn-sm btn-success form-control"><i class="fas fa-edit"></i></a>
                                            </div>                           
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

<script>
// Fungsi untuk memperbarui jam digital
function updateClock() {
    // Buat objek tanggal dan waktu saat ini di sisi client
    var now = new Date();

    // Format waktu dalam bentuk HH:MM:SS
    var timeString = now.getHours().toString().padStart(2, '0') + ':' +
                        now.getMinutes().toString().padStart(2, '0') + ':' +
                        now.getSeconds().toString().padStart(2, '0');

    // Perbarui elemen clock dengan waktu saat ini
    document.getElementById('clock').innerText = timeString;
}

// Panggil fungsi updateClock setiap detik
setInterval(updateClock, 1000);

// Panggil fungsi untuk pertama kali saat halaman dimuat
updateClock();
</script>
