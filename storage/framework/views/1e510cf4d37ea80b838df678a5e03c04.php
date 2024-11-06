<!-- Create Benefit Modal -->
<div class="modal fade" id="Category" tabindex="-1" aria-labelledby="CategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CategoryLabel"><?php echo e(__('Tambah Data Kategori Baru')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('categories.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName" placeholder="Nama Kategori" required>
                        <label for="floatingInputName"><?php echo e(__('Nama Kategori')); ?></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="description" class="form-control" id="floatingInputDescription" placeholder="deskripsi">
                        <label for="floatingInputDescription"><?php echo e(__('Deskripsi Kategori')); ?></label>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Tambah')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Create Location Modal -->
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/modals/create_category_modal.blade.php ENDPATH**/ ?>