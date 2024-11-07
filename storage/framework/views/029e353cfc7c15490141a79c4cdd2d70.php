<!-- Create Benefit Modal -->
<div class="modal fade" id="PlantTypes" tabindex="-1" aria-labelledby="PlantTypesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PlantTypesLabel"><?php echo e(__('Tambah Data Tipe Tanaman Baru')); ?></h5>
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
                <form action="<?php echo e(route('plantTypes.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName" placeholder="Nama Tipe Tanaman" required>
                        <label for="floatingInputName"><?php echo e(__('Nama Tipe Tanaman')); ?></label>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Tambah')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Create Tipe Tanaman Modal -->
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/modals/create_plantTypes_modal.blade.php ENDPATH**/ ?>