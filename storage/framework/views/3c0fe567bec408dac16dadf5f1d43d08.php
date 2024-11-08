<header class="navigation bg-tertiary">
  <nav class="navbar">
    <div class="container nav-wrapper">
      <a href="#" class="logo"><span><i class="fa-solid fa-seedling"></i> DAMASU</span></a>
      <div class="menu-wrapper">
        <ul class="menu">
            <li class="<?php echo e(request()->is('#') ? 'active' : ''); ?> menu-item"><a href="#" class="menu-link">Home</a></li>
            <li class="<?php echo e(request()->is('#about') ? 'active' : ''); ?> menu-item"><a href="#about" class="menu-link">Tentang PIPAS</a></li>
            <li class="<?php echo e(request()->is('#galeri') ? 'active' : ''); ?> menu-item"><a href="#galeri" class="menu-link">Galeri</a></li>
            <li class="<?php echo e(request()->is('#team') ? 'active' : ''); ?> menu-item"><a href="#team" class="menu-link">Our Team</a></li>
            <li class="<?php echo e(request()->is('#contact-form') ? 'active' : ''); ?> menu-item"><a href="#contact-form" class="menu-link">Contact</a></li>
            <!-- <li class="menu-item"><a href="#contact-form" class="menu-link">Contact</a></li> -->
        </ul>
        <?php if(Route::has('login')): ?>
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->role->name == 'admin'): ?>
                        <a href="<?php echo e(route('admin/dashboard')); ?>" class="btn-login"><i class="fas fa-sign-in-alt"></i> <?php echo e(__('Admin Dashboard')); ?></a>
                    <?php elseif(Auth::user()->role->name == 'master'): ?>
                        <a href="<?php echo e(route('master/dashboard')); ?>" class="btn-login"><i class="fas fa-sign-in-alt"></i> <?php echo e(__('Master Dashboard')); ?></a>
                    <?php else: ?>
                        <a href="<?php echo e(route('dashboard')); ?>" class="btn-login"><i class="fas fa-sign-in-alt"></i> <?php echo e(__('Dashboard')); ?></a>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="btn-login"><i class="fas fa-sign-in-alt"></i> <?php echo e(__('Login')); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
      </div>
    </div>
  </nav>
</header><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/landing-page/components/_navigation.blade.php ENDPATH**/ ?>