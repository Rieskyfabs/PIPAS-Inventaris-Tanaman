<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <?php if(auth()->guard()->check()): ?>
            <!-- User Info -->
            <div class="user-info" style="display: flex; align-items: center; gap: 10px;">
                <div class="avatar">
                    <!-- Fetch the user's avatar from the specified path, or use a default image if none exists -->
                    <img src="<?php echo e(Auth::user()->avatar ? asset('assets/img/' . Auth::user()->avatar) : Avatar::create(Auth::user()->username)->toBase64()); ?>" 
                        alt="User Avatar" class="rounded-circle" width="50px">
                </div>
                <div class="user-details" style="max-width: 150px;">
                    <!-- Display the logged-in user's username -->
                    <h6 style="margin: 0; font-size: 16px;"><?php echo e(Auth::user()->username); ?></h6>
                    <!-- Display the user's email with styling for text overflow -->
                    <span style="font-size: 14px; color: #888; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block;">
                        <?php echo e(Auth::user()->email); ?>

                    </span>
                </div>
            </div>

            <?php if(Auth::user()->role->name == 'user'): ?>
                <li class="nav-heading"><?php echo e(__('Dashboard')); ?></li>

                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('dashboard') ? '' : 'collapsed'); ?>" href="<?php echo e(route('dashboard')); ?>">
                        <i class='bx bxs-dashboard' ></i>
                        <span><?php echo e(__('Dashboard')); ?></span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-heading"><?php echo e(__('MENU')); ?></li>

                <!-- My Plants Nav -->
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('inventaris/list-tanaman*') ? '' : 'collapsed'); ?>" href="<?php echo e(route('users.plants')); ?>">
                        <i class="bx bx-leaf"></i>
                        <span><?php echo e(__('Tanaman')); ?>

                            <?php if($readyToHarvestCount > 0): ?>
                                <span class="notification-bubble"></span>
                            <?php endif; ?>
                        </span>
                    </a>
                </li>

                <!-- Reports Nav -->
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('/laporan*') ? '' : 'collapsed'); ?>" data-bs-target="#plants-report-nav" data-bs-toggle="collapse" href="#">
                        <i class='bx bx-printer fs-5'></i><span><?php echo e(__('Laporan')); ?></span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="plants-report-nav" class="nav-content collapse <?php echo e(Request::is('laporan*') ? 'show' : ''); ?>" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="<?php echo e(Request::is('laporan/tanaman-masuk') ? 'active' : ''); ?>" href="<?php echo e(route('reports.tanaman-masuk')); ?>">
                                <i class="bi bi-circle"></i><span><?php echo e(__('Lap. Tanaman Masuk')); ?></span>
                            </a>
                        </li>
                        <li>
                            <a class="<?php echo e(Request::is('laporan/tanaman-keluar') ? 'active' : ''); ?>" href="<?php echo e(route('reports.tanaman-keluar')); ?>">
                                <i class="bi bi-circle"></i><span><?php echo e(__('Lap. Tanaman Keluar')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-heading"><?php echo e(__('Lainnya')); ?></li>

                

                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('notifications*') ? '' : 'collapsed'); ?>" href="<?php echo e(route('users.notifications')); ?>">
                        <i class="bx bxs-bell-ring fs-5"></i>
                        <span><?php echo e(__('Notifikasi')); ?>  
                            <?php if($notificationCount > 0): ?>
                                <span class="badge bg-warning"><?php echo e($notificationCount); ?></span>
                            <?php endif; ?>
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?php echo e(route('logout')); ?>">
                    <i class='bx bx-log-out-circle fs-5'></i>
                    <span><?php echo e(__('Logout')); ?></span>
                    </a>
                </li>
            <?php else: ?>
                <li class="nav-heading"><?php echo e(__('Dashboard')); ?></li>

                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('admin/dashboard') ? '' : 'collapsed'); ?>" href="<?php echo e(route('admin/dashboard')); ?>">
                        <i class='bx bxs-dashboard' ></i>
                        <span><?php echo e(__('Dashboard')); ?></span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->

                <li class="nav-heading"><?php echo e(__('MASTER')); ?></li>
                

                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('admin/inventaris*') || Request::is('admin/atribut*') ? '' : 'collapsed'); ?>" data-bs-target="#plants-nav" data-bs-toggle="collapse" href="#">
                        <i class="ri-plant-line fs-5"></i><span><?php echo e(__('Master Tanaman')); ?></span>
                        <?php if($readyToHarvestCount > 0): ?>
                            <span class="notification-bubble"></span>
                        <?php endif; ?>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="plants-nav" class="nav-content collapse <?php echo e(Request::is('admin/inventaris*') || Request::is('admin/atribut*') ? 'show' : ''); ?>" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="<?php echo e(Request::is('admin/inventaris/tanaman*') ? 'active' : ''); ?>" href="<?php echo e(route('plants')); ?>">
                                <i class="bi bi-circle"></i>
                                <span><?php echo e(__('List Tanaman')); ?></span>
                                <?php if($readyToHarvestCount > 0): ?>
                                    <span class="notification-bubble"></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(Request::is('admin/atribut*') ? '' : 'collapsed'); ?>" data-bs-target="#plants-attributes-subnav" data-bs-toggle="collapse" href="#">
                                <i class="bi bi-circle-fill"></i><span><?php echo e(__('Kelola Atribut')); ?></span><i class="bi bi-chevron-down ms-auto me-3 fs-6"></i>
                            </a>
                            <ul id="plants-attributes-subnav" class="nav-content collapse <?php echo e(Request::is('admin/atribut*') ? 'show' : ''); ?> ps-3" data-bs-parent="#plants-nav">
                                <li>
                                    <a class="<?php echo e(Request::is('admin/atribut-tanaman/kategori-tanaman*') ? 'active' : ''); ?>" href="<?php echo e(route('categories')); ?>">
                                        <i class="bi bi-circle"></i><span><?php echo e(__('Kategori Tanaman')); ?></span>
                                    </a>
                                </li>   
                                
                                <li>
                                    <a class="<?php echo e(Request::is('admin/atribut-tanaman/tipe-tanaman*') ? 'active' : ''); ?>" href="<?php echo e(route('plantTypes')); ?>">
                                        <i class="bi bi-circle"></i><span><?php echo e(__('Tipe Tanaman')); ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="<?php echo e(Request::is('admin/atribut-tanaman/lokasi-inventaris*') ? 'active' : ''); ?>" href="<?php echo e(route('locations')); ?>">
                                        <i class="bi bi-circle"></i><span><?php echo e(__('Lokasi Penyimpanan')); ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="<?php echo e(Request::is('admin/atribut-tanaman/list-atribut-tanaman') ? 'active' : ''); ?>" href="<?php echo e(route('plantAttributes')); ?>">
                                        <i class="bi bi-circle"></i><span><?php echo e(__('Atribut Tanaman')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-heading"><?php echo e(__('TRANSAKSI')); ?></li>

                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('admin/transaksi*') ? '' : 'collapsed'); ?>" data-bs-target="#plants-transactions-nav" data-bs-toggle="collapse" href="#">
                        <i class='bx bx-transfer-alt fs-5'></i><span><?php echo e(__('Transaksi')); ?></span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="plants-transactions-nav" class="nav-content collapse <?php echo e(Request::is('admin/transaksi*') ? 'show' : ''); ?>" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="<?php echo e(Request::is('admin/transaksi/tanaman-masuk') ? 'active' : ''); ?>" href="<?php echo e(route('transactions.tanaman-masuk')); ?>">
                                <i class="bi bi-circle"></i><span><?php echo e(__('Tanaman Masuk')); ?></span>
                            </a>
                        </li>
                        <li>
                            <a class="<?php echo e(Request::is('admin/transaksi/tanaman-keluar') ? 'active' : ''); ?>" href="<?php echo e(route('transactions.tanaman-keluar')); ?>">
                                <i class="bi bi-circle"></i><span><?php echo e(__('Tanaman Keluar')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-heading"><?php echo e(__('LAPORAN')); ?></li>

                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('laporan*') ? '' : 'collapsed'); ?>" data-bs-target="#plants-report-nav" data-bs-toggle="collapse" href="#">
                        <i class='bx bx-printer fs-5'></i><span><?php echo e(__('Kelola Laporan')); ?></span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="plants-report-nav" class="nav-content collapse <?php echo e(Request::is('laporan*') ? 'show' : ''); ?>" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="<?php echo e(Request::is('laporan/tanaman-masuk') ? 'active' : ''); ?>" href="<?php echo e(route('reports.tanaman-masuk')); ?>">
                                <i class="bi bi-circle"></i><span><?php echo e(__('Lap. Tanaman Masuk')); ?></span>
                            </a>
                        </li>
                        <li>
                            <a class="<?php echo e(Request::is('laporan/tanaman-keluar') ? 'active' : ''); ?>" href="<?php echo e(route('reports.tanaman-keluar')); ?>">
                                <i class="bi bi-circle"></i><span><?php echo e(__('Lap. Tanaman Keluar')); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- End Users Page Nav -->
                <li class="nav-heading"><?php echo e(__('Others')); ?></li>

                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('admin/notifikasi*') ? '' : 'collapsed'); ?>" href="<?php echo e(route('notifications')); ?>">
                        <i class="bx bxs-bell-ring fs-5"></i>
                        <span><?php echo e(__('Notifikasi')); ?>  
                            <?php if($notificationCount > 0): ?>
                                <span class="badge bg-warning"><?php echo e($notificationCount); ?></span>
                            <?php endif; ?>
                        </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('admin/pengaturan*') ? '' : 'collapsed'); ?>" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
                        <i class='bx bx-cog fs-5'></i><span><?php echo e(__('Pengaturan')); ?></span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="settings-nav" class="nav-content collapse <?php echo e(Request::is('admin/pengaturan*') ? 'show' : ''); ?>" data-bs-parent="#sidebar-nav">
                        <!-- Kelola Pengguna -->
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(Request::is('admin/pengaturan/pengguna*') || Request::is('admin/pengaturan/pengguna*') ? '' : 'collapsed'); ?>" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                                <i class="bi bi-circle-fill"></i><span><?php echo e(__('Pengguna')); ?></span><i class="bi bi-chevron-down ms-auto me-3 fs-6"></i>
                            </a>
                            <ul id="users-nav" class="nav-content collapse <?php echo e(Request::is('admin/pengaturan/pengguna*') || Request::is('admin/pengaturan/pengguna*') ? 'show' : ''); ?> ps-3" data-bs-parent="#settings-nav">
                                <li>
                                    <a class="<?php echo e(Request::is('admin/pengaturan/pengguna/list-pengguna') ? 'active' : ''); ?>" href="<?php echo e(route('users')); ?>">
                                        <i class="bi bi-circle"></i><span><?php echo e(__('List Pengguna')); ?></span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="<?php echo e(route('logout')); ?>">
                    <i class='bx bx-log-out-circle fs-5'></i>
                    <span><?php echo e(__('Logout')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        <?php endif; ?>

    </ul>

</aside>
<!-- End Sidebar -->
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/components/sidebar.blade.php ENDPATH**/ ?>