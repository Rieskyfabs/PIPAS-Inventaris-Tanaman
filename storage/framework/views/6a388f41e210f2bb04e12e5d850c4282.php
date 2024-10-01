<li class="nav-item dropdown">
  <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
    <i class="bi bi-bell"></i>
    <span class="badge bg-primary badge-number"><?php echo e($notificationCount); ?></span>
  </a>
  <!-- End Notification Icon -->

  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
    <li class="dropdown-header">
      You have <?php echo e($notificationCount); ?> new notifications
      <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
    </li>
    <li>
      <hr class="dropdown-divider">
    </li>

    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li class="notification-item">
        <i class="bi <?php echo e($notification['icon']); ?> <?php echo e($notification['iconColor']); ?>"></i>
        <div>
          <h4><?php echo e($notification['title']); ?></h4>
          <p><?php echo e($notification['message']); ?></p>
          <p><?php echo e($notification['timeAgo']); ?></p>
        </div>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <li class="dropdown-footer">
      <a href="#">Show all notifications</a>
    </li>
  </ul>
  <!-- End Notification Dropdown Items -->
</li>
<!-- End Notification Nav -->
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/components/notification-dropdown.blade.php ENDPATH**/ ?>