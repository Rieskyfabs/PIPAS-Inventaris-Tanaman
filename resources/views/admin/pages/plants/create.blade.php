@extends('layouts.admin')

@section('title', 'Add New Plant')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="{{ __('Add New Plant')}}" 
        :items="[ 
          ['route' => 'home', 'label' => 'Home'], 
          ['route' => 'plants', 'label' => 'List Plants'], 
          ['label' => 'Add New Plant'] 
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tambahkan Tanaman Baru</h5>
                <p class="mb-3">Untuk Menambahkan Data Tanaman, Pastikan Anda Sudah Menambahkan Attribute Dari Tanamannya Terlebih Dahulu.</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Advanced Form Elements -->
                  <form action="{{ route('plants.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-floating mb-3">
                        <select name="plant_code_id" class="form-select" id="plantAttributes" required>
                            <option value="" disabled selected>Silahkan Pilih Kode Tanaman</option>
                            @foreach ($plantAttributes as $item)
                                <option value="{{ $item->id }}" 
                                        data-name="{{ $item->name }}" 
                                        data-scientific-name="{{ $item->scientific_name }}" 
                                        data-type="{{ $item->type }}"
                                        data-category-id="{{ $item->category_id }}"
                                        data-benefit-id="{{ $item->benefit_id }}">
                                    {{ $item->plant_code }} : {{ $item->description }}
                                </option>
                            @endforeach
                        </select>
                        <label for="plantAttributes">Kode Tanaman</label>
                    </div>
                    
                    <!-- Nama Tanaman -->
                    <div class="form-floating mb-3">
                        <select name="plant_name_id" class="form-select" id="plantName" required>
                            <option value="" disabled selected>Nama Tanaman</option>
                            @foreach ($plantAttributes as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <label for="plantName">Nama Tanaman</label>
                    </div>

                    <!-- Nama Ilmiah -->
                    <div class="form-floating mb-3">
                        <select name="plant_scientific_name_id" class="form-select" id="scientificName" required>
                            <option value="" disabled selected>Nama Ilmiah</option>
                            @foreach ($plantAttributes as $item)
                                <option value="{{ $item->id }}">{{ $item->scientific_name }}</option>
                            @endforeach
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
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label for="plantCategories">Kategori Tanaman</label>
                    </div>

                    <!-- Manfaat Tanaman -->
                    <div class="form-floating mb-3">
                        <select name="benefit_id" class="form-select" id="plantBenefits" required>
                            <option value="" disabled selected>Silahkan Pilih Manfaat Tanaman</option>
                            @foreach ($benefits as $benefit)
                                <option value="{{ $benefit->id }}">{{ $benefit->name }}</option>
                            @endforeach
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
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                        <label for="plantLocations">Lokasi Tanaman</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select name="status" class="form-select" id="plantStatus" required>
                            <option value="" disabled selected>Silahkan Pilih Status Tanaman</option>
                            <option value="sehat">Sehat</option>
                            <option value="baik">Baik</option>
                            <option value="layu">Layu</option>
                            <option value="sakit">Sakit</option>
                        </select>
                        <label for="plantStatus">Status Tanaman</label>
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
@endsection
