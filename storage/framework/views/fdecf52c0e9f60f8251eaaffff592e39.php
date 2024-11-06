<div class="modal fade" id="EditPlantAttribute<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="EditPlantAttributeLabel<?php echo e($item->id); ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditPlantAttributeLabel<?php echo e($item->id); ?>"><?php echo e(__('Edit Atribut Tanaman')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('plantAttributes.update', ['id' => $item->id])); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="form-floating mb-3">
                        <input type="text" name="plant_code" class="form-control" id="floatingInputPlantCode<?php echo e($item->id); ?>" value="<?php echo e($item->plant_code); ?>" required>
                        <label for="floatingInputPlantCode<?php echo e($item->id); ?>"><?php echo e(__('Kode Tanaman')); ?></label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName<?php echo e($item->id); ?>" value="<?php echo e($item->name); ?>" required>
                        <label for="floatingInputName<?php echo e($item->id); ?>"><?php echo e(__('Nama Tanaman')); ?></label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="scientific_name" class="form-control" id="floatingInputScientificName<?php echo e($item->id); ?>" value="<?php echo e($item->scientific_name); ?>" required>
                        <label for="floatingInputScientificName<?php echo e($item->id); ?>"><?php echo e(__('Nama Ilmiah Tanaman')); ?></label>
                    </div>
                    <div class="form-floating mb-3 d-flex align-items-center">
                        <select name="type_id" class="form-control custom-select me-2" id="floatingInputType<?php echo e($item->id); ?>" required>
                            <option value="" disabled selected><?php echo e(__('Pilih Tipe Tanaman')); ?></option>
                            <?php $__currentLoopData = $plantTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type->id); ?>" <?php echo e($item->type_id == $type->id ? 'selected' : ''); ?>><?php echo e($type->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <button type="button" class="btn-add-item" data-bs-toggle="modal" data-bs-target="#addNewTypeModal">
                            +
                        </button>
                        <label for="floatingInputType<?php echo e($item->id); ?>"><?php echo e(__('Tipe Tanaman')); ?></label>
                    </div>
                    <div class="form-floating mb-3 d-flex align-items-center">
                        <select name="category_id" class="form-control custom-select me-2" id="floatingInputCategory<?php echo e($item->id); ?>" required>
                            <option value="" disabled selected><?php echo e(__('Pilih Kategori')); ?></option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php echo e($item->category_id == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <button type="button" class="btn-add-item" data-bs-toggle="modal" data-bs-target="#addNewCategoryModal">
                            +
                        </button>
                        <label for="floatingInputCategory<?php echo e($item->id); ?>"><?php echo e(__('Kategori Tanaman')); ?></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="benefit" class="form-control" id="floatingInputBenefit<?php echo e($item->id); ?>" value="<?php echo e($item->benefit); ?>" required>
                        <label for="floatingInputBenefit<?php echo e($item->id); ?>"><?php echo e(__('Manfaat Tanaman')); ?></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="description" class="form-control" id="floatingInputDescription<?php echo e($item->id); ?>" value="<?php echo e($item->description); ?>">
                        <label for="floatingInputDescription<?php echo e($item->id); ?>"><?php echo e(__('Deskripsi')); ?></label>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/modals/edit_plantAttributes_modal.blade.php ENDPATH**/ ?>