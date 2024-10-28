<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('contents'); ?>
  <div>
    <main id="main" class="main">

      <?php if (isset($component)) { $__componentOriginal242b7fccb931b9335793237de2b11b36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal242b7fccb931b9335793237de2b11b36 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumbs::resolve(['title' => 'Transaksi Tanaman Keluar','items' => [
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'Transaksi Tanaman Keluar']
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
                <h5 class="card-title"><?php echo e(__('TRANSAKSI TANAMAN KELUAR')); ?></h5>
                <div class="add-btn-container">
                  
                </div>

                <!-- Table with stripped rows -->
                <table class="table table-bordered table-hover datatable">
                    <thead>
                        <tr>
                          <th><?php echo e(__('NO')); ?></th>
                          <th><?php echo e(__('GAMBAR')); ?></th>
                          <th><?php echo e(__('KODE TANAMAN KELUAR')); ?></th>
                          <th><?php echo e(__('KODE TANAMAN')); ?></th>
                          <th><?php echo e(__('NAMA TANAMAN')); ?></th>
                          <th><?php echo e(__('KONDISI TANAMAN')); ?></th>
                          <th><?php echo e(__('TANGGAL KELUAR')); ?></th>
                          <th><?php echo e(__('JUMLAH KELUAR')); ?></th>
                          
                          <th><?php echo e(__('AKSI')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $tanamanKeluar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td><?php echo e($loop->iteration); ?></td>
                              <td>
                                  <?php if($item->plant->image): ?>
                                      <a href="<?php echo e(asset('storage/' . $item->plant->image)); ?>" target="_blank">
                                          <img src="<?php echo e(asset('storage/' . $item->plant->image)); ?>" alt="Image of <?php echo e($item->plant->name); ?>" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                      </a>
                                  <?php else: ?>
                                      <img src="<?php echo e(asset('default-image.png')); ?>" alt="Default Image" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                  <?php endif; ?> 
                              </td>
                              <td><?php echo e($item->kode_tanaman_keluar); ?></td>
                              <td><?php echo e($item->plant->plantAttribute->plant_code); ?></td>
                              <td><?php echo e($item->plant->plantAttribute->name); ?></td>
                              <td>
                                  <span class="badge
                                      <?php if($item->plant->status === 'sehat'): ?> badge-soft-green <i class='bi bi-check-circle me-1'></i>
                                      <?php elseif($item->plant->status === 'baik'): ?> badge-soft-primary <i class='bi bi-star me-1'></i>
                                      <?php elseif($item->plant->status === 'layu'): ?> badge-soft-warning <i class='bi bi-exclamation-triangle me-1'></i>
                                      <?php elseif($item->plant->status === 'sakit'): ?> badge-soft-danger <i class='bi bi-exclamation-octagon me-1'></i>
                                      <?php else: ?> bg-secondary <?php endif; ?>">
                                      <?php echo e(ucfirst($item->plant->status)); ?>

                                  </span>
                              </td>
                              <td><?php echo e($item->tanggal_keluar); ?></td>
                              <td><?php echo e($item->jumlah_keluar); ?></td>
                              
                              <td>
                                  <?php if (isset($component)) { $__componentOriginal4dffe1a5f1124477dbf774a1691bd6c0 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4dffe1a5f1124477dbf774a1691bd6c0 = $attributes; } ?>
<?php $component = App\View\Components\ActionButtons::resolve(['deleteData' => ''.e(route('categories.destroy', $item->id)).'','method' => 'DELETE','submit' => 'true','dropdown' => [ 
                                        ['href' => route('categories.edit', $item->id), 'label' => 'Edit'], 
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
      </section>
      
    </main>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/admin/pages/transactions/tanaman_keluar.blade.php ENDPATH**/ ?>