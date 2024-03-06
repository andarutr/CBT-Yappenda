@section('title', 'Mata Pelajaran')
<div class="content-body">
    <div class="row">
        <div class="col-3 mb-2">
            @if($statusPage == 'list')
            <button class="btn btn-sm btn-primary mb-1" wire:click="toPage('create')">Tambah data</button>
            <input type="text" class="form-control" placeholder="Cari data..." wire:model.live="search">
            @else
            <button class="btn btn-sm btn-success mb-1" wire:click="toPage('list')">Kembali</button>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@yield('title')</h4>
                </div>
                <div class="card-body">
                    @if($statusPage == 'list')
                    <!-- table -->
                    @endif

                    @if($statusPage == 'create')
                    <!-- Form Create -->
                    @endif

                    @if($statusPage !== 'list' AND $statusPage !== 'create')
                    <!-- Form Update -->
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($statusPage == 'list')
    <div class="row">
        <div class="col-2">
            <select wire:model.live="paginate" class="btn btn-sm btn-secondary mb-2">
                <option value="">Tampilkan Data</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>
    @endif
</div>



<!-- BUAT SOAL -->

@section('title','Input Soal PG')

<div class="content-body">
    <section class="app-ecommerce-details">
        <div class="card">
            <div class="card-body mb-3">
                <div class="row my-2">
                    <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                        <p>Preview Image</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ url('assets/images/pages/eCommerce/1.png') }}" class="img-fluid product-img" alt="product image" />
                        </div>
                    </div>
                    <div class="col-12 col-md-7">
                        <h4>Apple Watch Series 5</h4>
                        <span class="card-text item-company">By <a href="#" class="company-name">Apple</a></span>
                        <div class="ecommerce-details-price d-flex flex-wrap mt-1">
                            <h4 class="item-price me-1">$499.99</h4>
                            <ul class="unstyled-list list-inline ps-1 border-start">
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                                <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                            </ul>
                        </div>
                        <p class="card-text">Available - <span class="text-success">In stock</span></p>
                        <p class="card-text">
                            GPS, Always-On Retina display, 30% larger screen, Swimproof, ECG app, Electrical and optical heart sensors,
                            Built-in compass, Elevation, Emergency SOS, Fall Detection, S5 SiP with up to 2x faster 64-bit dual-core
                            processor, watchOS 6 with Activity trends, cycle tracking, hearing health innovations, and the App Store on
                            your wrist
                        </p>
                        <ul class="product-features list-unstyled">
                            <li><i data-feather="shopping-cart"></i> <span>Free Shipping</span></li>
                            <li>
                                <i data-feather="dollar-sign"></i>
                                <span>EMI options available</span>
                            </li>
                        </ul>
                        <hr />
                        <div class="product-color-options">
                            <h6>Colors</h6>
                            <ul class="list-unstyled mb-0">
                                <li class="d-inline-block selected">
                                    <div class="color-option b-primary">
                                        <div class="filloption bg-primary"></div>
                                    </div>
                                </li>
                                <li class="d-inline-block">
                                    <div class="color-option b-success">
                                        <div class="filloption bg-success"></div>
                                    </div>
                                </li>
                                <li class="d-inline-block">
                                    <div class="color-option b-danger">
                                        <div class="filloption bg-danger"></div>
                                    </div>
                                </li>
                                <li class="d-inline-block">
                                    <div class="color-option b-warning">
                                        <div class="filloption bg-warning"></div>
                                    </div>
                                </li>
                                <li class="d-inline-block">
                                    <div class="color-option b-info">
                                        <div class="filloption bg-info"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <hr />
                        <div class="d-flex flex-column flex-sm-row pt-1">
                            <a href="#" class="btn btn-primary btn-cart me-0 me-sm-1 mb-1 mb-sm-0">
                                <i data-feather="shopping-cart" class="me-50"></i>
                                <span class="add-to-cart">Add to cart</span>
                            </a>
                            <a href="#" class="btn btn-outline-secondary btn-wishlist me-0 me-sm-1 mb-1 mb-sm-0">
                                <i data-feather="heart" class="me-50"></i>
                                <span>Wishlist</span>
                            </a>
                            <div class="btn-group dropdown-icon-wrapper btn-share">
                                <button type="button" class="btn btn-icon hide-arrow btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i data-feather="share-2"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#" class="dropdown-item">
                                        <i data-feather="facebook"></i>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i data-feather="twitter"></i>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i data-feather="youtube"></i>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <i data-feather="instagram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Details ends -->

            <!-- Item features starts -->
            <div class="item-features mb-5">
                <div class="row text-center">
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="w-75 mx-auto">
                            <a href="#" class="btn btn-primary form-control">Soal PG</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="w-75 mx-auto">
                            <a href="{{ url('guru/assessment/'.strtolower($exam->exam_type).'/input-soal/essay/'.$uuid) }}" class="btn btn-success form-control">Essay</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
                        <div class="w-75 mx-auto">
                            <a href="{{ url('guru/assessment/'.strtolower($exam->exam_type).'/input-soal/preview/'.$uuid) }}" class="btn btn-info form-control">Preview</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
</div>

@assets
<link href="{{ url('assets/css/lightbox.css') }}" rel="stylesheet" />
<script src="{{ url('assets/js/lightbox-plus-jquery.min.js') }}"></script>
@endassets
