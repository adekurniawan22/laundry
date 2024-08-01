<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= url('assets/onedash') ?>/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->

    <link href="<?= url('assets/onedash') ?>/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?= url('assets/onedash') ?>/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="<?= url('assets/onedash') ?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= url('assets/onedash') ?>/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="<?= url('assets/onedash') ?>/css/style.css" rel="stylesheet" />
    <link href="<?= url('assets/onedash') ?>/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="<?= url('assets/onedash') ?>/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <!-- loader-->
    <link href="<?= url('assets/onedash') ?>/css/pace.min.css" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="<?= url('assets/onedash') ?>/css/dark-theme.css" rel="stylesheet" />
    <link href="<?= url('assets/onedash') ?>/css/light-theme.css" rel="stylesheet" />
    <link href="<?= url('assets/onedash') ?>/css/semi-dark.css" rel="stylesheet" />
    <link href="<?= url('assets/onedash') ?>/css/header-colors.css" rel="stylesheet" />

    <style>
        .truncate {
            white-space: nowrap;
            /* Mencegah teks dari membungkus ke baris berikutnya */
            overflow: hidden;
            /* Menyembunyikan teks yang melampaui batas elemen */
            text-overflow: ellipsis;
            /* Menampilkan elipsis di akhir teks yang terpotong */
        }
    </style>
    <title>{{ $title }}</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand gap-3">
                <div class="mobile-toggle-icon fs-3 d-flex d-lg-none">
                    <i class="bi bi-list"></i>
                </div>
                <div class="top-navbar-right ms-auto">
                </div>
                <div class="dropdown dropdown-user-setting">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">
                        <div class="user-setting d-flex align-items-center gap-3">
                            <img src="<?= url('assets/onedash') ?>/images/avatars/avatar-1.png" class="user-img"
                                alt="">
                            <div class="d-none d-sm-block">
                                @php
                                    use Illuminate\Support\Facades\DB;
                                    $user = DB::table('user')
                                        ->join('role', 'user.id_role', '=', 'role.id_role') // Menggabungkan tabel user dan role
                                        ->where('id_user', '=', session('id_user'))
                                        ->select('user.*', 'role.nama_role') // Memilih kolom dari tabel user dan role
                                        ->first();
                                @endphp
                                <p class="user-name mb-0">{{ $user->nama }}</p>
                                <small class="mb-0 dropdown-user-designation">{{ $user->nama_role }}</small>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="pages-user-profile.html">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="bi bi-person-fill"></i></div>
                                    <div class="ms-3"><span>Profil</span></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <div class="d-flex align-items-center">
                                    <div class=""><i class="fadeIn animated bx bx-log-out"></i></div>
                                    <div class="ms-3"><span>Logout</span></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--end top header-->

        @include('layout.sidebar')

        @yield('content')


        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--start footer-->
        <footer class="footer">
            <div class="footer-text">
                Copyright © 2024. All right reserved.
            </div>
        </footer>
        <!--end footer-->


        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

    </div>
    <!--end wrapper-->

    <!-- Bootstrap bundle JS -->
    <script src="<?= url('assets/onedash') ?>/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="<?= url('assets/onedash') ?>/js/jquery.min.js"></script>
    <script src="<?= url('assets/onedash') ?>/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="<?= url('assets/onedash') ?>/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="<?= url('assets/onedash') ?>/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="<?= url('assets/onedash') ?>/js/pace.min.js"></script>
    {{-- DataTables --}}
    <script src="<?= url('assets/onedash') ?>/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?= url('assets/onedash') ?>/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= url('assets/onedash') ?>/js/table-datatable.js"></script>
    <!--app-->
    <script src="<?= url('assets/onedash') ?>/js/app.js"></script>
    @yield('script')
</body>

</html>
