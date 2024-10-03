<li class="nav-item dropdown pe-3">
  <!-- Profile Icon with Dropdown -->
  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
    <!-- Profile Image or Initials Avatar -->
    <?php if($profileImage && filter_var($profileImage, FILTER_VALIDATE_URL)): ?>
        <img src="<?php echo e($profileImage); ?>" alt="Profile" class="rounded-circle" style="width: 40px; height: 40px;">
    <?php else: ?>
        <div class="initials-avatar rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
            <img src="<?php echo e(Avatar::create($username)->toBase64()); ?>" class="users-image" />
        </div>
    <?php endif; ?>

    <!-- Username -->
    <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo e($username); ?></span>
  </a>

  <!-- Dropdown Menu -->
  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
    <!-- User Details -->
    <li class="dropdown-header custom-profile-header d-flex align-items-center">
      <!-- Profile Image in the Dropdown Header -->
      <img src="<?php echo e($profileImage); ?>" alt="Profile" class="custom-profile-image">
      
      <!-- User Info -->
      <div class="custom-user-info">
        <h6 class="custom-username"><?php echo e($username); ?></h6>
        <span class="custom-role"><?php echo e($role); ?></span>
      </div>
    </li>
    <li><hr class="dropdown-divider"></li>

    <!-- Menu Items -->
    <li>
      <a class="dropdown-item d-flex align-items-center" href="<?php echo e($profileUrl); ?>">
        <i class="bi bi-person"></i>
        <span><?php echo e(__('My Profile')); ?></span>
      </a>
    </li>

    

    

    <li>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <i class="bi bi-question-circle"></i>
        <span><?php echo e(__('FAQ')); ?></span>
      </a>
    </li>

    <li><hr class="dropdown-divider"></li>

    <!-- Logout -->
    <li>
      <a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('logout')); ?>">
        <i class="bi bi-box-arrow-right"></i>
        <span><?php echo e(__('Log Out')); ?></span>
      </a>
    </li>
  </ul>
</li>
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/components/profile-dropdown.blade.php ENDPATH**/ ?>