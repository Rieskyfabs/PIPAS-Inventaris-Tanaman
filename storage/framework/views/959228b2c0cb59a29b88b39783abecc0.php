<?php $__env->startSection('title', 'Data Tanaman'); ?>

<?php $__env->startSection('contents'); ?>
  <div>
    <main id="main" class="main">

      <?php if (isset($component)) { $__componentOriginal242b7fccb931b9335793237de2b11b36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal242b7fccb931b9335793237de2b11b36 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumbs::resolve(['title' => ''.e(__('Kelola Tanaman')).'','items' => [
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'Data Tanaman']
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
                <form method="GET" action="<?php echo e(route('plants')); ?>">
                    <div class="mb-3">
                        <label for="period" class="form-label"><?php echo e(__('Filter Periode')); ?></label>
                        <select name="period" id="period" class="form-select" onchange="this.form.submit()">
                            <option value="today" <?php echo e($period == 'today' ? 'selected' : ''); ?>><?php echo e(__('Hari ini')); ?></option>
                            <option value="this_month" <?php echo e($period == 'this_month' ? 'selected' : ''); ?>><?php echo e(__('Bulan Ini')); ?></option>
                            <option value="this_year" <?php echo e($period == 'this_year' ? 'selected' : ''); ?>><?php echo e(__('Tahun Ini')); ?></option>
                        </select>
                    </div>
                </form>
                <!-- Summary Card -->

                <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve(['type' => 'plants','title' => 'Total Tanaman','icon' => 'ri-seedling-fill','value' => $totalPlants] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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

                <!-- Card Tanaman Masuk -->
                <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve(['type' => 'revenue','title' => 'Tanaman Masuk','icon' => 'ri-inbox-archive-fill','value' => $plantsIn] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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

                <!-- Card Tanaman Keluar -->
                <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve(['type' => 'location','title' => 'Tanaman Keluar','icon' => 'ri-inbox-unarchive-fill','value' => $plantsOut] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                <!-- End Summary Card -->

                <!-- Right side columns -->
                <div class="row-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e(__('Total Tanaman Berdasarkan Status')); ?></h5>

                            <!-- Plant Status Chart -->
                            <div id="plantStatus"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    const chartData = <?php echo json_encode($chartData, 15, 512) ?>;

                                    // Check if there's no data
                                    if (chartData.labels.length === 0 || chartData.series.length === 0) {
                                        document.querySelector("#plantStatus").innerHTML = "<p class='text-center'>Tidak ada data</p>";
                                        return; // Exit the script to avoid rendering the chart
                                    }

                                    // Define a mapping of status to colors
                                    const colorMapping = {
                                        "sehat": '#28a745',  // Green
                                        "baik": '#007bff',   // Blue
                                        "layu": '#ffc107',   // Yellow
                                        "sakit": '#dc3545'   // Red
                                    };

                                    // Create an array for series and corresponding colors
                                    const seriesData = [];
                                    const colors = [];

                                    chartData.labels.forEach(label => {
                                        seriesData.push(chartData.series[chartData.labels.indexOf(label)]);
                                        colors.push(colorMapping[label]);
                                    });

                                    // Initialize ApexCharts with the fetched data
                                    new ApexCharts(document.querySelector("#plantStatus"), {
                                        series: seriesData, // Values of plant counts based on status
                                        chart: {
                                            height: 350,
                                            type: 'pie', // Pie chart type
                                            toolbar: {
                                                show: true // Show toolbar
                                            }
                                        },
                                        labels: chartData.labels, // Status labels
                                        colors: colors, // Set custom colors for the statuses
                                        responsive: [{
                                            breakpoint: 480,
                                            options: {
                                                chart: {
                                                    width: 300
                                                },
                                                legend: {
                                                    position: 'bottom'
                                                }
                                            }
                                        }]
                                    }).render();
                                });
                            </script>
                            <!-- End Pie Chart -->

                        </div>
                    </div>
                </div>


                <!-- End Right side columns -->

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e(__('Data Tanaman')); ?></h5>
                            <p><?php echo e(__('')); ?></p>
                            <div class="add-btn-container">
                                <a href="<?php echo e(route('plants.create')); ?>" class="btn-add-item">
                                    <i class="ri-add-fill"></i>
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
                                            <th><?php echo e(__('NAMA ILMIAH')); ?></th>
                                            <th><?php echo e(__('TIPE TANAMAN')); ?></th>
                                            <th><?php echo e(__('KATEGORI TANAMAN')); ?></th>
                                            <th><?php echo e(__('MANFAAT TANAMAN')); ?></th>
                                            <th><?php echo e(__('JUMLAH')); ?></th>
                                            <th><?php echo e(__('AKSI')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $plants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($plant->plantAttribute ? $plant->plantAttribute->plant_code : 'Unknown'); ?></td>
                                                <td><?php echo e($plant->plantAttribute->name); ?></td>
                                                <td><?php echo e($plant->plantAttribute->scientific_name ?? 'Unknown'); ?></td>
                                                <td><?php echo e($plant->plantType->name); ?></td>
                                                <td><?php echo e($plant->category ? $plant->category->name : 'Unknown'); ?></td>
                                                <td style="white-space: normal; word-wrap: break-word;">
                                                    <?php echo e(Str::limit($plant->plantAttribute ? $plant->plantAttribute->benefit : 'Unknown', 20)); ?>

                                                </td>
                                                
                                                <td>
                                                    <span class="badge bg-primary badge-number"><?php echo e($plant->total_quantity); ?>

                                                        <?php if($plant->ready_to_harvest_count > 0): ?>
                                                            <span class="notification-bubble"></span>
                                                        <?php endif; ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('plants.show', $plant->plantAttribute->plant_code)); ?>" class="btn btn-primary">
                                                        <?php echo e(__('Lihat')); ?>

                                                    </a>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/admin/pages/plants/index.blade.php ENDPATH**/ ?>