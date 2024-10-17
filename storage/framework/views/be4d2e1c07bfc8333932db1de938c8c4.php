<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('contents'); ?>
<div>
    <main id="main" class="main">
        <?php if (isset($component)) { $__componentOriginal242b7fccb931b9335793237de2b11b36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal242b7fccb931b9335793237de2b11b36 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumbs::resolve(['title' => 'Notifikasi','items' => [ 
                ['route' => 'admin/dashboard', 'label' => 'Dashboard'], 
                ['label' => 'Semua Notifikasi'] 
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
                <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="m-0"><?php echo e(__('Notifikasi')); ?></h4>
                        </div>
                        <div class="card-body mt-3">
                            <!-- Tabs -->
                            <ul class="nav nav-tabs" id="notificationTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true"><?php echo e(__('Semua')); ?>

                                        <?php if($notifications->where('is_read', false)->count() > 0): ?>
                                            <span class="badge bg-warning"><?php echo e($notifications->where('is_read', false)->count()); ?></span>
                                        <?php endif; ?>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="seen-tab" data-bs-toggle="tab" href="#seen" role="tab" aria-controls="seen" aria-selected="false"><?php echo e(__('Dibaca')); ?></a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="unseen-tab" data-bs-toggle="tab" href="#unseen" role="tab" aria-controls="unseen" aria-selected="false"><?php echo e(__('Belum dibaca')); ?></a>
                                </li>
                            </ul>
                            <div class="tab-content" id="notificationTabContent" style="max-height: 550px; overflow-y: auto;">
                                <!-- All Notifications -->
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <ul class="list-group list-group-flush">
                                        <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <li class="list-group-item d-flex align-items-start justify-content-between border-0 rounded-0 mt-3 position-relative <?php echo e($notification->is_read ? 'bg-light' : 'bg-light text-dark'); ?>">
                                                <form id="mark-as-read-<?php echo e($notification->id); ?>" action="<?php echo e(route('notifications.markAsRead', $notification->id)); ?>" method="POST" style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                                <a href="<?php echo e(route('plants.show', $notification->plant->plantAttribute->plant_code)); ?>" class="text-decoration-none flex-grow-1 notification-link" onclick="event.preventDefault(); document.getElementById('mark-as-read-<?php echo e($notification->id); ?>').submit();">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?php echo e(asset('storage/' . $notification->plant->image)); ?>" alt="Image of <?php echo e($notification->plant->plantAttribute->name ?? 'Unknown'); ?>" class="img-fluid me-3" style="width: 80px; height: 80px; border-radius: 10px;">
                                                        <div>
                                                            <h5 class="mb-1 fw-bold"><?php echo e($notification->title); ?></h5>
                                                            <p class="mb-1 text-truncate"><?php echo e($notification->message); ?></p>
                                                            <?php if($notification->plant): ?>
                                                                <p class="mb-1"><strong>Lokasi:</strong> <?php echo e($notification->plant->location->name); ?></p>
                                                            <?php endif; ?>
                                                            <p class="mb-1"><strong>Perkiraan Tanggal Panen: </strong><?php echo e($notification->plant->harvest_date); ?></p>
                                                            <small class="text-muted"><?php echo e($notification->created_at->diffForHumans()); ?></small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="position-absolute top-0 end-0 mt-0 p-3">
                                                    <?php if(!$notification->is_read): ?>
                                                        <span class="badge bg-danger"><?php echo e(__('Baru')); ?></span>
                                                    <?php endif; ?>
                                                    <?php if(!$notification->is_read): ?>
                                                        <span class="badge bg-warning text-dark"><?php echo e(__('Belum dibaca')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <li class="mt-3 list-group-item text-center"><?php echo e(__('Tidak ada notifikasi terbaru.')); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>

                                <!-- Seen Notifications -->
                                <div class="tab-pane fade" id="seen" role="tabpanel" aria-labelledby="seen-tab">
                                    <ul class="list-group list-group-flush">
                                        <?php $__empty_1 = true; $__currentLoopData = $notifications->where('is_read', true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <li class="list-group-item d-flex align-items-start justify-content-between border-0 rounded-0 mt-3 position-relative bg-light text-dark">
                                                <a href="<?php echo e(route('plants.show', $notification->plant->plantAttribute->plant_code)); ?>" class="text-decoration-none flex-grow-1 notification-link">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?php echo e(asset('storage/' . $notification->plant->image)); ?>" alt="Image of <?php echo e($notification->plant->plantAttribute->name ?? 'Unknown'); ?>" class="img-fluid me-3" style="width: 80px; height: 80px; border-radius: 10px;">
                                                        <div>
                                                            <h5 class="mb-1 fw-bold"><?php echo e($notification->title); ?></h5>
                                                            <p class="mb-1 text-truncate"><?php echo e($notification->message); ?></p>
                                                            <?php if($notification->plant): ?>
                                                                <p class="mb-1"><strong>Lokasi:</strong> <?php echo e($notification->plant->location->name); ?></p>
                                                            <?php endif; ?>
                                                            <p class="mb-1"><strong>Perkiraan Tanggal Panen: </strong><?php echo e($notification->plant->harvest_date); ?></p>
                                                            <small class="text-muted"><?php echo e($notification->created_at->diffForHumans()); ?></small>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <li class="mt-3 list-group-item text-center"><?php echo e(__('Tidak ada notifikasi dibaca.')); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>

                                <!-- Unseen Notifications -->
                                <div class="tab-pane fade" id="unseen" role="tabpanel" aria-labelledby="unseen-tab">
                                    <ul class="list-group list-group-flush">
                                        <?php $__empty_1 = true; $__currentLoopData = $notifications->where('is_read', false); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <li class="list-group-item d-flex align-items-start justify-content-between border-0 rounded-0 mt-3 position-relative bg-light text-dark">
                                                <a href="<?php echo e(route('plants.show', $notification->plant->plantAttribute->plant_code)); ?>" class="text-decoration-none flex-grow-1 notification-link" onclick="event.preventDefault(); document.getElementById('mark-as-read-<?php echo e($notification->id); ?>').submit();">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?php echo e(asset('storage/' . $notification->plant->image)); ?>" alt="Image of <?php echo e($notification->plant->plantAttribute->name ?? 'Unknown'); ?>" class="img-fluid me-3" style="width: 80px; height: 80px; border-radius: 10px;">
                                                        <div>
                                                            <h5 class="mb-1 fw-bold"><?php echo e($notification->title); ?></h5>
                                                            <p class="mb-1 text-truncate"><?php echo e($notification->message); ?></p>
                                                            <?php if($notification->plant): ?>
                                                                <p class="mb-1"><strong>Lokasi:</strong> <?php echo e($notification->plant->location->name); ?></p>
                                                            <?php endif; ?>
                                                            <p class="mb-1"><strong>Perkiraan Tanggal Panen: </strong><?php echo e($notification->plant->harvest_date); ?></p>
                                                            <small class="text-muted"><?php echo e($notification->created_at->diffForHumans()); ?></small>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="position-absolute top-0 end-0 mt-0 p-3">
                                                    <?php if(!$notification->is_read): ?>
                                                        <span class="badge bg-danger"><?php echo e(__('Baru')); ?></span>
                                                    <?php endif; ?>
                                                    <?php if(!$notification->is_read): ?>
                                                        <span class="badge bg-warning text-dark"><?php echo e(__('Belum dibaca')); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <li class="mt-3 list-group-item text-center"><?php echo e(__('Tidak ada notifikasi belum dibaca.')); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/admin/pages/notifications/index.blade.php ENDPATH**/ ?>