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
                        <i class="bi bi-grid"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
            @else
                <li class="nav-heading">{{ __('Dashboard') }}</li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/dashboard') ? '' : 'collapsed' }}" href="{{ route('admin/dashboard') }}">
                        <i class="bi bi-grid"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->

                <li class="nav-heading">{{ __('Menu') }}</li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/inventaris*') || Request::is('admin/attributes*') ? '' : 'collapsed' }}" data-bs-target="#plants-nav" data-bs-toggle="collapse" href="#">
                        <i class="ri-plant-line fs-5"></i><span>{{ __('Kelola Tanaman') }}</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="plants-nav" class="nav-content collapse {{ Request::is('admin/inventaris*') || Request::is('admin/attributes*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="{{ Request::is('admin/inventaris/plants*') ? 'active' : '' }}" href="{{ route('plants') }}">
                                <i class="bi bi-circle"></i><span>{{ __('List Tanaman') }}</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a class="{{ Request::is('admin/inventaris/plants/create') ? 'active' : '' }}" href="{{ route('plants.create') }}">
                                <i class="bi bi-circle"></i><span>{{ __('Create Plants') }}</span>
                            </a>
                        </li> --}}
                        <!-- Plant Attributes as nav-item with sub-menu -->
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('admin/attributes*') ? '' : 'collapsed' }}" data-bs-target="#plants-attributes-subnav" data-bs-toggle="collapse" href="#">
                                <i class="bi bi-circle-fill"></i><span>{{ __('Kelola Atribut') }}</span><i class="bi bi-chevron-down ms-auto me-3 fs-6"></i>
                            </a>
                            <ul id="plants-attributes-subnav" class="nav-content collapse {{ Request::is('admin/attributes*') ? 'show' : '' }} ps-3" data-bs-parent="#plants-nav">
                                <li>
                                    <a class="{{ Request::is('admin/attributes/plant-attributes') ? 'active' : '' }}" href="{{ route('plantCodes') }}">
                                        <i class="bi bi-circle"></i><span>{{ __('Atribut Tanaman') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('admin/attributes/categories') ? 'active' : '' }}" href="{{ route('categories') }}">
                                        <i class="bi bi-circle"></i><span>{{ __('Kategori Tanaman') }}</span>
                                    </a>
                                </li>   
                                <li>
                                    <a class="{{ Request::is('admin/attributes/benefits') ? 'active' : '' }}" href="{{ route('benefits') }}">
                                        <i class="bi bi-circle"></i><span>{{ __('Manfaat Tanaman') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Request::is('admin/attributes/locations') ? 'active' : '' }}" href="{{ route('locations') }}">
                                        <i class="bi bi-circle"></i><span>{{ __('Lokasi Penyimpanan') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-heading">{{ __('Users') }}</li>

                    <!-- Kelola Pengguna -->
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/users*') || Request::is('admin/role-permissions*') ? '' : 'collapsed' }}" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                            <i class="ri-admin-line"></i><span>{{ __('Kelola Pengguna') }}</span><i class="bi bi-chevron-down ms-auto"></i>
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

            @endif
        @endauth

    </ul>

</aside>
<!-- End Sidebar -->
