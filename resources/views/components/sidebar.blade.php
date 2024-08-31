<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @auth
            @if (Auth::user()->role == 'user')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
            @else

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('admin/dashboard') }}">
                        <i class="bi bi-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->

                <li class="nav-heading">Pages</li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#">
                        <i class="bi bi-journals"></i>
                        <span>Materi</span>
                    </a>
                </li>
                <!-- End Materi Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-person-heart"></i><span>Kebersihan</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="#">
                                <i class="bi bi-circle"></i><span>Kebersihan Diri</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bi bi-circle"></i><span>Kebersihan Sekolah</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- End Kebersihan Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#">
                        <i class="bi bi-flower3"></i>
                        <span>Tanaman</span>
                    </a>
                </li>
                <!-- End Tanaman Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#">
                        <i class="bi bi-recycle"></i>
                        <span>Pemilahan Sampah</span>
                    </a>
                </li>
                <!-- End Pemilahan Sampah Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#">
                        <i class="bi bi-clipboard2-data-fill"></i>
                        <span>Observasi</span>
                    </a>
                </li>
                <!-- End Observasi Page Nav -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#">
                        <i class="bi bi-question-circle-fill"></i>
                        <span>Portfolio</span>
                    </a>
                </li>
                <!-- End Portfolio Page Nav -->
            @endif
        @endauth

    </ul>

</aside>
<!-- End Sidebar-->