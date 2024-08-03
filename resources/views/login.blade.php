<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= url('assets/onedash') ?>/images/icon.png" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="<?= url('assets/onedash') ?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= url('assets/onedash') ?>/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="<?= url('assets/onedash') ?>/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="<?= url('assets/onedash') ?>/css/pace.min.css" rel="stylesheet" />

    <title>Login</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper d-flex align-items-center justify-content-center" style="padding-bottom: 0px !important">
        <!--start content-->
        <main class="authentication-content pt-0 w-100">
            <div class="authentication-card pt-0 w-100">
                <div class="container-fluid">
                    <div class="card shadow rounded-4 overflow-hidden">
                        <div class="row g-0">
                            <!-- Form and login content -->
                            <div class="col-lg-6 d-flex justify-content-center align-items-center">
                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title text-center mb-3">Login</h5>
                                    @error('error')
                                        <div
                                            class="alert border-0 bg-light-danger alert-dismissible fade show py-2 ms-md-5">
                                            <div class="d-flex align-items-center">
                                                <div class="fs-3 text-danger"><i class="bi bi-x-circle-fill"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <div class="text-danger">{{ $message }}</div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @enderror
                                    <form class="form-body" method="POST" action="{{ route('user.login') }}">
                                        @csrf
                                        <div class="row g-3 ms-0 ms-md-5">
                                            <div class="col-12">
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-person-fill"></i>
                                                    </div>
                                                    <input type="text"
                                                        class="form-control radius-30 ps-5 @error('username') is-invalid @enderror"
                                                        id="username" placeholder="Masukkan Username" name="username"
                                                        value="{{ old('username') }}">
                                                </div>
                                                @error('username')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i>
                                                    </div>
                                                    <input type="password"
                                                        class="form-control radius-30 ps-5 @error('password') is-invalid @enderror"
                                                        id="inputChoosePassword" placeholder="Masukkan Password"
                                                        name="password" value="{{ old('password') }}">
                                                </div>
                                                @error('password')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit"
                                                        class="btn btn-primary radius-30">Login</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Image banner -->
                            <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center">
                                <img src="<?= url('assets/onedash') ?>/images/banner.png" class="img-fluid pe-5"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!--end page main-->

    </div>
    <!--end wrapper-->

    <!-- Bootstrap bundle JS -->
    <script src="<?= url('assets/onedash') ?>/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="<?= url('assets/onedash') ?>/js/jquery.min.js"></script>
</body>

</html>
