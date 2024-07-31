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
                            <a href="<?= route('owner.kategori.index') ?>">Kategori</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <span class="text-dark">Edit Kategori</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="row mx-0">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <form action="{{ route('owner.kategori.update', $kategori->id_kategori) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label class="form-label" for="kategori">Kategori</label>
                            <input type="text" id="kategori" name="kategori"
                                class="form-control @error('kategori') is-invalid @enderror"
                                value="{{ old('kategori', $kategori->kategori) }}">
                            @error('kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="harga">Harga</label>
                            <input type="text" id="harga" name="harga"
                                class="form-control @error('harga') is-invalid @enderror"
                                value="{{ old('harga', $kategori->harga) }}">
                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="text-end mb-3 mt-4">
                            <a href="{{ route('owner.kategori.index') }}" class="btn btn-dark">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
