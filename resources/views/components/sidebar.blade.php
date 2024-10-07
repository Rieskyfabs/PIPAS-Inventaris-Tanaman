<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @auth
            <!-- User Info -->
            <div class="user-info">
                <div class="avatar">
                    <!-- Fetch the user's avatar from the specified path, or use a default image if none exists -->
                    <img src="{{ Auth::user()->avatar ? asset('assets/img/' . Auth::user()->avatar) : Avatar::create(Auth::user()->username)->toBase64() }}" 
                        alt="User Avatar" class="rounded-circle" width="50px">
                </div>
                <div class="user-details">
                    <!-- Display the logged-in user's username -->
                    <h6>{{ Auth::user()->username }}</h6>
                    <!-- Display the user's role -->
                    <span>{{ Auth::user()->role->name }}</span>
                </div>
            </div>

            @if (Auth::user()->role->name == 'user')
                <li class="nav-heading">{{ __('Dashboard') }}</li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                        <i class='bx bxs-dashboard' ></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->

                <li class="nav-heading">{{ __('Others') }}</li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('settings*') ? '' : 'collapsed' }}" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
                        <i class='bx bx-cog fs-5'></i><span>{{ __('Settings') }}</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="settings-nav" class="nav-content collapse {{ Request::is('settings*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="{{ Request::is('settings/profile-settings') ? 'active' : '' }}" href="#">
                                <i class="bi bi-circle"></i><span>{{ __('My Profile') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('logout') }}">
                    <i class='bx bx-log-out-circle fs-5'></i>
                    <span>{{__('Logout')}}</span>
                    </a>
                </li>
            @else
                <li class="nav-heading">{{ __('Dashboard') }}</li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/dashboard') ? '' : 'collapsed' }}" href="{{ route('admin/dashboard') }}">
                        <i class='bx bxs-dashboard' ></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->

                <li class="nav-heading">{{ __('MASTER') }}</li>
                

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/inventaris*') || Request::is('admin/attributes*') ? '' : 'collapsed' }}" data-bs-target="#plants-nav" data-bs-toggle="collapse" href="#">
                        <i class="ri-plant-line fs-5"></i><span>{{ __('Kelola Tanaman') }}</span>
                        @if($readyToHarvestCount > 0)
                            <span class="notification-bubble"></span>
                        @endif
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="plants-nav" class="nav-content collapse {{ Request::is('admin/inventaris*') || Request::is('admin/attributes*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="{{ Request::is('admin/inventaris/plants*') ? 'active' : '' }}" href="{{ route('plants') }}">
                                <i class="bi bi-circle"></i>
                                <span>{{ __('List Tanaman') }}</span>
                                @if($readyToHarvestCount > 0)
                                    <span class="notification-bubble"></span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin/attributes*') ? '' : 'collapsed' }}" data-bs-target="#plants-attributes-subnav" data-bs-toggle="collapse" href="#">
                                <i class="bi bi-circle-fill"></i><span>{{ __('Kelola Atribut') }}</span><i class="bi bi-chevron-down ms-auto me-3 fs-6"></i>
                            </a>
                            <ul id="plants-attributes-subnav" class="nav-content collapse {{ Request::is('admin/attributes*') ? 'show' : '' }} ps-3" data-bs-parent="#plants-nav">
                                <li>
                                    <a class="{{ Request::is('admin/attributes/categories*') ? 'active' : '' }}" href="{{ route('categories') }}">
                                        <i class="bi bi-circle"></i><span>{{ __('Kategori Tanaman') }}</span>
                                    </a>
                                </li>   
                                <li>
                                    <a class="{{ Request::is('admin/attributes/benefits*') ? 'active' : '' }}" href="{{ route('benefits') }}">
                                        <i class="bi bi-circle"></i><span>{{ __('Manfaat Tanaman') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('admin/attributes/locations*') ? 'active' : '' }}" href="{{ route('locations') }}">
                                        <i class="bi bi-circle"></i><span>{{ __('Lokasi Penyimpanan') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('admin/attributes/plant-attributes') ? 'active' : '' }}" href="{{ route('plantAttributes') }}">
                                        <i class="bi bi-circle"></i><span>{{ __('Atribut Tanaman') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-heading">{{ __('TRANSAKSI') }}</li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/transactions*') ? '' : 'collapsed' }}" data-bs-target="#plants-transactions-nav" data-bs-toggle="collapse" href="#">
                        <i class='bx bx-transfer-alt fs-5'></i><span>{{ __('Transaksi') }}</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="plants-transactions-nav" class="nav-content collapse {{ Request::is('admin/transactions*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="{{ Request::is('admin/transactions/tanaman-masuk') ? 'active' : '' }}" href="{{ route('transactions.tanaman-masuk') }}">
                                <i class="bi bi-circle"></i><span>{{ __('Tanaman Masuk') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/transactions/tanaman-keluar') ? 'active' : '' }}" href="{{ route('transactions.tanaman-keluar') }}">
                                <i class="bi bi-circle"></i><span>{{ __('Tanaman Keluar') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-heading">{{ __('LAPORAN') }}</li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/report*') ? '' : 'collapsed' }}" data-bs-target="#plants-report-nav" data-bs-toggle="collapse" href="#">
                        <i class='bx bx-printer fs-5'></i><span>{{ __('Kelola Laporan') }}</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="plants-report-nav" class="nav-content collapse {{ Request::is('admin/report*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="{{ Request::is('admin/reports/tanaman-masuk') ? 'active' : '' }}" href="#">
                                <i class="bi bi-circle"></i><span>{{ __('Laporan Tanaman Masuk') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/reports/tanaman-keluar') ? 'active' : '' }}" href="#">
                                <i class="bi bi-circle"></i><span>{{ __('Laporan Tanaman Keluar') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-heading">{{ __('Users') }}</li>
              

                    <!-- Kelola Pengguna -->
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/users*') || Request::is('admin/role-permissions*') ? '' : 'collapsed' }}" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                            <i class="ri-admin-line fs-5"></i><span>{{ __('Kelola Pengguna') }}</span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="users-nav" class="nav-content collapse {{ Request::is('admin/users*') || Request::is('admin/role-permissions*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                            <li>
                                <a class="{{ Request::is('admin/users*') ? 'active' : '' }}" href="{{ route('users') }}">
                                    <i class="bi bi-circle"></i><span>{{ __('List Pengguna') }}</span>
                                </a>
                            </li>

                            <!-- Roles & Permissions as sub-menu -->
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('admin/role-permissions*') ? '' : 'collapsed' }}" data-bs-target="#roles-permissions-subnav" data-bs-toggle="collapse" href="#">
                                    <i class="bi bi-circle-fill"></i><span>{{ __('Roles & Permissions') }}</span><i class="bi bi-chevron-down ms-auto me-3 fs-6"></i>
                                </a>
                                <ul id="roles-permissions-subnav" class="nav-content collapse {{ Request::is('admin/role-permissions*') ? 'show' : '' }} ps-3" data-bs-parent="#users-nav">
                                    <li>
                                        <a class="{{ Request::is('admin/role-permissions/permissions*') ? 'active' : '' }}" href="{{ route('permissions') }}">
                                            <i class="bi bi-circle"></i><span>{{ __('Permissions') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="{{ Request::is('admin/role-permissions/roles*') ? 'active' : '' }}" href="{{ route('roles') }}">
                                            <i class="bi bi-circle"></i><span>{{ __('Roles') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                <!-- End Users Page Nav -->
                <li class="nav-heading">{{ __('Others') }}</li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/notifications*') ? 'active' : '' }}" href="{{ route('notifications') }}">
                        <i class="bx bxs-bell-ring fs-5"></i><span>{{ __('Notifikasi') }}  
                            @if($notificationCount > 0)
                                <span class="badge bg-warning">{{ $notificationCount }}</span>
                            @endif
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/settings*') ? '' : 'collapsed' }}" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
                        <i class='bx bx-cog fs-5'></i><span>{{ __('Settings') }}</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="settings-nav" class="nav-content collapse {{ Request::is('admin/settings*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="{{ Request::is('admin/settings/profile-settings') ? 'active' : '' }}" href="#">
                                <i class="bi bi-circle"></i><span>{{ __('My Profile') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('logout') }}">
                    <i class='bx bx-log-out-circle fs-5'></i>
                    <span>{{__('Logout')}}</span>
                    </a>
                </li>
            @endif
        @endauth

    </ul>

</aside>
<!-- End Sidebar -->
