<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?= url('assets/onedash') ?>/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Laundry</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class="bi bi-list"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">

        {{-- Role Owner --}}
        @if (session('id_role') == 1)
            <li class="{{ Request::is('owner/dashboard*') ? 'mm-active' : '' }}">
                <a href="<?= url('owner/dashboard') ?>">
                    <div class="parent-icon"><i class="bi bi-house-fill"></i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>

            <li class="{{ Request::is('owner/user*') ? 'mm-active' : '' }}">
                <a href="<?= url('owner/user') ?>">
                    <div class="parent-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <div class="menu-title">User</div>
                </a>
            </li>

            <li class="{{ Request::is('owner/cabang*') ? 'mm-active' : '' }}">
                <a href="<?= url('owner/cabang') ?>">
                    <div class="parent-icon"><i class="fadeIn animated bx bx-store-alt"></i>
                    </div>
                    <div class="menu-title">Cabang</div>
                </a>
            </li>

            <li class="{{ Request::is('owner/kategori*') ? 'mm-active' : '' }}">
                <a href="<?= url('owner/kategori') ?>">
                    <div class="parent-icon"><i class="bi bi-tags-fill"></i>
                    </div>
                    <div class="menu-title">Kategori</div>
                </a>
            </li>

            <li class="{{ Request::is('owner/pelanggan*') ? 'mm-active' : '' }}">
                <a href="<?= url('owner/pelanggan') ?>">
                    <div class="parent-icon"><i class="lni lni-network"></i>
                    </div>
                    <div class="menu-title">Pelanggan</div>
                </a>
            </li>

            <li class="{{ Request::is('owner/transaksi*') ? 'mm-active' : '' }}">
                <a href="<?= url('owner/transaksi') ?>">
                    <div class="parent-icon"><i class="lni lni-agenda"></i>
                    </div>
                    <div class="menu-title">Transaksi</div>
                </a>
            </li>
        @endif

        {{-- Role Kasir --}}
        @if (session('id_role') == 2)
            <li class="{{ Request::is('kasir/dashboard*') ? 'mm-active' : '' }}">
                <a href="<?= url('kasir/dashboard') ?>">
                    <div class="parent-icon"><i class="bi bi-house-fill"></i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>

            <li class="{{ Request::is('kasir/pelanggan*') ? 'mm-active' : '' }}">
                <a href="<?= url('kasir/pelanggan') ?>">
                    <div class="parent-icon"><i class="lni lni-network"></i>
                    </div>
                    <div class="menu-title">Pelanggan</div>
                </a>
            </li>
            <li class="{{ Request::is('kasir/transaksi*') ? 'mm-active' : '' }}">
                <a href="<?= url('kasir/transaksi') ?>">
                    <div class="parent-icon"><i class="lni lni-agenda"></i>
                    </div>
                    <div class="menu-title">Transaksi</div>
                </a>
            </li>
        @endif
    </ul>
    <!--end navigation-->
</aside>
<!--end sidebar -->
