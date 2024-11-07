<!-- Add New Location Modal -->
<div class="modal fade" id="addNewLocationModal" tabindex="-1" aria-labelledby="addNewLocationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewLocationLabel"><?php echo e(__('Tambah Lokasi Tanaman Baru')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addNewLocationForm">
                    <?php echo csrf_field(); ?>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputLocationName" placeholder="Nama Lokasi" required>
                        <label for="floatingInputLocationName"><?php echo e(__('Nama Lokasi')); ?></label>
                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Tambah')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/modals/add_new_location.blade.php ENDPATH**/ ?>