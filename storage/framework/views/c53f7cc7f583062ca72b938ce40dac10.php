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
          <div class="col-lg-8">
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
                <!-- Advanced Form Elements -->
                  <form action="<?php echo e(route('plants.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    
                    <div class="form-floating mb-3">
                        <select name="plant_code_id" class="form-select" id="plantAttributes" required>
                            <option value="" disabled selected>Pilih Kode Tanaman</option>
                            <?php $__currentLoopData = $plantAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>" 
                                        data-name="<?php echo e($item->name); ?>" 
                                        data-scientific-name="<?php echo e($item->scientific_name); ?>" 
                                        data-type="<?php echo e($item->type); ?>"
                                        data-category-id="<?php echo e($item->category_id); ?>"
                                        data-benefit-id="<?php echo e($item->benefit_id); ?>">
                                    <?php echo e($item->plant_code); ?> : <?php echo e($item->description); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <label for="plantAttributes">Kode Tanaman</label>
                    </div>
                    
                    <!-- Nama Tanaman -->
                    <div class="form-floating mb-3">
                        <select name="plant_name_id" class="form-select" id="plantName" required>
                            <option value="" disabled selected>Nama Tanaman</option>
                            <?php $__currentLoopData = $plantAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <label for="plantName">Nama Tanaman</label>
                    </div>

                    <!-- Nama Ilmiah -->
                    <div class="form-floating mb-3">
                        <select name="plant_scientific_name_id" class="form-select" id="scientificName" required>
                            <option value="" disabled selected>Nama Ilmiah</option>
                            <?php $__currentLoopData = $plantAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->scientific_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <label for="scientificName">Nama Ilmiah</label>
                    </div>

                    <!-- Tipe Tanaman -->
                    <div class="form-floating mb-3">
                        <select name="type" class="form-control" id="plantType" required>
                            <option value="" disabled selected>Silahkan Pilih Tipe Tanaman</option>
                            <option value="Herbal">Herbal</option>
                            <option value="Sayuran">Sayuran</option>
                        </select>
                        <label for="plantType">Tipe Tanaman</label>
                    </div>

                    <!-- Kategori Tanaman -->
                    <div class="form-floating mb-3">
                        <select name="category_id" class="form-select" id="plantCategories" required>
                            <option value="" disabled selected>Silahkan Pilih Kategori Tanaman</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <label for="plantCategories">Kategori Tanaman</label>
                    </div>

                    <!-- Manfaat Tanaman -->
                    <div class="form-floating mb-3">
                        <select name="benefit_id" class="form-select" id="plantBenefits" required>
                            <option value="" disabled selected>Silahkan Pilih Manfaat Tanaman</option>
                            <?php $__currentLoopData = $benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($benefit->id); ?>"><?php echo e($benefit->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <label for="plantBenefits">Manfaat Tanaman</label>
                    </div>

                    <!-- Input for Image -->
                    <div class="form-group mb-3">
                        <label for="plantImage">Upload Gambar Tanaman</label>
                        <input type="file" name="image" class="form-control" id="plantImage" accept="image/*" onchange="previewImage(event)">
                    </div>

                    <!-- Image Preview -->
                    <div class="form-group mb-3">
                        <img id="imagePreview" src="#" alt="Preview Gambar" style="display: none; width: 100px; height: 100px; object-fit: cover;" />
                    </div>

                    <div class="form-floating mb-3">
                        <select name="location_id" class="form-select" id="plantLocations" required>
                            <option value="" disabled selected>Silahkan Pilih Lokasi Tanaman</option>
                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($location->id); ?>"><?php echo e($location->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <label for="plantLocations">Lokasi Tanaman</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select name="status" class="form-select" id="plantStatus" required>
                            <option value="" disabled selected>Silahkan Pilih Kondisi Tanaman</option>
                            <option value="sehat">Sehat</option>
                            <option value="baik">Baik</option>
                            <option value="layu">Layu</option>
                            <option value="sakit">Sakit</option>
                        </select>
                        <label for="plantStatus">Kondisi Tanaman</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" name="seeding_date" class="form-control" id="seedingDate" placeholder="Seeding Date" required>
                        <label for="seedingDate">Tanggal Penyemaian</label>
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
                        var plantType = selectedOption.getAttribute('data-type');
                        var categoryId = selectedOption.getAttribute('data-category-id');
                        var benefitId = selectedOption.getAttribute('data-benefit-id');

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

                        // Isi otomatis field lainnya
                        document.getElementById('plantType').value = plantType || '';
                        document.getElementById('plantCategories').value = categoryId || '';
                        document.getElementById('plantBenefits').value = benefitId || '';

                        // Gunakan readonly bukan disabled
                        if (plantName && scientificName && plantType) {
                            plantNameSelect.setAttribute('readonly', 'readonly');
                            scientificNameSelect.setAttribute('readonly', 'readonly');
                            document.getElementById('plantType').setAttribute('readonly', 'readonly');
                            document.getElementById('plantCategories').setAttribute('readonly', 'readonly');
                            document.getElementById('plantBenefits').setAttribute('readonly', 'readonly');
                        } else {
                            // Hapus atribut readonly jika autofill tidak tersedia
                            plantNameSelect.removeAttribute('readonly');
                            scientificNameSelect.removeAttribute('readonly');
                            document.getElementById('plantType').removeAttribute('readonly');
                            document.getElementById('plantCategories').removeAttribute('readonly');
                            document.getElementById('plantBenefits').removeAttribute('readonly');
                        }
                        });

                        // Aktifkan semua field readonly sebelum submit
                        document.querySelector('form').addEventListener('submit', function () {
                        document.getElementById('plantName').removeAttribute('readonly');
                        document.getElementById('scientificName').removeAttribute('readonly');
                        document.getElementById('plantType').removeAttribute('readonly');
                        document.getElementById('plantCategories').removeAttribute('readonly');
                        document.getElementById('plantBenefits').removeAttribute('readonly');
                        });
                    });
                </script>
                <!-- End JavaScript for Auto Fill -->

                <!-- JavaScript for Previewing Image -->
                <script>
                    function previewImage(event) {
                        var reader = new FileReader();
                        reader.onload = function(){
                            var output = document.getElementById('imagePreview');
                            output.src = reader.result;
                            output.style.display = 'block'; // Show the preview
                        };
                        reader.readAsDataURL(event.target.files[0]);
                    }
                </script>

              </div>
            </div>
          </div>
        </div>
      </section>

    </main>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/daffy/Documents/Projects/PIPAS Invetaris Tanaman/PIPAS-Inventaris-Tanaman/resources/views/admin/pages/plants/create.blade.php ENDPATH**/ ?>