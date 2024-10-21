<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('contents'); ?>
  <div>
    <main id="main" class="main">

      <?php if (isset($component)) { $__componentOriginal242b7fccb931b9335793237de2b11b36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal242b7fccb931b9335793237de2b11b36 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumbs::resolve(['title' => 'Atribut Tanaman','items' => [
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'Atribut Tanaman']
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
                          <h5 class="card-title"><?php echo e(__('Atribut Tanaman')); ?></h5>
                          <div class="add-btn-container">
                              <a href="<?php echo e(route('plantAttributes.create')); ?>" class="btn-add-item">
                                  +
                                  <?php echo e(__('TAMBAH')); ?>

                              </a>
                          </div>

                          <div class="table-responsive">
                              <!-- Table with stripped rows -->
                              <table class="table table-bordered table-hover datatable">
                                  <thead>
                                      <tr>
                                          <th>NO</th>
                                          <th><?php echo e(__('KODE TANAMAN')); ?></th>
                                          <th><?php echo e(__('NAMA TANAMAN')); ?></th>
                                          <th><?php echo e(__('KATEGORI')); ?></th>
                                          <th><?php echo e(__('MANFAAT')); ?></th>
                                          <th><?php echo e(__('DESKRIPSI')); ?></th>
                                          <th><?php echo e(__('DIBUAT PADA')); ?></th>
                                          <th><?php echo e(__('AKSI')); ?></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $__currentLoopData = $plantAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                              <td><?php echo e($loop->iteration); ?></td>
                                              <td><?php echo e($item->plant_code); ?></td>
                                              <td>
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-heading text-truncate">
                                                        <span class="fw-medium"><?php echo e($item->name); ?></span>
                                                    </a>
                                                    <small><?php echo e($item->scientific_name ?? 'Unknown'); ?></small>
                                                    <small>
                                                        <?php if($item->type === 'Sayuran'): ?>
                                                            <span class="badge badge-soft-green">
                                                                <i class="fa fa-carrot" aria-hidden="true" style="font-size: 1.2em; margin-right: 0.5em;"></i> <?php echo e($item->type); ?>

                                                            </span>
                                                        <?php elseif($item->type === 'Herbal'): ?>
                                                            <span class="badge badge-soft-warning">
                                                                <i class="fa fa-leaf" aria-hidden="true" style="font-size: 1.2em; margin-right: 0.5em;"></i> <?php echo e($item->type); ?>

                                                            </span>
                                                        <?php else: ?>
                                                            <span class="badge badge-soft-gray">
                                                                <?php echo e($item->type ?? 'Unknown'); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </small>
                                                </div>
                                            </td>
                                            <td><?php echo e($item->category->name ?? 'Kategori tidak ditemukan'); ?></td>
                                            <td><?php echo e($item->benefit->name ?? 'Manfaat tidak ditemukan'); ?></td>
                                            <td><?php echo e($item->description ?? 'No Description'); ?></td>
                                            <td><?php echo e($item->created_at->format('d F Y, H:i')); ?></td>
                                            <td>
                                            <?php if (isset($component)) { $__componentOriginal4dffe1a5f1124477dbf774a1691bd6c0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4dffe1a5f1124477dbf774a1691bd6c0 = $attributes; } ?>
<?php $component = App\View\Components\ActionButtons::resolve(['deleteData' => ''.e(route('plantAttributes.destroy', $item->id)).'','method' => 'DELETE','submit' => 'true','dropdown' => [
                                                    ['href' => route('plantAttributes.edit', $item->id), 'label' => 'Edit'],
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/admin/pages/plantAttributes/index.blade.php ENDPATH**/ ?>