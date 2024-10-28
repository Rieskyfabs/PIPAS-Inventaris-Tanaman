<li class="nav-item dropdown">
  <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
    <i class="ri-notification-3-line"></i>
    <?php if($notificationCount > 0): ?>
        <span class="notification-bubble-header"></span> <!-- Notification bubble without count -->
    <?php endif; ?>
  </a>

  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
    <li class="dropdown-header">
      Kamu Memiliki <?php echo e($notificationCount); ?> Notifikasi Baru
      
      <?php if(Auth::user()->role->name == 'user'): ?>
        <a href="<?php echo e(route('users.notifications')); ?>">
          <span class="badge rounded-pill bg-primary p-2 ms-2"><?php echo e(__('Lihat Semua')); ?></span>
        </a>
      <?php else: ?>
        <a href="<?php echo e(route('notifications')); ?>">
          <span class="badge rounded-pill bg-primary p-2 ms-2"><?php echo e(__('Lihat Semua')); ?></span>
        </a>
      <?php endif; ?>
    </li>
    
    <li>
      <hr class="dropdown-divider">
    </li>

    <div class="scrollable-dropdown">
      <?php if(empty($notifications)): ?>
        <li class="notification-item">
          <i class="bi bi-info-circle"></i>
          <div>
            <h4><?php echo e(__('Tidak Ada Notifikasi Terbaru')); ?></h4>
            <p><?php echo e(__('Anda Sudah Up-To-Date!')); ?></p>
          </div>
        </li>
      <?php else: ?>
        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="notification-item">
            <i class="bi <?php echo e($notification['icon']); ?> <?php echo e($notification['iconColor']); ?>"></i>
            <a href="<?php echo e($notification['url']); ?>">
              <div>
                <h4><?php echo e($notification['title']); ?></h4>
                <p><?php echo e($notification['message']); ?></p>
                <p><?php echo e($notification['location']); ?></p>
                <p><?php echo e($notification['timeAgo']); ?></p>
              </div>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    </div>

    <li class="dropdown-footer">
      <?php if(Auth::user()->role->name == 'user'): ?>
        <a href="<?php echo e(route('users.notifications')); ?>"><?php echo e(__('Lihat Semua Notifikasi')); ?></a>
      <?php else: ?>
        <a href="<?php echo e(route('notifications')); ?>"><?php echo e(__('Lihat Semua Notifikasi')); ?></a>
      <?php endif; ?>
    </li>
  </ul>
</li>
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/components/notification-dropdown.blade.php ENDPATH**/ ?>