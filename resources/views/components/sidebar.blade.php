<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @auth
            @if (Auth::user()->role->name == 'user')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                        <i class="bi bi-grid"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
            @else
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/dashboard') ? '' : 'collapsed' }}" href="{{ route('admin/dashboard') }}">
                        <i class="bi bi-grid"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->

                <li class="nav-heading">{{ __('Menu') }}</li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/inventaris*') ? '' : 'collapsed' }}" data-bs-target="#plants-nav" data-bs-toggle="collapse" href="#">
                        <i class="ri-plant-line"></i><span>{{ __('Manage Plants') }}</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="plants-nav" class="nav-content collapse {{ Request::is('admin/inventaris*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="{{ Request::is('admin/inventaris/plants*') ? 'active' : '' }}" href="{{ route('plants') }}">
                                <i class="bi bi-circle"></i><span>{{ __('All Plants') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/inventaris/plants/create') ? 'active' : '' }}" href="{{ route('plants.create') }}">
                                <i class="bi bi-circle"></i><span>{{ __('Create Plants') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/attributes*') ? '' : 'collapsed' }}" data-bs-target="#plantsAttribute-nav" data-bs-toggle="collapse" href="#">
                        <i class="ri-draft-fill"></i><span>{{ __('Plant Attributes') }}</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="plantsAttribute-nav" class="nav-content collapse {{ Request::is('admin/attributes*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="{{ Request::is('admin/attributes/categories') ? 'active' : '' }}" href="{{ route('categories') }}">
                                <i class="bi bi-circle"></i><span>{{ __('Plants Categories') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/attributes/benefits') ? 'active' : '' }}" href="{{ route('benefits') }}">
                                <i class="bi bi-circle"></i><span>{{ __('Plants Benefits') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/attributes/locations') ? 'active' : '' }}" href="{{ route('locations') }}">
                                <i class="bi bi-circle"></i><span>{{ __('Plants Locations') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/attributes/plant-code') ? 'active' : '' }}" href="{{ route('plantCodes') }}">
                                <i class="bi bi-circle"></i><span>{{ __('Plants Codes') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-heading">{{ __('Users') }}</li>

                <!-- Users -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/users*') ? '' : 'collapsed' }}" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                        <i class="ri-admin-line"></i><span>{{ __('Manage Users') }}</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="users-nav" class="nav-content collapse {{ Request::is('admin/users*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="{{ Request::is('admin/users/usersList*') ? 'active' : '' }}" href="{{ route('users') }}">
                                <i class="bi bi-circle"></i><span>{{ __('All Users') }}</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/users/create') ? 'active' : '' }}" href="{{ route('users.create') }}">
                                <i class="bi bi-circle"></i><span>{{ __('Create New User') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Users Page Nav -->

            @endif
        @endauth

    </ul>

</aside>
<!-- End Sidebar -->
