@extends('layout.header_footer')
@section('content')
    <main class="page-content">

        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"
            style="height: 37px; overflow: hidden; display: flex; align-items: center;">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('owner.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <span class="text-dark">Transaksi</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="row ms-0 me-1">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="mt-1"></div>
                        <table id="example" class="table align-middle table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Nota</th>
                                    <th>Cabang</th>
                                    <th>Kasir</th>
                                    <th>Pelanggan</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksis as $transaksi)
                                    <tr>
                                        <td>NOTA-{{ $transaksi->id_transaksi }}</td>
                                        <td>{{ $transaksi->cabang->nama_cabang }}</td>
                                        <td>{{ $transaksi->user->nama }}</td>
                                        <td>{{ $transaksi->pelanggan->nama }}</td>
                                        <td>{{ $transaksi->tgl_transaksi }} - {{ $transaksi->tgl_selesai }}</td>
                                        <td>{{ $transaksi->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
