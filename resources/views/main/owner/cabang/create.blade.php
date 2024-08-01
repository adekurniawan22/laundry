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
                            <a href="<?= route('owner.cabang.index') ?>">Cabang</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <span class="text-dark">Tambah Cabang</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="row mx-0">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <form action="{{ route('owner.cabang.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="form-label" for="nama_cabang">Nama Cabang</label>
                            <input type="text" id="nama_cabang" name="nama_cabang"
                                class="form-control @error('nama_cabang') is-invalid @enderror"
                                value="{{ old('nama_cabang') }}">
                            @error('nama_cabang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="alamat">Alamat</label>
                            <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="kontak">Pengelola</label>
                            <select id="kontak" name="kontak" class="form-select @error('kontak') is-invalid @enderror">
                                <option value="">Pilih Pengelola</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id_kontak }}"
                                        {{ old('kontak') == $item->id_kontak ? 'selected' : '' }}>
                                        {{ $item->nama_kontak }}</option>
                                @endforeach
                            </select>
                            @error('kontak')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="text-end mb-3 mt-4">
                            <a href="{{ route('owner.cabang.index') }}" class="btn btn-dark">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
