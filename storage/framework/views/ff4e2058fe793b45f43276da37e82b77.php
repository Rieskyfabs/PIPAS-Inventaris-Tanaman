<!-- Create plantAttributes Modal -->
<div class="modal fade" id="plantAttribute" tabindex="-1" aria-labelledby="plantAttributeLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="plantAttributeLabel"><?php echo e(__('Tambah Data Atribut Tanaman Baru')); ?></h5>
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
                <form action="<?php echo e(route('plantAttributes.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-floating mb-3">
                        <input type="text" name="plant_code" class="form-control" id="floatingInputPlantCode" placeholder="Nama Kategori" required>
                        <label for="floatingInputPlantCode"><?php echo e(__('Kode Tanaman')); ?></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName" placeholder="Nama Tanaman" required>
                        <label for="floatingInputName"><?php echo e(__('Nama Tanaman')); ?></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="scientific_name" class="form-control" id="floatingInputScientificName" placeholder="Nama Ilmiah Tanaman" required>
                        <label for="floatingInputScientificName"><?php echo e(__('Nama Ilmiah Tanaman')); ?></label>
                    </div>
                    <div class="form-floating mb-3">
                        <div class="input-group">
                            <select name="type_id" class="form-select" id="floatingInputType" required>
                                <option value="" disabled selected>Pilih Tipe Tanaman</option>
                                <?php $__currentLoopData = $plantTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <button type="button" class="btn btn-outline-secondary btn-add-item" data-bs-toggle="modal" data-bs-target="#addNewTypeModal">
                                +
                            </button>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <div class="input-group">
                            <select name="category_id" class="form-select" id="floatingInputCategory" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <button type="button" class="btn btn-outline-secondary btn-add-item" data-bs-toggle="modal" data-bs-target="#addNewCategoryModal">
                                +
                            </button>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="benefit" class="form-control" id="floatingInputBenefit" placeholder="Manfaat Tanaman" required>
                        <label for="floatingInputBenefit"><?php echo e(__('Manfaat Tanaman')); ?></label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="description" class="form-control" id="floatingInputDescription" placeholder="Deskripsi">
                        <label for="floatingInputDescription"><?php echo e(__('Deskripsi')); ?></label>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Tambah')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Create Benefit Modal -->

<!-- Add New Category Modal -->
<?php echo $__env->make('modals.add_new_category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Add New Type Modal -->
<?php echo $__env->make('modals.add_new_type', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Open modal when "Tambah Kategori Baru" is selected
        document.getElementById('floatingInputCategory').addEventListener('change', function() {
            if (this.value === 'add_new_category') {
                // Show the modal for adding a new category
                new bootstrap.Modal(document.getElementById('addNewCategoryModal')).show();
                this.value = ''; // Reset dropdown
            }
        });

        // AJAX submission for adding a new category
        document.getElementById('addNewCategoryForm').addEventListener('submit', function(event) {
            event.preventDefault();
            let formData = new FormData(this);

            // Check if category name already exists in the select options
            let existingCategoryNames = Array.from(document.querySelectorAll('#floatingInputCategory option'))
                .map(option => option.text);

            if (existingCategoryNames.includes(formData.get('name'))) {
                alert('Nama kategori sudah ada. Silakan gunakan nama lain.');
                return; // Stop submission if the category already exists
            }

            fetch("<?php echo e(route('addNewCategory')); ?>", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    let select = document.getElementById('floatingInputCategory');
                    let option = new Option(data.name, data.id);
                    select.add(option, select.options[select.options.length - 1]); // Add before 'Add New' option

                    // Set the select value to the newly added category
                    select.value = data.id; // Automatically select the new category
                    
                    // Close the modal after successfully adding the category
                    let newCategoryModal = bootstrap.Modal.getInstance(document.getElementById('addNewCategoryModal'));
                    newCategoryModal.hide();

                    // Show the previous modal again
                    new bootstrap.Modal(document.getElementById('plantAttribute')).show();

                    // Reset the form for the next entry
                    this.reset(); // Reset form fields
                } else {
                    alert(data.message || "Error adding category");
                }
            })
            .catch(error => console.error('Error in AJAX request:', error));
        });

        // Open modal when "Tambah Tipe Tanaman Baru" is selected
        document.getElementById('floatingInputType').addEventListener('change', function() {
            if (this.value === 'add_new_type') {
                // Show the modal for adding a new plant type
                new bootstrap.Modal(document.getElementById('addNewTypeModal')).show();
                this.value = ''; // Reset dropdown
            }
        });

        // AJAX submission for adding a new plant type
        document.getElementById('addNewTypeForm').addEventListener('submit', function(event) {
            event.preventDefault();
            let formData = new FormData(this);

            // Check if plant type name already exists in the select options
            let existingTypeNames = Array.from(document.querySelectorAll('#floatingInputType option'))
                .map(option => option.text);

            if (existingTypeNames.includes(formData.get('name'))) {
                alert('Nama tipe sudah ada. Silakan gunakan nama lain.');
                return; // Stop submission if the type already exists
            }

            fetch("<?php echo e(route('addNewType')); ?>", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    let select = document.getElementById('floatingInputType');
                    let option = new Option(data.name, data.id);
                    select.add(option, select.options[select.options.length - 1]); // Add before 'Add New' option

                    // Set the select value to the newly added type
                    select.value = data.id; // Automatically select the new type
                    
                    // Close the modal after successfully adding the type
                    let newTypeModal = bootstrap.Modal.getInstance(document.getElementById('addNewTypeModal'));
                    newTypeModal.hide();

                    // Show the previous modal again
                    new bootstrap.Modal(document.getElementById('plantAttribute')).show();

                    // Reset the form for the next entry
                    this.reset(); // Reset form fields
                } else {
                    alert(data.message || "Error adding type");
                }
            })
            .catch(error => console.error('Error in AJAX request:', error));
        });
    });
</script>
<?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/modals/create_plantAttributes_modal.blade.php ENDPATH**/ ?>