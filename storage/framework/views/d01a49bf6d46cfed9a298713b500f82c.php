<?php $__env->startSection('title', 'Edit Plant Data'); ?>

<?php $__env->startSection('contents'); ?>
    <div>
        <main id="main" class="main">

            <?php if (isset($component)) { $__componentOriginal242b7fccb931b9335793237de2b11b36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal242b7fccb931b9335793237de2b11b36 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumbs::resolve(['title' => ''.e(__('Edit Plant')).'','items' => [
                ['route' => 'home', 'label' => 'Home'],
                ['route' => 'plants', 'label' => 'Data Tanaman'],
                ['label' => 'Edit Plant'],
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
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e(__('Edit Plant Data')); ?></h5>

                                <?php if($errors->any()): ?>
                                    <div class="alert alert-danger">
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <form action="<?php echo e(route('plants.update', $plant->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>

                                    <!-- Plant Name (readonly) -->
                                    <div class="form-floating mb-3">
                                        <select name="plant_name_id" class="form-select" id="plantName" readonly>
                                            <?php $__currentLoopData = $plantAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>"
                                                    <?php echo e($item->id == $plant->plant_name_id ? 'selected' : ''); ?>>
                                                    <?php echo e($item->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <label for="plantName"><?php echo e(__('Nama Tanaman')); ?></label>
                                    </div>

                                    <!-- Plant Scientific Name (hidden) -->
                                    <input type="hidden" name="plant_scientific_name_id"
                                        value="<?php echo e($plant->plant_scientific_name_id); ?>">

                                    <!-- Plant Code (hidden) -->
                                    <input type="hidden" name="plant_code_id" value="<?php echo e($plant->plant_code_id); ?>">

                                    <!-- Type Selection (readonly) -->
                                    <input type="hidden" name="type" value="<?php echo e($plant->type); ?>">

                                    <!-- Category Selection (readonly) -->
                                    <div class="form-floating mb-3">
                                        <select name="category_id" class="form-select" id="plantCategories" readonly>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($category->id); ?>"
                                                    <?php echo e($category->id == $plant->category_id ? 'selected' : ''); ?>>
                                                    <?php echo e($category->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <label for="plantCategories"><?php echo e(__('Kategori Tanaman')); ?></label>
                                    </div>

                                    <!-- Benefit Selection (readonly) -->
                                    <div class="form-floating mb-3">
                                        <select name="benefit_id" class="form-select" id="plantBenefits" readonly>
                                            <?php $__currentLoopData = $benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($benefit->id); ?>"
                                                    <?php echo e($benefit->id == $plant->benefit_id ? 'selected' : ''); ?>>
                                                    <?php echo e($benefit->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <label for="plantBenefits"><?php echo e(__('Manfaat Tanaman')); ?></label>
                                    </div>

                                    <!-- Location Selection (readonly) -->
                                    <div class="form-floating mb-3">
                                        <select name="location_id" class="form-select" id="plantLocations" readonly>
                                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($location->id); ?>"
                                                    <?php echo e($location->id == $plant->location_id ? 'selected' : ''); ?>>
                                                    <?php echo e($location->name); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <label for="plantLocations"><?php echo e(__('Lokasi Tanaman')); ?></label>
                                    </div>

                                    <!-- Status (editable) -->
                                    <div class="form-floating mb-3">
                                        <select name="status" class="form-select" required>
                                            <option value="sehat" <?php echo e($plant->status == 'sehat' ? 'selected' : ''); ?>>Sehat
                                            </option>
                                            <option value="baik" <?php echo e($plant->status == 'baik' ? 'selected' : ''); ?>>Baik
                                            </option>
                                            <option value="layu" <?php echo e($plant->status == 'layu' ? 'selected' : ''); ?>>Layu
                                            </option>
                                            <option value="sakit" <?php echo e($plant->status == 'sakit' ? 'selected' : ''); ?>>Sakit
                                            </option>
                                        </select>
                                        <label for="status"><?php echo e(__('Status Tanaman')); ?></label>
                                    </div>

                                    <!-- Seeding Date (editable) -->
                                    <div class="form-floating mb-3">
                                        <input type="date" name="seeding_date" class="form-control"
                                            value="<?php echo e($plant->seeding_date); ?>" required>
                                        <label for="seeding_date"><?php echo e(__('Tanggal Tanam')); ?></label>
                                    </div>

                                    <!-- Harvest Date (editable) -->
                                    <div class="form-floating mb-3">
                                        <input type="date" name="harvest_date" class="form-control"
                                            value="<?php echo e($plant->harvest_date); ?>" required>
                                        <label for="harvest_date"><?php echo e(__('Tanggal Panen')); ?></label>
                                    </div>

                                    <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/admin/pages/plants/edit.blade.php ENDPATH**/ ?>