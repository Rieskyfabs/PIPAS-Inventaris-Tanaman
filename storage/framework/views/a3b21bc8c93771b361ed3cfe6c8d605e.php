<?php $__env->startSection('title', 'Data Tanaman'); ?>

<?php $__env->startSection('contents'); ?>
  <div>
    <main id="main" class="main">

      <?php if($plantDetail): ?>
        <?php if (isset($component)) { $__componentOriginal242b7fccb931b9335793237de2b11b36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal242b7fccb931b9335793237de2b11b36 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumbs::resolve(['title' => ''.e(__('List Tanaman ') . ($plantDetail->plantAttribute->name ?? '')).'','items' => [ 
            ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
            ['route' => 'plants', 'label' => 'Data Tanaman'],
            ['label' => 'Detail Tanaman']
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
      <?php else: ?>
        <?php if (isset($component)) { $__componentOriginal242b7fccb931b9335793237de2b11b36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal242b7fccb931b9335793237de2b11b36 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumbs::resolve(['title' => ''.e(__('List Tanaman ') . '').'','items' => [ 
            ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
            ['route' => 'plants', 'label' => 'Data Tanaman'],
            ['label' => 'Detail Tanaman']
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
      <?php endif; ?>

      <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e(__('Detail Data Tanaman  ') . ($plantDetail->plantAttribute->name ?? '')); ?></h5>
                        <div class="add-btn-container">
                            <a href="<?php echo e(route('plants.create')); ?>" class="btn-add-item">
                                +
                                <?php echo e(__('TAMBAH DATA')); ?>

                            </a>
                        </div>

                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table table-bordered table-hover datatable">
                                <thead>
                                    <tr>
                                      <th><?php echo e(__('GAMBAR')); ?></th>
                                      <th><?php echo e(__('NAMA')); ?></th>
                                      <th><?php echo e(__('KATEGORI')); ?></th>
                                      <th><?php echo e(__('MANFAAT')); ?></th>
                                      <th><?php echo e(__('LOKASI')); ?></th>
                                      <th><?php echo e(__('KONDISI')); ?></th>
                                      <th><?php echo e(__('TANGGAL TANAM')); ?></th>
                                      <th><?php echo e(__('EST. TANGGAL PANEN')); ?></th>
                                      <th><?php echo e(__('STATUS')); ?></th>
                                      <th><?php echo e(__('QR CODE')); ?></th>
                                      <th><?php echo e(__('AKSI')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $plants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php if($plant->image): ?>
                                                    <a href="<?php echo e(asset('storage/' . $plant->image)); ?>" target="_blank">
                                                        <img src="<?php echo e(asset('storage/' . $plant->image)); ?>" alt="Image of <?php echo e($plant->plantAttribute->name ?? 'Unknown'); ?>" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                                    </a>
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('default-image.png')); ?>" alt="Default Image" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                                <?php endif; ?> 
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-heading text-truncate">
                                                        <span class="fw-medium"><?php echo e($plant->plantAttribute->name ?? 'Unknown'); ?></span>
                                                    </a>
                                                    <small><?php echo e($plant->plantAttribute->scientific_name ?? 'Unknown'); ?></small>
                                                    <small>
                                                        <?php if($plant->type === 'Sayuran'): ?>
                                                            <span class="badge badge-soft-green">
                                                                <i class="fa fa-carrot" aria-hidden="true" style="font-size: 1.2em; margin-right: 0.5em;"></i> <?php echo e($plant->type); ?>

                                                            </span>
                                                        <?php elseif($plant->type === 'Herbal'): ?>
                                                            <span class="badge badge-soft-warning">
                                                                <i class="fa fa-leaf" aria-hidden="true" style="font-size: 1.2em; margin-right: 0.5em;"></i> <?php echo e($plant->type); ?>

                                                            </span>
                                                        <?php else: ?>
                                                            <span class="badge badge-soft-gray">
                                                                <?php echo e($plant->type ?? 'Unknown'); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </small>
                                                </div>
                                            </td>
                                            <td><?php echo e($plant->category->name ?? 'Kategori tidak ditemukan'); ?></td>
                                            <td><?php echo e($plant->benefit->name ?? 'Manfaat tidak ditemukan'); ?></td>
                                            <td><?php echo e($plant->location->name ?? 'Lokasi tidak ditemukan'); ?></td>
                                            <td>
                                                <span class="badge
                                                    <?php if($plant->status === 'sehat'): ?> badge-soft-green <i class='bi bi-check-circle me-1'></i>
                                                    <?php elseif($plant->status === 'baik'): ?> badge-soft-primary <i class='bi bi-star me-1'></i>
                                                    <?php elseif($plant->status === 'layu'): ?> badge-soft-warning <i class='bi bi-exclamation-triangle me-1'></i>
                                                    <?php elseif($plant->status === 'sakit'): ?> badge-soft-danger <i class='bi bi-exclamation-octagon me-1'></i>
                                                    <?php else: ?> bg-secondary <?php endif; ?>">
                                                    <?php echo e(ucfirst($plant->status)); ?>

                                                </span>
                                            </td>
                                            <td><?php echo e(\Carbon\Carbon::parse($plant->seeding_date)->format('d M Y')); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($plant->harvest_date)->format('d M Y')); ?></td>
                                            <td>
                                                <span class="badge
                                                    <?php if($plant->harvest_status === 'belum panen'): ?> badge-soft-warning
                                                    <?php elseif($plant->harvest_status === 'siap panen'): ?> badge-soft-primary
                                                    <?php elseif($plant->harvest_status === 'sudah dipanen'): ?> badge-soft-green
                                                    <?php endif; ?>">
                                                    <?php echo e(Str::upper($plant->harvest_status)); ?>

                                                    <?php if($plant->harvest_status === 'siap panen'): ?>
                                                        <span class="notification-bubble"></span>
                                                    <?php endif; ?>
                                                </span>
                                            </td>
                                            <td>
                                              <img src="<?php echo e(asset('storage/' . $plant->qr_code)); ?>" alt="QR Code for <?php echo e($plant->name ?? 'Unknown'); ?>">
                                            </td>
                                            <td>
                                                <?php if($plant->harvest_status === 'siap panen'): ?>
                                                    <form action="<?php echo e(route('plants.panen', $plant->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <button type="submit" class="btn btn-success">
                                                            <?php echo e(__('Panen')); ?>

                                                        </button>
                                                    </form>
                                                <?php else: ?>
                                                    <?php if (isset($component)) { $__componentOriginal4dffe1a5f1124477dbf774a1691bd6c0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4dffe1a5f1124477dbf774a1691bd6c0 = $attributes; } ?>
<?php $component = App\View\Components\ActionButtons::resolve(['deleteData' => ''.e(route('plants.destroy', $plant->id)).'','method' => 'DELETE','submit' => 'true','dropdown' => [ 
                                                            ['href' => route('plants.edit', $plant->id), 'label' => 'Edit'],
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/admin/pages/plants/show.blade.php ENDPATH**/ ?>