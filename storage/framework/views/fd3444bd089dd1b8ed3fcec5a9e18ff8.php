<?php $__env->startSection('title', 'Data Pengguna'); ?>

<?php $__env->startSection('contents'); ?>
  <div>
    <main id="main" class="main">

      <?php if (isset($component)) { $__componentOriginal242b7fccb931b9335793237de2b11b36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal242b7fccb931b9335793237de2b11b36 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumbs::resolve(['title' => ''.e(__('Users')).'','items' => [
          ['route' => 'home', 'label' => 'Home'],
          ['label' => 'Users']
        ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Breadcrumbs::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal242b7fccb931b9335793237de2b11b36)): ?>
<?php $attributes = $__attributesOriginal242b7fccb931b9335793237de2b11b36; ?>
<?php unset($__attributesOriginal242b7fccb931b9335793237de2b11b36); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal242b7fccb931b9335793237de2b11b36)): ?>
<?php $component = $__componentOriginal242b7fccb931b9335793237de2b11b36; ?>
<?php unset($__componentOriginal242b7fccb931b9335793237de2b11b36); ?>
<?php endif; ?>

      <section class="section dashboard">
        <div class="row">
          <!-- Total Users Card -->
            <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve(['type' => 'plants','title' => 'Total Pengguna','icon' => 'bi bi-people','value' => ''.e($users->count()).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['period' => 'Hari ini','changePercent' => '12','changeType' => 'increase','filter' => true,'filterOptions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Hari ini', 'Bulan Ini', 'Tahun Ini'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $attributes = $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $component = $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
            <!-- End Total Users Card -->
            
            <!-- Total Users Active Card -->
            <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve(['type' => 'revenue','title' => 'Total Pengguna Aktif','icon' => 'bi bi-person-check','value' => ''.e($activeUsersCount).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['period' => 'Hari ini','changePercent' => '8','changeType' => 'decrease','filter' => true,'filterOptions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Hari ini', 'Bulan Ini', 'Tahun Ini'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $attributes = $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $component = $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
            <!-- End Total Users Active Card -->

            <!-- Total Users Inactive Card -->
            <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve(['type' => 'location','title' => 'Total Pengguna Tidak Aktif','icon' => 'bi bi-person-dash','value' => ''.e($inactiveUsersCount).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['period' => 'Hari ini','changePercent' => '12','changeType' => 'increase','filter' => true,'filterOptions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['Hari ini', 'Bulan Ini', 'Tahun Ini'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $attributes = $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64)): ?>
<?php $component = $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64; ?>
<?php unset($__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64); ?>
<?php endif; ?>
            <!-- End Total Users Inactive Card -->

          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?php echo e(__('Users Data')); ?></h5>
                <div class="add-btn-container">
                  <a href="<?php echo e(route('users.create')); ?>" class="btn-add-item">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                    <?php echo e(__('Add Users')); ?>

                  </a>
                </div>
              <div class="table-responsive">
                <!-- Table with stripped rows -->
                <table class="table table-bordered table-hover datatable">
                  <thead>
                      <tr>
                        <th><?php echo e(__('USER')); ?></th>
                        <th><?php echo e(__('ROLE')); ?></th>
                        <th><?php echo e(__('STATUS')); ?></th>
                        <th><?php echo e(__('ACTIONS')); ?></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <div class="d-flex justify-content-start align-items-center user-name">
                              <div class="avatar-wrapper"><div class="avatar avatar-sm me-4">
                                <?php if($user->profile_image): ?>
                                    <img src="<?php echo e(asset($user->profile_image)); ?>" alt="Profile Image" class="users-image">
                                <?php else: ?>
                                    <img src="<?php echo e(Avatar::create($user->username)->toBase64()); ?>" class="users-image" />
                                <?php endif; ?>
                              </div>
                            </div>
                            <div class="d-flex flex-column">
                              <a href="app-user-view-account.html" class="text-heading text-truncate">
                                <span class="fw-medium"><?php echo e($user->username); ?></span>
                              </a><small><?php echo e($user->email); ?></small>
                            </div>
                          </td>
                          <td>
                              <span class="role-label <?php echo e(strtolower($user->role->name)); ?>">
                                  <?php if($user->role->name === 'admin'): ?>
                                      <i class="fas fa-desktop"></i> <!-- Icon for Admin -->
                                  <?php elseif($user->role->name === 'master'): ?>
                                      <i class="fa-solid fa-crown"></i> <!-- Icon for Super Admin -->
                                  <?php elseif($user->role->name === 'user'): ?>
                                      <i class="fas fa-user"></i> <!-- Icon for Guest -->
                                  <?php else: ?>
                                      <i class="fas fa-user-tag"></i> <!-- Default icon for other roles (optional) -->
                                  <?php endif; ?>
                                  <?php echo e(ucfirst($user->role->name)); ?> <!-- Capitalizes the first letter of the role name -->
                              </span>
                          </td>
                          <td>
                              <?php if($user->status == 'active'): ?>
                                  <span class="badge badge-soft-green"><?php echo e(__('Active')); ?></span>
                              <?php elseif($user->status == 'inactive'): ?>
                                  <span class="badge badge-soft-gray"><?php echo e(__('Inactive')); ?></span>
                              <?php else: ?>
                                  <span class="badge badge-soft-secondary"><?php echo e(__('Unknown')); ?></span>
                              <?php endif; ?>
                          </td>
                          <td>
                              <?php if (isset($component)) { $__componentOriginal4dffe1a5f1124477dbf774a1691bd6c0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4dffe1a5f1124477dbf774a1691bd6c0 = $attributes; } ?>
<?php $component = App\View\Components\ActionButtons::resolve(['deleteData' => ''.e(route('users.destroy', $user->id)).'','method' => 'DELETE','submit' => 'true','dropdown' => [ 
                                      ['href' => route('users.edit', $user->id), 'label' => 'Edit'], 
                                      ['href' => '#', 'label' => 'Suspend User'] 
                                  ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('action-buttons'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ActionButtons::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4dffe1a5f1124477dbf774a1691bd6c0)): ?>
<?php $attributes = $__attributesOriginal4dffe1a5f1124477dbf774a1691bd6c0; ?>
<?php unset($__attributesOriginal4dffe1a5f1124477dbf774a1691bd6c0); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4dffe1a5f1124477dbf774a1691bd6c0)): ?>
<?php $component = $__componentOriginal4dffe1a5f1124477dbf774a1691bd6c0; ?>
<?php unset($__componentOriginal4dffe1a5f1124477dbf774a1691bd6c0); ?>
<?php endif; ?>
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </main>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/admin/pages/users/index.blade.php ENDPATH**/ ?>