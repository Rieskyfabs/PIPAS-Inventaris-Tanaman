<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <x-logo-sidebar 
        logoSrc="{{ asset('images/wikrama-logo.png')}} " 
        logoText="SIM PIPAS" 
    />
    <!-- End Logo -->

    <x-sidebar-search 
        {{-- actionUrl="{{ route('search') }}"  --}}
        actionUrl="#" 
    />
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle" href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <!-- End Search Icon -->

            @auth
                @if (Auth::user()->role->name == 'admin')
                    <x-notification-dropdown 
                        :notificationCount="4" 
                        :notifications="[
                            ['icon' => 'bi-exclamation-circle', 'iconColor' => 'text-warning', 'title' => 'Lorem Ipsum', 'message' => 'Quae dolorem earum veritatis oditseno', 'timeAgo' => '30 min. ago'],
                            ['icon' => 'bi-x-circle', 'iconColor' => 'text-danger', 'title' => 'Atque rerum nesciunt', 'message' => 'Quae dolorem earum veritatis oditseno', 'timeAgo' => '1 hr. ago'],
                            ['icon' => 'bi-check-circle', 'iconColor' => 'text-success', 'title' => 'Sit rerum fuga', 'message' => 'Quae dolorem earum veritatis oditseno', 'timeAgo' => '2 hrs. ago'],
                            ['icon' => 'bi-info-circle', 'iconColor' => 'text-primary', 'title' => 'Dicta reprehenderit', 'message' => 'Quae dolorem earum veritatis oditseno', 'timeAgo' => '4 hrs. ago']
                        ]" 
                    />
                @endif
            @endauth
        
            <x-profile-dropdown 
                profileImage="{{ Auth::user()->profile_image ?? asset('/assets/img/default-profile-pic.jpg') }}" 
                username="{{ Auth::user()->username }}" 
                email="{{ Auth::user()->email }}" 
                role="{{ Auth::user()->role->name }}"
                profileUrl="users-profile.html" 
                helpUrl="pages-faq.html" 
            />

        </ul>
    </nav>
    <!-- End Icons Navigation -->

</header>
<!-- End Header -->
