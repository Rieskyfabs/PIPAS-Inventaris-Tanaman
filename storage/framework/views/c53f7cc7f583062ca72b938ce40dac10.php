<?php $__env->startSection('title', 'Add New Plant'); ?>

<?php $__env->startSection('contents'); ?>
<div>
    <main id="main" class="main">
        <?php if (isset($component)) { $__componentOriginal242b7fccb931b9335793237de2b11b36 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal242b7fccb931b9335793237de2b11b36 = $attributes; } ?>
<?php $component = App\View\Components\Breadcrumbs::resolve(['title' => ''.e(__('Tambah Data Tanaman Baru')).'','items' => [ 
                ['route' => 'admin/dashboard', 'label' => 'Dashboard'], 
                ['route' => 'plants', 'label' => 'List Tanaman'], 
                ['label' => 'Tambah Data Tanaman Baru'] 
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
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e(__('Tambahkan Tanaman Baru')); ?></h5>
                            <p class="mb-3"><?php echo e(__('Untuk Menambahkan Data Tanaman, Pastikan Anda Sudah Menambahkan Attribute Dari Tanamannya Terlebih Dahulu.')); ?></p>
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <form action="<?php echo e(route('plants.store')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="plantAttributes" class="form-label"><?php echo e(__('Kode Tanaman')); ?></label>
                                    <div class="input-group">
                                        <select name="plant_code_id" class="form-select" id="plantAttributes" required>
                                            <option value="" disabled selected>Pilih Kode Tanaman</option>
                                            <?php $__currentLoopData = $plantAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->id); ?>" 
                                                        data-name="<?php echo e($item->name); ?>" 
                                                        data-scientific-name="<?php echo e($item->scientific_name); ?>" 
                                                        data-type-id="<?php echo e($item->type_id); ?>" 
                                                        data-category-id="<?php echo e($item->category_id); ?>"
                                                        data-benefit="<?php echo e($item->benefit); ?>">
                                                    <?php echo e($item->plant_code); ?> : <?php echo e($item->description); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <a href="<?php echo e(url('admin/atribut-tanaman/list-atribut-tanaman')); ?>" class="btn btn-outline-secondary btn-add-item">
                                            <?php echo e(__('+')); ?>

                                        </a>
                                    </div>
                                </div>
                                <div id="additionalFields" class="d-none">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="plantName" class="form-label">Nama Tanaman</label>
                                            <select name="plant_name_id" class="form-select" id="plantName" required>
                                                <option value="" disabled selected>Nama Tanaman</option>
                                                <?php $__currentLoopData = $plantAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="scientificName" class="form-label">Nama Ilmiah</label>
                                            <select name="plant_scientific_name_id" class="form-select" id="scientificName" required>
                                                <option value="" disabled selected>Nama Ilmiah</option>
                                                <?php $__currentLoopData = $plantAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->scientific_name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="plantType" class="form-label">Tipe Tanaman</label>
                                            <select name="type_id" class="form-select" id="plantType" required>
                                                <option value="" disabled selected>Silahkan Pilih Tipe Tanaman</option>
                                                <?php $__currentLoopData = $plantTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($types->id); ?>"><?php echo e($types->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="plantCategories" class="form-label">Kategori Tanaman</label>
                                            <select name="category_id" class="form-select" id="plantCategories" required>
                                                <option value="" disabled selected>Silahkan Pilih Kategori Tanaman</option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="plantBenefit" class="form-label">Manfaat Tanaman</label>
                                            <select name="benefit_id" class="form-select" id="plantBenefit" required>
                                                <option value="" disabled selected>Silahkan Pilih Manfaat Tanaman</option>
                                                <?php $__currentLoopData = $plantAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->benefit); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="plantImage" class="form-label">Upload Gambar Tanaman</label>
                                    <input type="file" name="image" class="form-control" id="plantImage" accept="image/*" onchange="previewImage(event)">
                                    <img id="imagePreview" src="#" alt="Preview Gambar" style="display: none; width: 100px; height: 100px; object-fit: cover;" class="mt-3"/>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="plantLocations" class="form-label"><?php echo e(__('Lokasi Tanaman')); ?></label>
                                        <div class="input-group">
                                            <select name="location_id" class="form-select" id="plantLocations" required>
                                                <option value="" disabled selected>Pilih Lokasi Tanaman</option>
                                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($location->id); ?>"><?php echo e($location->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <button type="button" class="btn btn-outline-secondary btn-add-item" data-bs-toggle="modal" data-bs-target="#addNewLocationModal">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="plantStatus" class="form-label">Kondisi Tanaman</label>
                                        <select name="status" class="form-select" id="plantStatus" required>
                                            <option value="" disabled selected>Silahkan Pilih Kondisi Tanaman</option>
                                            <option value="sehat">Sehat</option>
                                            <option value="baik">Baik</option>
                                            <option value="layu">Layu</option>
                                            <option value="sakit">Sakit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="seedingDate" class="form-label">Tanggal Penyemaian</label>
                                    <input type="date" name="seeding_date" class="form-control" id="seedingDate" required>
                                </div>
                                <div class="mb-3">
                                    <label for="harvestDate" class="form-label">Estimasi Tanggal Panen</label>
                                    <input type="date" name="harvest_date" class="form-control" id="harvestDate" required>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <!-- JavaScript for Auto Fill -->
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    // Auto-fill logic when selecting plant code
                                    document.getElementById('plantAttributes').addEventListener('change', function () {
                                        var selectedOption = this.options[this.selectedIndex];
                                        // Mengambil data dari attribute 'data-*' di option yang dipilih
                                        var plantName = selectedOption.getAttribute('data-name');
                                        var scientificName = selectedOption.getAttribute('data-scientific-name');
                                        var plantTypeId = selectedOption.getAttribute('data-type-id');
                                        var categoryId = selectedOption.getAttribute('data-category-id');
                                        var plantBenefit = selectedOption.getAttribute('data-benefit');
                                        // Pilih option di select 'plantName' sesuai nama tanaman
                                        var plantNameSelect = document.getElementById('plantName');
                                        for (var i = 0; i < plantNameSelect.options.length; i++) {
                                            if (plantNameSelect.options[i].text === plantName) {
                                                plantNameSelect.selectedIndex = i;
                                                break;
                                            }
                                        }
                                        // Pilih option di select 'scientificName' sesuai nama ilmiah
                                        var scientificNameSelect = document.getElementById('scientificName');
                                        for (var i = 0; i < scientificNameSelect.options.length; i++) {
                                            if (scientificNameSelect.options[i].text === scientificName) {
                                                scientificNameSelect.selectedIndex = i;
                                                break;
                                            }
                                        }
                                        // Pilih option di select 'benefit' sesuai nama benefit
                                        var benefitSelect = document.getElementById('plantBenefit');
                                        for (var i = 0; i < benefitSelect.options.length; i++) {
                                            if (benefitSelect.options[i].text === plantBenefit) {
                                                benefitSelect.selectedIndex = i;
                                                break;
                                            }
                                        }
                                        // Isi otomatis field lainnya
                                        document.getElementById('plantType').value = plantTypeId || '';
                                        document.getElementById('plantCategories').value = categoryId || '';
                                        // document.getElementById('plantBenefits').value = benefitId || '';
                                        // Tampilkan additional fields
                                        document.getElementById('additionalFields').classList.remove('d-none');
                                        // Gunakan readonly bukan disabled
                                        if (plantName && scientificName && plantType) {
                                            plantNameSelect.setAttribute('readonly', 'readonly');
                                            scientificNameSelect.setAttribute('readonly', 'readonly');
                                            benefitSelect.setAttribute('readonly', 'readonly');
                                            document.getElementById('plantType').setAttribute('readonly', 'readonly');
                                            document.getElementById('plantCategories').setAttribute('readonly', 'readonly');
                                        }
                                    });
                                });
                                // Preview gambar
                                function previewImage(event) {
                                    var imagePreview = document.getElementById('imagePreview');
                                    imagePreview.src = URL.createObjectURL(event.target.files[0]);
                                    imagePreview.style.display = 'block';
                                }
                                document.addEventListener('DOMContentLoaded', function() {
                                // Open modal when "Tambah Lokasi Tanaman Baru" button is clicked
                                document.getElementById('plantLocations').addEventListener('change', function() {
                                    if (this.value === 'add_new_location') {
                                        // Show the modal for adding a new location
                                        new bootstrap.Modal(document.getElementById('addNewLocationModal')).show();
                                        this.value = ''; // Reset dropdown
                                    }
                                });
                                // AJAX submission for adding a new location
                                document.getElementById('addNewLocationForm').addEventListener('submit', function(event) {
                                    event.preventDefault();
                                    let formData = new FormData(this);
                                    // Check if location name already exists in the select options
                                    let existingLocationNames = Array.from(document.querySelectorAll('#plantLocations option'))
                                        .map(option => option.text);
                                    if (existingLocationNames.includes(formData.get('name'))) {
                                        alert('Nama lokasi sudah ada. Silakan gunakan nama lain.');
                                        return; // Stop submission if the location already exists
                                    }
                                    fetch("<?php echo e(route('addNewLocation')); ?>", {
                                        method: "POST",
                                        headers: {
                                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                                        },
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            let select = document.getElementById('plantLocations');
                                            let option = new Option(data.name, data.id);
                                            select.add(option, select.options[select.options.length - 1]); // Add before 'Add New' option
                                            // Set the select value to the newly added location
                                            select.value = data.id; // Automatically select the new location
                                            // Close the modal after successfully adding the location
                                            let newLocationModal = bootstrap.Modal.getInstance(document.getElementById('addNewLocationModal'));
                                            newLocationModal.hide();
                                            // Show the previous modal again
                                            new bootstrap.Modal(document.getElementById('plantAttribute')).show();
                                            // Reset the form for the next entry
                                            this.reset(); // Reset form fields
                                        } else {
                                            alert(data.message || "Error adding location");
                                        }
                                    })
                                    .catch(error => console.error('Error in AJAX request:', error));
                                });
                            });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('modals.add_new_location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </section>
    </main>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/admin/pages/plants/create.blade.php ENDPATH**/ ?>