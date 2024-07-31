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
                            <span class="text-dark">Pelanggan</span>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('owner.pelanggan.create') }}" class="btn btn-primary">
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
                                    <th>Nama Pelanggan</th>
                                    <th>No. HP</th>
                                    <th class="text-center" data-sortable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggans as $pelanggan)
                                    <tr>
                                        <td>{{ $pelanggan->nama }}</td>
                                        <td>{{ $pelanggan->no_hp }}</td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center gap-3 fs-6">
                                                <a href="{{ route('owner.pelanggan.edit', $pelanggan->id_pelanggan) }}"
                                                    class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Edit" aria-label="Edit">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>

                                                <form
                                                    action="{{ route('owner.pelanggan.destroy', $pelanggan->id_pelanggan) }}"
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
