<div class="modal fade" id="EditCategory<?php echo e($category->id); ?>" tabindex="-1" aria-labelledby="EditCategoryLabel<?php echo e($category->id); ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditCategoryLabel<?php echo e($category->id); ?>"><?php echo e(__('Edit Kategori')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('categories.update', ['id' => $category->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName<?php echo e($category->id); ?>" value="<?php echo e($category->name); ?>" required>
                        <label for="floatingInputName<?php echo e($category->id); ?>"><?php echo e(__('Nama Kategori')); ?></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="description" class="form-control" id="floatingInputDescription<?php echo e($category->id); ?>" value="<?php echo e($category->description); ?>">
                        <label for="floatingInputDescription<?php echo e($category->id); ?>"><?php echo e(__('Deskripsi Kategori')); ?></label>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/modals/edit_category_modal.blade.php ENDPATH**/ ?>