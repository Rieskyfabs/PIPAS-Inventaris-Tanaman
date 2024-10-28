<?php $__env->startSection('title', 'Add New Plant Attribute'); ?>

<?php $__env->startSection('contents'); ?>
  <div>
    <main id="main" class="main">

      <?php if (isset($component)) { $__componentOriginal242b7fccb931b9335793237de2b11b36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal242b7fccb931b9335793237de2b11b36 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumbs::resolve(['title' => ''.e(__('Tambah Atribut Tanaman')).'','items' => [
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['route' => 'plantAttributes', 'label' => 'Atribut Tanaman'],
          ['label' => 'Tambah Atribut Tanaman']
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
                <h5 class="card-title"><?php echo e(__('Tambahkan Atribut Tanaman')); ?></h5>
                <p class="mb-3"><?php echo e(__('Lengkapi form berikut untuk menambahkan atribut tanaman baru.')); ?></p>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Form for Creating Plant Attribute -->
                <form action="<?php echo e(route('plantAttributes.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="text" name="plant_code" class="form-control" id="plant_code" placeholder="Max 9 Characters" required>
                                <label for="plant_code"><?php echo e(__('Kode Tanaman')); ?></label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Tanaman" required>
                                <label for="name"><?php echo e(__('Nama Tanaman')); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <input type="text" name="scientific_name" class="form-control" id="scientific_name" placeholder="Nama Ilmiah">
                                <label for="scientific_name"><?php echo e(__('Nama Ilmiah')); ?></label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <select name="type" class="form-select" id="type" required>
                                    <option value="" disabled selected>Pilih Tipe</option>
                                    <option value="Herbal">Herbal</option>
                                    <option value="Sayuran">Sayuran</option>
                                </select>
                                <label for="type"><?php echo e(__('Tipe Tanaman')); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <select name="category_id" class="form-select" id="category_id" required>
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <label for="category_id"><?php echo e(__('Kategori')); ?></label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating">
                                <select name="benefit_id" class="form-select" id="benefit_id" required>
                                    <option value="" disabled selected>Pilih Manfaat</option>
                                    <?php $__currentLoopData = $benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($benefit->id); ?>"><?php echo e($benefit->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <label for="benefit_id"><?php echo e(__('Manfaat')); ?></label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea name="description" class="form-control" id="description" placeholder="Deskripsi Tanaman"></textarea>
                            <label for="description"><?php echo e(__('Deskripsi')); ?></label>
                        </div>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <!-- End Form -->

              </div>
            </div>
          </div>
        </div>
      </section>

    </main>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/admin/pages/plantAttributes/create.blade.php ENDPATH**/ ?>