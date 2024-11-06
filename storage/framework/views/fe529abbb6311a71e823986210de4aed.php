<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('contents'); ?>
  <div>
    <main id="main" class="main">

      <?php if (isset($component)) { $__componentOriginal242b7fccb931b9335793237de2b11b36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal242b7fccb931b9335793237de2b11b36 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumbs::resolve(['title' => 'Laporan Tanaman Masuk','items' => [
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'Laporan Tanaman Masuk']
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
                <h5 class="card-title"><?php echo e(__('LAPORAN TANAMAN MASUK')); ?></h5>
                
                <div class="d-flex justify-content-between align-items-center mb-3">

                  <?php if(auth()->guard()->check()): ?>
                    <div class="add-btn-container d-flex">
                        <a href="<?php echo e(route('reports.tanaman-masuk.export.excel', ['start_date' => request('start_date'), 'end_date' => request('end_date'), 'type' => 'masuk'])); ?>" class="btn btn-success me-2" data-bs-toggle="tooltip" title="Export to Excel">
                            <i class="bi bi-file-earmark-excel"></i> Export Excel
                        </a>
                        <a href="<?php echo e(route('reports.tanaman-masuk.export.pdf', ['start_date' => request('start_date'), 'end_date' => request('end_date'), 'type' => 'masuk'])); ?>" class="btn btn-danger me-2" data-bs-toggle="tooltip" title="Export to PDF">
                            <i class="bi bi-file-earmark-pdf"></i> Export PDF
                        </a>
                        <a href="<?php echo e(route('reports.tanaman-masuk.print', ['start_date' => request('start_date'), 'end_date' => request('end_date'), 'type' => 'masuk'])); ?>" class="btn btn-secondary" data-bs-toggle="tooltip" title="Print">
                            <i class="bi bi-printer"></i> Print
                        </a>
                    </div>
                  <?php endif; ?>

                    <form method="GET" action="<?php echo e(route('reports.tanaman-masuk')); ?>" class="d-flex align-items-end">
                        <div class="d-flex">
                            <div class="me-2">
                                <label for="start_date" class="form-label">Tanggal Awal</label>
                                <input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo e(request('start_date')); ?>" placeholder="Tanggal Awal">
                            </div>
                            <div class="me-2">
                                <label for="end_date" class="form-label">Tanggal Akhir</label>
                                <input type="date" name="end_date" id="end_date" class="form-control" value="<?php echo e(request('end_date')); ?>" placeholder="Tanggal Akhir">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2"><?php echo e(__('Filter')); ?></button>
                        <a href="<?php echo e(route('reports.tanaman-masuk')); ?>" class="btn btn-secondary"><?php echo e(__('Reset')); ?></a>
                    </form>
                </div>

                <!-- Table with stripped rows -->
                <table class="table table-bordered table-hover datatable">
                    <thead>
                        <tr>
                          <th><?php echo e(__('NO')); ?></th>
                          <th><?php echo e(__('GAMBAR')); ?></th>
                          <th><?php echo e(__('KODE TANAMAN MASUK')); ?></th>
                          <th><?php echo e(__('KODE TANAMAN')); ?></th>
                          <th><?php echo e(__('NAMA TANAMAN')); ?></th>
                          <th><?php echo e(__('LOKASI TANAMAN')); ?></th>
                          <th><?php echo e(__('KONDISI TANAMAN')); ?></th>
                          <th><?php echo e(__('TANGGAL MASUK')); ?></th>
                          <th><?php echo e(__('JUMLAH MASUK')); ?></th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $laporanTanamanMasuk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                              <td><?php echo e($item->kode_tanaman_masuk); ?></td>
                              <td><?php echo e($item->plant->plantAttribute->plant_code); ?></td>
                              <td><?php echo e($item->plant->plantAttribute->name); ?></td>
                              <td><?php echo e($item->plant->location->name); ?></td>
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
                              <td><?php echo e($item->tanggal_masuk); ?></td>
                              <td><?php echo e($item->jumlah_masuk); ?></td>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/reports/tanaman_masuk.blade.php ENDPATH**/ ?>