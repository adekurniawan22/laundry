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
                            <span class="text-dark">Cabang</span>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('owner.cabang.create') }}" class="btn btn-primary">
                    <i class="fadeIn animated bx bx-plus"></i>Tambah
                </a>
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
                                    <th>Nama Cabang</th>
                                    <th>Alamat</th>
                                    <th>Kontak</th>
                                    <th class="text-center" data-sortable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cabangs as $cabang)
                                    <tr>
                                        <td>{{ $cabang->nama_cabang }}</td>
                                        <td>
                                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-original-title="{{ $cabang->alamat }}">
                                                {{ Str::limit($cabang->alamat, 50, '...') }}
                                            </span>
                                        </td>
                                        <td>
                                            <a class="pe-auto" target="_blank"
                                                href="https://wa.me/{{ $cabang->user->no_hp }}">
                                                <button class="btn btn-success d-flex align-items-center">
                                                    <i class="lni lni-whatsapp me-2"></i>
                                                    {{ $cabang->user->nama }}
                                                </button>
                                            </a>
                                        </td>

                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center gap-3 fs-6">
                                                <a href="{{ route('owner.cabang.edit', $cabang->id_cabang) }}"
                                                    class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Edit" aria-label="Edit">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>

                                                <button type="button" class="text-danger bg-transparent border-0 p-0"
                                                    data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                    data-form-id="delete-form-{{ $cabang->id_cabang }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>

                                                <form id="delete-form-{{ $cabang->id_cabang }}"
                                                    action="{{ route('owner.cabang.destroy', $cabang->id_cabang) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
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
