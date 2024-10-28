@extends('layouts.admin')

@section('title', 'Add New Plant')

@section('contents')
<div>
    <main id="main" class="main">

        <x-breadcrumbs 
            title="{{ __('Tambah Data Tanaman Baru')}}" 
            :items="[ 
                ['route' => 'admin/dashboard', 'label' => 'Dashboard'], 
                ['route' => 'plants', 'label' => 'List Tanaman'], 
                ['label' => 'Tambah Data Tanaman Baru'] 
            ]" 
        />

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{__('Tambahkan Tanaman Baru')}}</h5>
                            <p class="mb-3">{{__('Untuk Menambahkan Data Tanaman, Pastikan Anda Sudah Menambahkan Attribute Dari Tanamannya Terlebih Dahulu.')}}</p>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('plants.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="plantAttributes" class="form-label">Kode Tanaman</label>
                                    <select name="plant_code_id" class="form-select" id="plantAttributes" required>
                                        <option value="" disabled selected>Pilih Kode Tanaman</option>
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
                                </div>

                                <div id="additionalFields" class="d-none">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="plantName" class="form-label">Nama Tanaman</label>
                                            <select name="plant_name_id" class="form-select" id="plantName" required>
                                                <option value="" disabled selected>Nama Tanaman</option>
                                                @foreach ($plantAttributes as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="scientificName" class="form-label">Nama Ilmiah</label>
                                            <select name="plant_scientific_name_id" class="form-select" id="scientificName" required>
                                                <option value="" disabled selected>Nama Ilmiah</option>
                                                @foreach ($plantAttributes as $item)
                                                    <option value="{{ $item->id }}">{{ $item->scientific_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="plantType" class="form-label">Tipe Tanaman</label>
                                            <select name="type" class="form-select" id="plantType" required>
                                                <option value="" disabled selected>Silahkan Pilih Tipe Tanaman</option>
                                                <option value="Herbal">Herbal</option>
                                                <option value="Sayuran">Sayuran</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="plantCategories" class="form-label">Kategori Tanaman</label>
                                            <select name="category_id" class="form-select" id="plantCategories" required>
                                                <option value="" disabled selected>Silahkan Pilih Kategori Tanaman</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="plantBenefits" class="form-label">Manfaat Tanaman</label>
                                            <select name="benefit_id" class="form-select" id="plantBenefits" required>
                                                <option value="" disabled selected>Silahkan Pilih Manfaat Tanaman</option>
                                                @foreach ($benefits as $benefit)
                                                    <option value="{{ $benefit->id }}">{{ $benefit->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="plantImage" class="form-label">Upload Gambar Tanaman</label>
                                    <input type="file" name="image" class="form-control" id="plantImage" accept="image/*" onchange="previewImage(event)">
                                    <img id="imagePreview" src="#" alt="Preview Gambar" style="display: none; width: 100px; height: 100px; object-fit: cover;" />
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="plantLocations" class="form-label">Lokasi Tanaman</label>
                                        <select name="location_id" class="form-select" id="plantLocations" required>
                                            <option value="" disabled selected>Silahkan Pilih Lokasi Tanaman</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                                            @endforeach
                                        </select>
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

                                        // Tampilkan additional fields
                                        document.getElementById('additionalFields').classList.remove('d-none');

                                        // Gunakan readonly bukan disabled
                                        if (plantName && scientificName && plantType) {
                                            plantNameSelect.setAttribute('readonly', 'readonly');
                                            scientificNameSelect.setAttribute('readonly', 'readonly');
                                            document.getElementById('plantType').setAttribute('readonly', 'readonly');
                                            document.getElementById('plantCategories').setAttribute('readonly', 'readonly');
                                            document.getElementById('plantBenefits').setAttribute('readonly', 'readonly');
                                        }
                                    });
                                });

                                // Preview gambar
                                function previewImage(event) {
                                    var imagePreview = document.getElementById('imagePreview');
                                    imagePreview.src = URL.createObjectURL(event.target.files[0]);
                                    imagePreview.style.display = 'block';
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
