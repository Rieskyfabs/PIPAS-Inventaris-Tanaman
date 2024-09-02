<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @auth
            @if (Auth::user()->role == 'user')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
            @else
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/dashboard') ? '' : 'collapsed' }}" href="{{ route('admin/dashboard') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->

                <li class="nav-heading">Pages</li>

                 <!-- Plants -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/plants') ? '' : 'collapsed' }}" href="{{ route('plants') }}">
                        <i class="bi bi-flower3"></i>
                        <span>Tanaman</span>
                    </a>
                </li>
                <!-- End Plants Page Nav -->

                <!-- Categories -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/categories') ? '' : 'collapsed' }}" href="{{ route('categories') }}">
                        <i class="bi bi-tags-fill"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <!-- End Categories Page Nav -->

                <!-- Benefits -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/benefits') ? '' : 'collapsed' }}" href="{{ route('benefits') }}">
                        <i class="bi bi-heart-fill"></i>
                        <span>Manfaat</span>
                    </a>
                </li>
                <!-- End Benefits Page Nav -->

                <!-- Users -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/users') ? '' : 'collapsed' }}" href="{{ route('users') }}">
                        <i class="bi bi-people-fill"></i>
                        <span>Pengguna</span>
                    </a>
                </li>
                <!-- End Users Page Nav -->

                <!-- Borrowing -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/borrowing') ? '' : 'collapsed' }}" href="{{ route('borrowing') }}">
                        <i class="bi bi-arrow-left-right"></i>
                        <span>Peminjaman</span>
                    </a>
                </li>
                <!-- End Borrowing Page Nav -->

                {{-- <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/kebersihan*') ? '' : 'collapsed' }}" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-person-heart"></i><span>Kebersihan</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="tables-nav" class="nav-content collapse {{ Request::is('admin/kebersihan*') ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="{{ Request::is('admin/kebersihan/diri') ? 'active' : '' }}" href="{{ route('kebersihan') }}">
                                <i class="bi bi-circle"></i><span>Kebersihan Diri</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/kebersihan/sekolah') ? 'active' : '' }}" href="{{ route('kebersihan') }}">
                                <i class="bi bi-circle"></i><span>Kebersihan Sekolah</span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <!-- End Kebersihan Nav -->

            @endif
        @endauth

    </ul>

</aside>
<!-- End Sidebar -->
