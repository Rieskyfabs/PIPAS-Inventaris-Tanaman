<!-- view/landing-page/components/AuthButtonsComponent.blade.php -->
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
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/landing-page/components/_auth-button.blade.php ENDPATH**/ ?>