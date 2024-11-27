<li class="nav-heading">{{ __('Dashboard') }}</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
        <i class='bx bxs-dashboard' ></i>
        <span>{{ __('Dashboard') }}</span>
    </a>
</li>
<!-- End Dashboard Nav -->
<li class="nav-heading">{{ __('MENU') }}</li>

<!-- My Plants Nav -->
<li class="nav-item">
    <a class="nav-link {{ Request::is('inventaris/list-tanaman*') ? '' : 'collapsed' }}" href="{{ route('users.plants') }}">
        <i class="bx bx-leaf"></i>
        <span>{{ __('Tanaman') }}
            @if($readyToHarvestCount > 0)
                <span class="notification-bubble"></span>
            @endif
        </span>
    </a>
</li>

<!-- Reports Nav -->
<li class="nav-item">
    <a class="nav-link {{ Request::is('/laporan*') ? '' : 'collapsed' }}" data-bs-target="#plants-report-nav" data-bs-toggle="collapse" href="#">
        <i class='bx bx-printer fs-5'></i><span>{{ __('Laporan') }}</span><i class="bi bi-chevron-down ms-auto"></i>
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

<li class="nav-heading">{{ __('Lainnya') }}</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('notifications*') ? '' : 'collapsed' }}" href="{{ route('users.notifications') }}">
        <i class="bx bxs-bell-ring fs-5"></i>
        <span>{{ __('Notifikasi') }}  
            @if($notificationCount > 0)
                <span class="badge bg-warning">{{ $notificationCount }}</span>
            @endif
        </span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('logout') }}">
    <i class='bx bx-log-out-circle fs-5'></i>
    <span>{{__('Logout')}}</span>
    </a>
</li>