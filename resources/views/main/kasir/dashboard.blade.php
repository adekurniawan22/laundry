@extends('layout.header_footer')
@section('content')
    <main class="page-content">

        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"
            style="height: 37px; overflow: hidden; display: flex; align-items: center;">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="<?= route('kasir.dashboard') ?>"><i
                                    class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page"> <span class="text-dark">Dashboard</span></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 row-cols-xxl-3">
            <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                            <div class="w-50">
                                <p>Jumlah Pelanggan</p>
                                <h4 class="">{{ $pelangganCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                            <div class="w-50">
                                <p>Jumlah Transaksi</p>
                                <h4 class="">5</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-1">
            <div class="col-12">
                <div class="card overflow-hidden radius-10 bg-success">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center overflow-hidden">
                            <div class="w-50 text-center">
                                <h4>Uang Masuk</h4>
                                <h1 class="">Rp. 3.000.000</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
