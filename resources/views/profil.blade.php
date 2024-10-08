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
                            @if (session('id_role') == 1)
                                <!-- Cek jika id_role adalah owner -->
                                <a href="{{ route('owner.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                            @elseif(session('id_role') == 2)
                                <!-- Cek jika id_role adalah kasir -->
                                <a href="{{ route('kasir.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                            @endif
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            <span class="text-dark">Profil</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- End Breadcrumb -->


        <div class="row">
            <div class="col-4">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ url('assets/onedash/images/avatars/' . $user->foto) }}" class="rounded-circle"
                                width="200" alt="{{ $user->foto }}">
                            <h5 class="mt-2">{{ $user->nama }}</h5>
                            <p class="text-muted">{{ $user->role->nama_role }} | {{ $user->cabang->nama_cabang }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <form action="{{ route('profil.update', $user->id_user) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label class="form-label" for="nama">Nama</label>
                                <input type="text" id="nama" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $user->nama) }}">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="username">Username</label>
                                <input type="text" id="username" name="username"
                                    class="form-control @error('username') is-invalid @enderror"
                                    value="{{ old('username', $user->username) }}">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="password">
                                    Password <em>(Kosongkan jika tidak ingin merubah)</em>
                                </label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="no_hp">No HP</label>
                                <input type="text" id="no_hp" name="no_hp"
                                    class="form-control @error('no_hp') is-invalid @enderror"
                                    value="{{ old('no_hp', $user->no_hp) }}">
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="alamat">Alamat</label>
                                <textarea id="alamat" rows="5" name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $user->alamat) }}</textarea>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="text-end mb-3 mt-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
