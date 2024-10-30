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
                                    <label for="plantAttributes" class="form-label">{{ __('Kode Tanaman') }}</label>
                                    <div class="input-group">
                                        <select name="plant_code_id" class="form-select" id="plantAttributes" required>
                                            <option value="" disabled selected>Pilih Kode Tanaman</option>
                                            @foreach ($plantAttributes as $item)
                                                <option value="{{ $item->id }}" 
                                                        data-name="{{ $item->name }}" 
                                                        data-scientific-name="{{ $item->scientific_name }}" 
                                                        data-type-id="{{ $item->type_id }}" 
                                                        data-category-id="{{ $item->category_id }}"
                                                        data-benefit="{{ $item->benefit }}">
                                                    {{ $item->plant_code }} : {{ $item->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <a href="{{ url('admin/atribut-tanaman/list-atribut-tanaman') }}" class="btn btn-outline-secondary btn-add-item">
                                            {{ __('+') }}
                                        </a>
                                    </div>
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
                                            <select name="type_id" class="form-select" id="plantType" required>
                                                <option value="" disabled selected>Silahkan Pilih Tipe Tanaman</option>
                                                @foreach ($plantTypes as $types)
                                                    <option value="{{ $types->id }}">{{ $types->name }}</option>
                                                @endforeach
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
                                            <label for="plantBenefit" class="form-label">Manfaat Tanaman</label>
                                            <select name="benefit_id" class="form-select" id="plantBenefit" required>
                                                <option value="" disabled selected>Silahkan Pilih Manfaat Tanaman</option>
                                                @foreach ($plantAttributes as $item)
                                                    <option value="{{ $item->id }}">{{ $item->benefit }}</option>
                                                @endforeach
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
                                        <label for="plantLocations" class="form-label">{{ __('Lokasi Tanaman') }}</label>
                                        <div class="input-group">
                                            <select name="location_id" class="form-select" id="plantLocations" required>
                                                <option value="" disabled selected>Pilih Lokasi Tanaman</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
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

                                    fetch("{{ route('addNewLocation') }}", {
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
            @include('modals.add_new_location')
        </section>
    </main>
</div>
@endsection