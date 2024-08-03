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
                            <span class="text-dark">Tambah Kategori</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <div class="row ms-0 me-1">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <form action="{{ route('owner.kategori.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label class="form-label" for="kategori">Kategori</label>
                            <input type="text" id="kategori" name="kategori"
                                class="form-control @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}">
                            @error('kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="harga">Harga</label>
                            <div class="input-group">
                                <input type="text" id="harga" name="harga"
                                    class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
                            </div>
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

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const hargaInput = document.getElementById('harga');

            function formatHarga(value) {
                return 'Rp. ' + value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }

            hargaInput.addEventListener('input', function(event) {
                // Remove non-numeric characters
                let value = event.target.value.replace(/[^0-9]/g, '');
                // Format the value and update input
                event.target.value = formatHarga(value);
            });

            hargaInput.addEventListener('focus', function(event) {
                // Remove "Rp." on focus
                if (event.target.value.startsWith('Rp. ')) {
                    event.target.value = event.target.value.replace('Rp. ', '');
                }
            });

            hargaInput.addEventListener('blur', function(event) {
                // Reapply "Rp." on blur
                if (event.target.value) {
                    event.target.value = formatHarga(event.target.value.replace(/[^0-9]/g, ''));
                }
            });
        });
    </script>
@endsection
