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
                            <a href="<?= route('owner.dashboard') ?>"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="<?= route('owner.pelanggan.index') ?>">Pelanggan</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <span class="text-dark">Edit Pelanggan</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="row mx-0">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <form action="{{ route('owner.pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label class="form-label" for="nama">Nama Pelanggan</label>
                            <input type="text" id="nama" name="nama"
                                class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama', $pelanggan->nama) }}">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="no_hp">No. HP</label>
                            <input type="text" id="no_hp" name="no_hp"
                                class="form-control @error('no_hp') is-invalid @enderror"
                                value="{{ old('no_hp', $pelanggan->no_hp) }}">
                            @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="text-end mb-3 mt-4">
                            <a href="{{ route('owner.pelanggan.index') }}" class="btn btn-dark">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
