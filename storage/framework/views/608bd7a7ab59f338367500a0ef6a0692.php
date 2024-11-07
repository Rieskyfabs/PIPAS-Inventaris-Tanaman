<div class="modal fade" id="EditPlantTypes<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="EditPlantTypesLabel<?php echo e($item->id); ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditPlantTypesLabel<?php echo e($item->id); ?>"><?php echo e(__('Edit Nama Tipe Tanaman')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('plantTypes.update', ['id' => $item->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName<?php echo e($item->id); ?>" value="<?php echo e($item->name); ?>" required>
                        <label for="floatingInputName<?php echo e($item->id); ?>"><?php echo e(__('Nama Tipe Tanaman  ')); ?></label>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/modals/edit_plantTypes_modal.blade.php ENDPATH**/ ?>