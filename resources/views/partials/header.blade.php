<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <x-logo-sidebar
        logoSrc="{{ asset('images/wikrama-logo.png')}} "
        logoText="Pantau Tanaman"
    />
    <!-- End Logo -->

    {{-- <x-sidebar-search
        actionUrl="#"
    /> --}}
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle" href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <!-- End Search Icon -->

            <x-notification-dropdown
                :notificationCount="$notificationCount"
                :notifications="$notifications"
            />

            <x-profile-dropdown
                profileImage="{{ Auth::user()->profile_image ?? Avatar::create(Auth::user()->username)->toBase64()  }}"
                username="{{ Auth::user()->username }}"
                email="{{ Auth::user()->email }}"
                role="{{ Auth::user()->role->name }}"
                profileUrl="#"
                helpUrl="#"
            />

        </ul>
    </nav>
    <!-- End Icons Navigation -->

</header>
<!-- End Header -->
