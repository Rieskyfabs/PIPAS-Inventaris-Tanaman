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
                                      <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <div class="text-heading text-truncate">
                                                      <span class="fw-medium"><?php echo e($item->name); ?></span>
                                                    </div>
                                                    <small><?php echo e($item->description ?? 'Tidak Ada Deskripsi'); ?></small>
                                                </div>
                                            </td>
                                            <td><?php echo e($item->created_at->format('d F Y, H:i')); ?></td>
                                            <td>
                                                <div style="display: flex; align-items: center;">
                                                    <button type="button" class="icon-button" data-bs-toggle="modal" data-bs-target="#EditLocation<?php echo e($item->id); ?>">
                                                        <i class='bx bx-edit'></i>
                                                    </button>
                                                    <?php if (isset($component)) { $__componentOriginal4dffe1a5f1124477dbf774a1691bd6c0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4dffe1a5f1124477dbf774a1691bd6c0 = $attributes; } ?>
<?php $component = App\View\Components\ActionButtons::resolve(['deleteData' => ''.e(route('locations.destroy', $item->id)).'','method' => 'DELETE','submit' => 'true'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
                                                </div>
                                            </td>
                                          </tr>
                                            <?php echo $__env->make('modals.edit_location_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tbody>
                              </table>
                              <!-- End Table with stripped rows -->
                          </div>
                        <?php echo $__env->make('modals.create_location_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                      </div>
                  </div>
              </div>
          </div>
      </section>

    </main>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/admin/pages/locations/index.blade.php ENDPATH**/ ?>