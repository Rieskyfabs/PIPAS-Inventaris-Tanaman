<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('contents'); ?>
  <div>
    <main id="main" class="main">

      <?php if (isset($component)) { $__componentOriginal242b7fccb931b9335793237de2b11b36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal242b7fccb931b9335793237de2b11b36 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumbs::resolve(['title' => 'Halo, '.e(Auth::user()->username).'!','items' => [
            ['route' => 'home', 'label' => 'Home'],
            ['label' => 'Dashboard']
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

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Plant Card -->
            <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve(['type' => 'plants','title' => 'Total Tanaman','icon' => 'ri-plant-line','value' => ''.e($totalPlantsQuantity).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <!-- End Plant Card -->

            <!-- Location Card -->
            <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve(['type' => 'location','title' => 'Total Lokasi Inventaris','icon' => 'ri-map-pin-line','value' => ''.e($totalLocations).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
            <!-- End Location Card -->

            <!-- Total Users Card -->
            <?php if (isset($component)) { $__componentOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal740c66ff9bbfcb19a96a45ba2fa42d64 = $attributes; } ?>
<?php $component = App\View\Components\Card::resolve(['type' => 'revenue','title' => 'Total Pengguna','icon' => 'ri-group-line','value' => ''.e($totalUsers).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
          </div>
            <!-- Reports -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e(__('Laporan Status Tanaman')); ?></h5>

                        <!-- Form untuk memilih tahun -->

                        <?php if(empty($dataBelumDipanen) && empty($dataSiapDipanen) && empty($dataSudahDipanen)): ?>
                            <p><?php echo e(__('Tidak ada data tersedia.')); ?></p>
                        <?php else: ?>
                            <!-- Column Chart -->
                            <div id="columnChart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#columnChart"), {
                                        series: [{
                                            name: 'Belum Panen',
                                            data: <?php echo json_encode($dataBelumDipanen, 15, 512) ?> // Data dinamis berdasarkan ruangan
                                        }, {
                                            name: 'Siap Dipanen',
                                            data: <?php echo json_encode($dataSiapDipanen, 15, 512) ?> // Data dinamis berdasarkan ruangan
                                        }, {
                                            name: 'Sudah Dipanen',
                                            data: <?php echo json_encode($dataSudahDipanen, 15, 512) ?> // Data dinamis berdasarkan ruangan
                                        }],
                                        chart: {
                                            type: 'bar',
                                            height: 350
                                        },
                                        plotOptions: {
                                            bar: {
                                                horizontal: false,
                                                columnWidth: '55%',
                                                endingShape: 'rounded'
                                            },
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            show: true,
                                            width: 2,
                                            colors: ['transparent']
                                        },
                                        xaxis: {
                                            categories: <?php echo json_encode($ruangan, 15, 512) ?>, // Ruangan dinamis
                                            title: {
                                                text: 'Lokasi Penyimpanan'
                                            }
                                        },
                                        yaxis: {
                                            title: {
                                                text: 'Jumlah Tanaman'
                                            }
                                        },
                                        fill: {
                                            opacity: 1
                                        },
                                        tooltip: {
                                            y: {
                                                formatter: function(val) {
                                                    return val + " Tanaman"
                                                }
                                            }
                                        }
                                    }).render();
                                });
                            </script>
                            <!-- End Column Chart -->
                        <?php endif; ?>
                    </div>
                </div>
            </div>


            <!-- End Reports -->

            <!-- Recent Plants -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                </div>

                <div class="card-body">
                  <h5 class="card-title"><?php echo e(__('Tanaman Terbaru')); ?></h5>

                  <table class="table table-borderless table-hover datatable">
                    <thead>
                        <tr>
                            <th scope="col"><?php echo e(__('KODE TANAMAN MASUK')); ?></th>
                            <th scope="col"><?php echo e(__('KODE TANAMAN')); ?></th>
                            <th scope="col"><?php echo e(__('NAMA TANAMAN')); ?></th>
                            <th scope="col"><?php echo e(__('TIPE TANAMAN')); ?></th>
                            <th scope="col"><?php echo e(__('KATEGORI TANAMAN')); ?></th>
                            <th scope="col"><?php echo e(__('LOKASI TANAMAN')); ?></th>
                            <th scope="col"><?php echo e(__('STATUS')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $plants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($plant->tanamanMasuk->kode_tanaman_masuk); ?></td>
                                <td><?php echo e($plant->plantAttribute->plant_code); ?></td>
                                <th scope="row">
                                    <div class="d-flex flex-column">
                                        <a href="<?php echo e(route('plants.show', ['plantAttribute' => $plant->plantAttribute->plant_code])); ?>">
                                          <?php echo e($plant->plantAttribute->name); ?>

                                        </a>
                                        <small><?php echo e($plant->plantAttribute->scientific_name ?? 'Unknown'); ?></small>
                                    </div>
                                </th>
                                <td>
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
                                            <?php echo e($plant->type); ?>

                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($plant->category->name ?? 'Kategori tidak ditemukan'); ?></td>
                                <td><?php echo e($plant->location->name ?? 'Lokasi tidak ditemukan'); ?></td>
                                <td>
                                    <span class="badge
                                        <?php if($plant->harvest_status === 'sudah dipanen'): ?> badge-soft-green <i class='bi bi-check-circle me-1'></i>
                                        <?php elseif($plant->harvest_status === 'siap panen'): ?> badge-soft-primary <i class='bi bi-star me-1'></i>
                                        <?php elseif($plant->harvest_status === 'belum panen'): ?> badge-soft-warning <i class='bi bi-exclamation-triangle me-1'></i>
                                        <?php else: ?> bg-secondary <?php endif; ?>">
                                        <?php echo e($plant->harvest_status); ?>

                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
            <!-- End Recent Sales -->

          </div>

          <!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo e(__('Aktifitas Terbaru')); ?></h5>
              <div class="activity">
                <?php $__empty_1 = true; $__currentLoopData = $activityLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <div class="activity-item d-flex mb-3">
                    <div class="activite-label text-muted small me-3" style="min-width: 70px;">
                      <?php echo e($log->performed_at->diffForHumans()); ?>

                    </div>
                    <i class='bi bi-circle-fill activity-badge text-success me-3'></i>
                    <div class="activity-content">
                      <strong><?php echo e($log->action); ?></strong> - <?php echo e($log->description); ?>

                      <br><small class="text-muted"><?php echo e(__('Oleh')); ?>: <?php echo e($log->user->username); ?></small>
                    </div>
                  </div><!-- End activity item-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <div class="activity-item d-flex">
                    <div class="activity-content">
                      <?php echo e(__('Tidak Ada Aktivitas Terbaru')); ?>

                    </div>
                  </div><!-- End activity item-->
                <?php endif; ?>
              </div>
            </div>
          </div>

          <!-- End Recent Activity -->

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e(__('Galeri Tanaman Terbaru')); ?></h5>

                    <?php if($recentPlants->isEmpty()): ?>
                        <p><?php echo e(__('Tidak ada data tersedia.')); ?></p>
                    <?php else: ?>
                        <!-- Slides with captions -->
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <?php $__currentLoopData = $recentPlants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $plant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo e($index); ?>" class="<?php echo e($index === 0 ? 'active' : ''); ?>" aria-current="<?php echo e($index === 0 ? 'true' : 'false'); ?>" aria-label="Slide <?php echo e($index + 1); ?>"></button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="carousel-inner">
                                <?php $__currentLoopData = $recentPlants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $plant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
                                        <img src="<?php echo e(asset('storage/' . $plant->image)); ?>" class="d-block w-100 img-max-height" alt="<?php echo e($plant->plantAttribute->name); ?>">
                                        <div class="overlay"></div> <!-- Overlay gelap -->
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5><?php echo e($plant->plantAttribute->name); ?></h5>
                                            <p><?php echo e($plant->location->name ?? 'There Is No Location.'); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden"><?php echo e(__('Previous')); ?></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden"><?php echo e(__('Next')); ?></span>
                            </button>
                        </div><!-- End Slides with captions -->
                    <?php endif; ?>

                </div>
            </div>
        </div>


          <div class="card">
              <div class="card-body">
                  <h5 class="card-title"><?php echo e(__('Total Tanaman Per Lokasi')); ?></h5>

                  <!-- Check if there's data -->
                  <?php if(count($dataPerLocation) > 0): ?>
                      <!-- Bar Chart -->
                      <canvas id="DataTanaman" style="max-height: 400px;"></canvas>
                      <script>
                          document.addEventListener("DOMContentLoaded", () => {
                              // Get data from the Blade view
                              const labels = <?php echo json_encode(array_keys($dataPerLocation), 15, 512) ?>;
                              const dataValues = <?php echo json_encode(array_values($dataPerLocation), 15, 512) ?>;

                              new Chart(document.querySelector('#DataTanaman'), {
                                  type: 'bar',
                                  data: {
                                      labels: labels,
                                      datasets: [{
                                          label: 'Total',
                                          data: dataValues,
                                          backgroundColor: [
                                              'rgba(255, 99, 132, 0.2)',
                                              'rgba(255, 159, 64, 0.2)',
                                              'rgba(255, 205, 86, 0.2)',
                                              'rgba(75, 192, 192, 0.2)',
                                          ],
                                          borderColor: [
                                              'rgb(255, 99, 132)',
                                              'rgb(255, 159, 64)',
                                              'rgb(255, 205, 86)',
                                              'rgb(75, 192, 192)',
                                          ],
                                          borderWidth: 1
                                      }]
                                  },
                                  options: {
                                      scales: {
                                          y: {
                                              beginAtZero: true
                                          }
                                      }
                                  }
                              });
                          });
                      </script>
                      <!-- End Bar Chart -->
                  <?php else: ?>
                      <!-- No data message -->
                      <p><?php echo e(__('Tidak ada data tersedia untuk lokasi tanaman.')); ?></p>
                  <?php endif; ?>
              </div>
          </div>

        </div>
        <!-- End Right side columns -->

      </div>
    </section>

    </main>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/master-dashboard.blade.php ENDPATH**/ ?>