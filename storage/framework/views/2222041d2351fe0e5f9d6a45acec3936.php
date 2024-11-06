<div class="modal fade" id="EditLocation<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="EditLocationLabel<?php echo e($item->id); ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditLocationLabel<?php echo e($item->id); ?>"><?php echo e(__('Edit Lokasi')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('locations.update', ['id' => $item->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName<?php echo e($item->id); ?>" value="<?php echo e($item->name); ?>" required>
                        <label for="floatingInputName<?php echo e($item->id); ?>"><?php echo e(__('Nama Lokasi')); ?></label>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/modals/edit_location_modal.blade.php ENDPATH**/ ?>