<?php $__env->startSection('title', 'Data Pengguna'); ?>

<?php $__env->startSection('contents'); ?>
  <div>
    <main id="main" class="main">

      <?php if (isset($component)) { $__componentOriginal242b7fccb931b9335793237de2b11b36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal242b7fccb931b9335793237de2b11b36 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumbs::resolve(['title' => ''.e(__('Add New User')).'','items' => [
          ['route' => 'home', 'label' => 'Home'],
          ['route' => 'users', 'label' => 'Users'],
          ['label' => 'Add New User']
        ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Breadcrumbs::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['c' => true]); ?>
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
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?php echo e(__('Tambahkan User Baru')); ?></h5>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <!-- Advanced Form Elements -->
                  <form action="<?php echo e(route('users.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
                        <label for="floatingInput"><?php echo e(__('Username')); ?></label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
                        <label for="floatingEmail"><?php echo e(__('Email address')); ?></label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword"><?php echo e(__('Password')); ?></label>
                    </div>

                    <div class="form-floating mb-3">
                        <select name="role_id" class="form-select" id="userRole" required>
                            <option value="" disabled selected><?php echo e(__('Silahkan pilih role')); ?></option>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role->id); ?>"><?php echo e(ucfirst($role->name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <label for="userRole"><?php echo e(__('User Role')); ?></label>
                    </div>

                    <div class="form-floating mb-3">
                        <select name="status" class="form-select" id="userStatus" required>
                            <option value="active"><?php echo e(__('Active')); ?></option>
                            <option value="inactive"><?php echo e(__('Inactive')); ?></option>
                        </select>
                        <label for="userStatus"><?php echo e(__('Status')); ?></label>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                  </form>
                <!-- End General Form Elements -->
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </main>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/admin/pages/users/create.blade.php ENDPATH**/ ?>