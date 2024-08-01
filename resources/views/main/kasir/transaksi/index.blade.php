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
                            <a href="{{ route('kasir.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <span class="text-dark">Transaksi</span>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('kasir.transaksi.create') }}" class="btn btn-primary">
                    <i class="fadeIn animated bx bx-plus"></i>Tambah
                </a>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="row mx-0">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="mt-1"></div>
                        <table id="example" class="table align-middle table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Nota</th>
                                    <th>Kasir</th>
                                    <th>Pelanggan</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Status</th>
                                    <th class="text-center" data-sortable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksis as $transaksi)
                                    <tr>
                                        <td>NOTA-{{ $transaksi->id_transaksi }}</td>
                                        <td>{{ $transaksi->user->nama }}</td>
                                        <td>{{ $transaksi->pelanggan->nama }}</td>
                                        <td>{{ $transaksi->tgl_transaksi }} - {{ $transaksi->tgl_selesai }}</td>
                                        <td>{{ $transaksi->status }}</td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center gap-3 fs-6">
                                                <a href="{{ route('kasir.transaksi.edit', $transaksi->id_transaksi) }}"
                                                    class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Edit" aria-label="Edit">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>

                                                <form
                                                    action="{{ route('kasir.transaksi.destroy', $transaksi->id_transaksi) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger bg-transparent border-0 p-0"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"
                                                        aria-label="Delete"
                                                        onclick="return confirm('Apakah ingin Menghapus?')">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
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
