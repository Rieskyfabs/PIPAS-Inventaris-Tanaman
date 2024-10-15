<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('contents'); ?>
  <div>
    <main id="main" class="main">

      <?php if (isset($component)) { $__componentOriginal242b7fccb931b9335793237de2b11b36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal242b7fccb931b9335793237de2b11b36 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumbs::resolve(['title' => 'Lokasi Penyimpanan','items' => [
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'Lokasi Penyimpanan']
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
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title"><?php echo e(__('DATA LOKASI PENYIMPANAN')); ?></h5>
                          <div class="add-btn-container">
                              <!-- Button to trigger modal -->
                              <button type="button" class="btn-add-item" data-bs-toggle="modal" data-bs-target="#Location">
                                  <i class="ri-add-fill"></i>
                                  <?php echo e(__('TAMBAH')); ?>

                              </button>
                          </div>

                          <div class="table-responsive">
                              <!-- Table with stripped rows -->
                              <table class="table table-bordered table-hover datatable">
                                  <thead>
                                      <tr>
                                          <th>NO</th>
                                          <th><?php echo e(__('NAMA LOKASI')); ?></th>
                                          <th><?php echo e(__('DIBUAT PADA')); ?></th>
                                          <th><?php echo e(__('AKSI')); ?></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                              <td><?php echo e($loop->iteration); ?></td>
                                              <td><?php echo e($location->name); ?></td>
                                              <td><?php echo e($location->created_at->format('d F Y, H:i')); ?></td>
                                              <td>
                                                  <?php if (isset($component)) { $__componentOriginal4dffe1a5f1124477dbf774a1691bd6c0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4dffe1a5f1124477dbf774a1691bd6c0 = $attributes; } ?>
<?php $component = App\View\Components\ActionButtons::resolve(['deleteData' => ''.e(route('locations.destroy', $location->id)).'','method' => 'DELETE','submit' => 'true','dropdown' => [
                                                            ['href' => route('locations.edit', $location->id), 'label' => 'Edit'],
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

                          <!-- Create Locations Modal -->
                          <div class="modal fade" id="Location" tabindex="-1" aria-labelledby="LocationLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="LocationLabel"><?php echo e(__('Tambahkan Lokasi Baru')); ?></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          <?php if($errors->any()): ?>
                                              <div class="alert alert-danger">
                                                  <ul>
                                                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                          <li><?php echo e($error); ?></li>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                  </ul>
                                              </div>
                                          <?php endif; ?>
                                          <form action="<?php echo e(route('locations.store')); ?>" method="POST">
                                              <?php echo csrf_field(); ?>
                                              <div class="form-floating mb-3">
                                                  <input type="text" name="name" class="form-control" id="floatingInputName" placeholder="name" required>
                                                  <label for="floatingInputName"><?php echo e(__('Nama Lokasi')); ?></label>
                                              </div>
                                              <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- End Locations Modal -->

                      </div>
                  </div>
              </div>
          </div>
      </section>

    </main>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/admin/pages/locations/index.blade.php ENDPATH**/ ?>