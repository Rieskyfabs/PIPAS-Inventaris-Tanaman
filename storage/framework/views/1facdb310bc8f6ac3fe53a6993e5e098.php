<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <?php if(auth()->guard()->check()): ?>
            <!-- User Info -->
            <div class="user-info">
                <div class="avatar">
                    <!-- Fetch the user's avatar from the specified path, or use a default image if none exists -->
                    <img src="<?php echo e(Auth::user()->avatar ? asset('assets/img/' . Auth::user()->avatar) : Avatar::create(Auth::user()->username)->toBase64()); ?>" 
                        alt="User Avatar" class="rounded-circle" width="50px">
                </div>
                <div class="user-details">
                    <!-- Display the logged-in user's username -->
                    <h6><?php echo e(Auth::user()->username); ?></h6>
                    <!-- Display the user's role -->
                    <span><?php echo e(Auth::user()->role->name); ?></span>
                </div>
            </div>

            <?php if(Auth::user()->role->name == 'user'): ?>
                <li class="nav-heading"><?php echo e(__('Dashboard')); ?></li>

                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('dashboard') ? '' : 'collapsed'); ?>" href="<?php echo e(route('dashboard')); ?>">
                        <i class="bi bi-grid"></i>
                        <span><?php echo e(__('Dashboard')); ?></span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
            <?php else: ?>
                <li class="nav-heading"><?php echo e(__('Dashboard')); ?></li>

                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('admin/dashboard') ? '' : 'collapsed'); ?>" href="<?php echo e(route('admin/dashboard')); ?>">
                        <i class="bi bi-grid"></i>
                        <span><?php echo e(__('Dashboard')); ?></span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->

                <li class="nav-heading"><?php echo e(__('Menu')); ?></li>

                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('admin/inventaris*') || Request::is('admin/attributes*') ? '' : 'collapsed'); ?>" data-bs-target="#plants-nav" data-bs-toggle="collapse" href="#">
                        <i class="ri-plant-line fs-5"></i><span><?php echo e(__('Kelola Tanaman')); ?></span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="plants-nav" class="nav-content collapse <?php echo e(Request::is('admin/inventaris*') || Request::is('admin/attributes*') ? 'show' : ''); ?>" data-bs-parent="#sidebar-nav">
                        <li>
                            <a class="<?php echo e(Request::is('admin/inventaris/plants*') ? 'active' : ''); ?>" href="<?php echo e(route('plants')); ?>">
                                <i class="bi bi-circle"></i><span><?php echo e(__('List Tanaman')); ?></span>
                            </a>
                        </li>
                        
                        <!-- Plant Attributes as nav-item with sub-menu -->
                        <li class="nav-item">
                            <a class="nav-link <?php echo e(Request::is('admin/attributes*') ? '' : 'collapsed'); ?>" data-bs-target="#plants-attributes-subnav" data-bs-toggle="collapse" href="#">
                                <i class="bi bi-circle-fill"></i><span><?php echo e(__('Kelola Atribut')); ?></span><i class="bi bi-chevron-down ms-auto me-3 fs-6"></i>
                            </a>
                            <ul id="plants-attributes-subnav" class="nav-content collapse <?php echo e(Request::is('admin/attributes*') ? 'show' : ''); ?> ps-3" data-bs-parent="#plants-nav">
                                <li>
                                    <a class="<?php echo e(Request::is('admin/attributes/plant-attributes') ? 'active' : ''); ?>" href="<?php echo e(route('plantCodes')); ?>">
                                        <i class="bi bi-circle"></i><span><?php echo e(__('Atribut Tanaman')); ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="<?php echo e(Request::is('admin/attributes/categories') ? 'active' : ''); ?>" href="<?php echo e(route('categories')); ?>">
                                        <i class="bi bi-circle"></i><span><?php echo e(__('Kategori Tanaman')); ?></span>
                                    </a>
                                </li>   
                                <li>
                                    <a class="<?php echo e(Request::is('admin/attributes/benefits') ? 'active' : ''); ?>" href="<?php echo e(route('benefits')); ?>">
                                        <i class="bi bi-circle"></i><span><?php echo e(__('Manfaat Tanaman')); ?></span>
                                    </a>
                                </li>
                                <li>
                                    <a class="<?php echo e(Request::is('admin/attributes/locations') ? 'active' : ''); ?>" href="<?php echo e(route('locations')); ?>">
                                        <i class="bi bi-circle"></i><span><?php echo e(__('Lokasi Penyimpanan')); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-heading"><?php echo e(__('Users')); ?></li>

                    <!-- Kelola Pengguna -->
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::is('admin/users*') || Request::is('admin/role-permissions*') ? '' : 'collapsed'); ?>" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                            <i class="ri-admin-line"></i><span><?php echo e(__('Kelola Pengguna')); ?></span><i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                        <ul id="users-nav" class="nav-content collapse <?php echo e(Request::is('admin/users*') || Request::is('admin/role-permissions*') ? 'show' : ''); ?>" data-bs-parent="#sidebar-nav">
                            <li>
                                <a class="<?php echo e(Request::is('admin/users*') ? 'active' : ''); ?>" href="<?php echo e(route('users')); ?>">
                                    <i class="bi bi-circle"></i><span><?php echo e(__('List Pengguna')); ?></span>
                                </a>
                            </li>

                            <!-- Roles & Permissions as sub-menu -->
                            <li class="nav-item">
                                <a class="nav-link <?php echo e(Request::is('admin/role-permissions*') ? '' : 'collapsed'); ?>" data-bs-target="#roles-permissions-subnav" data-bs-toggle="collapse" href="#">
                                    <i class="bi bi-circle-fill"></i><span><?php echo e(__('Roles & Permissions')); ?></span><i class="bi bi-chevron-down ms-auto me-3 fs-6"></i>
                                </a>
                                <ul id="roles-permissions-subnav" class="nav-content collapse <?php echo e(Request::is('admin/role-permissions*') ? 'show' : ''); ?> ps-3" data-bs-parent="#users-nav">
                                    <li>
                                        <a class="<?php echo e(Request::is('admin/role-permissions/permissions*') ? 'active' : ''); ?>" href="<?php echo e(route('permissions')); ?>">
                                            <i class="bi bi-circle"></i><span><?php echo e(__('Permissions')); ?></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="<?php echo e(Request::is('admin/role-permissions/roles*') ? 'active' : ''); ?>" href="<?php echo e(route('roles')); ?>">
                                            <i class="bi bi-circle"></i><span><?php echo e(__('Roles')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                <!-- End Users Page Nav -->

            <?php endif; ?>
        <?php endif; ?>

    </ul>

</aside>
<!-- End Sidebar -->
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/components/sidebar.blade.php ENDPATH**/ ?>