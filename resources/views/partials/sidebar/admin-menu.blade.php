<!-- General Menu -->    
    <li class="nav-heading">{{ __('General') }}</li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/dashboard') ? '' : 'collapsed' }}" href="{{ route('admin/dashboard') }}">
            <i class="bx bxs-dashboard fs-5"></i>
            <span>{{ __('Dashboard') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/notifikasi*') ? '' : 'collapsed' }}" href="{{ route('notifications') }}">
            <i class="bx bxs-bell-ring fs-5"></i>
            <span>{{ __('Notifikasi') }}  
                @if($notificationCount > 0)
                    <span class="badge bg-warning">{{ $notificationCount }}</span>
                @endif
            </span>
        </a>
    </li>
<!-- End General Menu -->


<!-- MASTER Menu -->
    <li class="nav-heading">{{ __('MASTER') }}</li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/master-tanaman*') || Request::is('admin/atribut-tanaman*') ? '' : 'collapsed' }}" data-bs-target="#plants-nav" data-bs-toggle="collapse" href="#">
            <i class="ri-plant-line fs-5"></i><span>{{ __('Master Tanaman') }}</span>
            @if($readyToHarvestCount > 0)
                <span class="notification-bubble"></span>
            @endif
            <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="plants-nav" class="nav-content collapse {{ Request::is('admin/master-tanaman*') || Request::is('admin/atribut-tanaman*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
            <li>
                <a class="{{ Request::is('admin/master-tanaman*') ? 'active' : '' }}" href="{{ route('plants') }}">
                    <i class="bi bi-circle"></i>
                    <span>{{ __('List Tanaman') }}</span>
                    @if($readyToHarvestCount > 0)
                        <span class="notification-bubble"></span>
                    @endif
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/atribut*') ? '' : 'collapsed' }}" data-bs-target="#plants-attributes-subnav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-circle-fill"></i><span>{{ __('Kelola Atribut') }}</span><i class="bi bi-chevron-down ms-auto me-3 fs-6"></i>
                </a>
                <ul id="plants-attributes-subnav" class="nav-content collapse {{ Request::is('admin/atribut*') ? 'show' : '' }} ps-3" data-bs-parent="#plants-nav">
                    <li>
                        <a class="{{ Request::is('admin/atribut-tanaman/kategori-tanaman*') ? 'active' : '' }}" href="{{ route('categories') }}">
                            <i class="bi bi-circle"></i><span>{{ __('Kategori Tanaman') }}</span>
                        </a>
                    </li>   
                    <li>
                        <a class="{{ Request::is('admin/atribut-tanaman/tipe-tanaman*') ? 'active' : '' }}" href="{{ route('plantTypes') }}">
                            <i class="bi bi-circle"></i><span>{{ __('Tipe Tanaman') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/atribut-tanaman/lokasi-inventaris*') ? 'active' : '' }}" href="{{ route('locations') }}">
                            <i class="bi bi-circle"></i><span>{{ __('Lokasi Penyimpanan') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('admin/atribut-tanaman/list-atribut-tanaman') ? 'active' : '' }}" href="{{ route('plantAttributes') }}">
                            <i class="bi bi-circle"></i><span>{{ __('Atribut Tanaman') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/master-siswa*') || Request::is('admin/atribut-siswa*') ? '' : 'collapsed' }}" data-bs-target="#students-nav" data-bs-toggle="collapse" href="#">
            <i class="ri-team-line fs-5"></i><span>{{ __('Master Siswa') }}</span>
            <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="students-nav" class="nav-content collapse {{ Request::is('admin/master-siswa*') || Request::is('admin/atribut-siswa*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
            <!-- List Data Siswa -->
            <li>
                <a class="{{ Request::is('admin/master-siswa/list*') ? 'active' : '' }}" href="{{ route('student-data') }}">
                    <i class="bi bi-circle"></i><span>{{ __('List Data Siswa') }}</span>
                </a>
            </li>
            <!-- Kelola Atribut Siswa -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/atribut-siswa*') ? '' : 'collapsed' }}" data-bs-target="#students-attributes-subnav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-circle-fill"></i><span>{{ __('Kelola Atribut') }}</span><i class="bi bi-chevron-down ms-auto me-3 fs-6"></i>
                </a>
                <ul id="students-attributes-subnav" class="nav-content collapse {{ Request::is('admin/atribut-siswa*') ? 'show' : '' }} ps-3" data-bs-parent="#students-nav">
                    <!-- Dropdown Rombel -->
                    <li>
                        <a class="{{ Request::is('admin/atribut-siswa/rombel*') ? 'active' : '' }}" href="{{ route('rombel') }}">
                            <i class="bi bi-circle"></i><span>{{ __('Rombel') }}</span>
                        </a>
                    </li>
                    <!-- Dropdown Rayon -->
                    <li>
                        <a class="{{ Request::is('admin/atribut-siswa/rayon*') ? 'active' : '' }}" href="{{ route('rayon') }}">
                            <i class="bi bi-circle"></i><span>{{ __('Rayon') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
<!-- End MASTER Menu -->

<!-- TRANSAKSI Menu -->
    <li class="nav-heading">{{ __('TRANSAKSI') }}</li>

    <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/transaksi*') ? '' : 'collapsed' }}" data-bs-target="#plants-transactions-nav" data-bs-toggle="collapse" href="#">
            <i class='bx bx-transfer-alt fs-5'></i><span>{{ __('Transaksi') }}</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="plants-transactions-nav" class="nav-content collapse {{ Request::is('admin/transaksi*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
            <li>
                <a class="{{ Request::is('admin/transaksi/tanaman-masuk') ? 'active' : '' }}" href="{{ route('transactions.tanaman-masuk') }}">
                    <i class="bi bi-circle"></i><span>{{ __('Tanaman Masuk') }}</span>
                </a>
            </li>
            <li>
                <a class="{{ Request::is('admin/transaksi/tanaman-keluar') ? 'active' : '' }}" href="{{ route('transactions.tanaman-keluar') }}">
                    <i class="bi bi-circle"></i><span>{{ __('Tanaman Keluar') }}</span>
                </a>
            </li>
        </ul>
    </li>
<!-- End TRANSAKSI Menu -->


<!-- LAPORAN Menu -->
<li class="nav-heading">{{ __('LAPORAN') }}</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('laporan*') ? '' : 'collapsed' }}" data-bs-target="#plants-report-nav" data-bs-toggle="collapse" href="#">
        <i class='bx bx-printer fs-5'></i><span>{{ __('Kelola Laporan') }}</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="plants-report-nav" class="nav-content collapse {{ Request::is('laporan*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <li>
            <a class="{{ Request::is('laporan/tanaman-masuk') ? 'active' : '' }}" href="{{ route('reports.tanaman-masuk') }}">
                <i class="bi bi-circle"></i><span>{{ __('Lap. Tanaman Masuk') }}</span>
            </a>
        </li>
        <li>
            <a class="{{ Request::is('laporan/tanaman-keluar') ? 'active' : '' }}" href="{{ route('reports.tanaman-keluar') }}">
                <i class="bi bi-circle"></i><span>{{ __('Lap. Tanaman Keluar') }}</span>
            </a>
        </li>
    </ul>
</li>
<!-- End LAPORAN Menu -->

<!-- End Users Page Nav -->
<li class="nav-heading">{{ __('Lainnya') }}</li>

<!-- End Users Page Nav -->

{{-- <li class="nav-item">
    <a class="nav-link {{ Request::is('admin/pengaturan*') ? '' : 'collapsed' }}" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
        <i class='bx bx-cog fs-5'></i><span>{{ __('Pengaturan') }}</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="settings-nav" class="nav-content collapse {{ Request::is('admin/pengaturan*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
        <!-- Kelola Pengguna -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/pengaturan/pengguna*') || Request::is('admin/pengaturan/pengguna*') ? '' : 'collapsed' }}" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-circle-fill"></i><span>{{ __('Pengguna') }}</span><i class="bi bi-chevron-down ms-auto me-3 fs-6"></i>
            </a>
            <ul id="users-nav" class="nav-content collapse {{ Request::is('admin/pengaturan/pengguna*') || Request::is('admin/pengaturan/pengguna*') ? 'show' : '' }} ps-3" data-bs-parent="#settings-nav">
                <li>
                    <a class="{{ Request::is('admin/pengaturan/pengguna/list-pengguna') ? 'active' : '' }}" href="{{ route('users') }}">
                        <i class="bi bi-circle"></i><span>{{ __('List Pengguna') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/pengaturan/pengguna/role-permissions*') ? '' : 'collapsed' }}" data-bs-target="#roles-permissions-subnav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-circle-fill"></i><span>{{ __('Roles & Permissions') }}</span><i class="bi bi-chevron-down ms-auto me-3 fs-6"></i>
                    </a>
                    <ul id="roles-permissions-subnav" class="nav-content collapse {{ Request::is('admin/pengaturan/pengguna/role-permissions*') ? 'show' : '' }} ps-3" data-bs-parent="#users-nav">
                        <li>
                            <a class="{{ Request::is('admin/pengaturan/pengguna/role-permissions/permissions*') ? 'active' : '' }}" href="{{ route('permissions') }}">
                                <i class="bi bi-circle"></i><span>{{ __('Permissions') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/pengaturan/pengguna/role-permissions/roles*') ? 'active' : '' }}" href="{{ route('roles') }}">
                                <i class="bi bi-circle"></i><span>{{ __('Roles') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</li> --}}

<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('logout') }}">
    <i class='bx bx-log-out-circle fs-5'></i>
    <span>{{__('Logout')}}</span>
    </a>
</li>