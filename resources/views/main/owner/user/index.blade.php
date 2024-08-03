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
                            <span class="text-dark">User</span>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('owner.user.create') }}" class="btn btn-primary">
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
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>No. HP</th>
                                    <th>Alamat</th>
                                    <th class="text-center" data-sortable="false">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="me-3">
                                                    <img src="{{ url('assets/img/' . $user->foto) }}" class="rounded-circle"
                                                        width="50" alt="{{ $user->foto }}">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0">{{ $user->nama }}</h6>
                                                    <p class="text-secondary mb-0" style="font-size: 12px">
                                                        {{ $user->role->nama_role }} | {{ $user->cabang->nama_cabang }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->no_hp }}</td>
                                        <td>
                                            <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-original-title="{{ $user->alamat }}">
                                                {{ Str::limit($user->alamat, 50, '...') }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center gap-3 fs-6">
                                                <a href="{{ route('owner.user.edit', $user->id_user) }}"
                                                    class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Edit" aria-label="Edit">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>

                                                <button type="button" class="text-danger bg-transparent border-0 p-0"
                                                    data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                                    data-form-id="delete-form-{{ $user->id_user }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>

                                                <form id="delete-form-{{ $user->id_user }}"
                                                    action="{{ route('owner.user.destroy', $user->id_user) }}"
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
