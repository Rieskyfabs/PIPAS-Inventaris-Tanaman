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
                    <div class="col-lg-10">
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

                                    <!-- Plant Code and Attributes Section -->
                                    <div class="mb-3">
                                        <label for="plantAttributes" class="form-label">{{ __('Kode Tanaman') }}</label>
                                        <div class="input-group">
                                            <select name="plant_code_id" class="form-select" id="plantAttributes" required>
                                                <option value="" disabled selected>{{ __('Pilih Kode Tanaman') }}</option>
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

                                    <!-- Auto-filled Attributes Section (Hidden Initially) -->
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

                                    <!-- Plant Owner Section -->
                                    <div class="row mb-3">
                                        <div class="">
                                            <label for="student" class="form-label">{{ __('Pemilik Tanaman') }}</label>
                                            <div class="input-group">
                                                <select name="student_id" class="form-select" id="student" required>
                                                    <option value="" disabled selected>{{ __('Pilih Siswa') }}</option>
                                                    @foreach ($students as $student)
                                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Image Upload Section -->
                                    <div class="mb-3">
                                        <label for="plantImage" class="form-label">Upload Gambar Tanaman (jpeg, png, jpg, gif)</label>
                                        <input type="file" name="image" class="form-control" id="plantImage" accept="image/*" onchange="previewImage(event)">
                                        <img id="imagePreview" src="#" alt="Preview Gambar" style="display: none; width: 100px; height: 100px; object-fit: cover;" class="mt-3"/>
                                    </div>

                                    <!-- Location and Status Section -->
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

                                    <!-- Dates Section -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="seedingDate" class="form-label">Tanggal Penyemaian</label>
                                            <input type="date" name="seeding_date" class="form-control" id="seedingDate" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="harvestDate" class="form-label">Estimasi Tanggal Panen</label>
                                            <input type="date" name="harvest_date" class="form-control" id="harvestDate" required>
                                        </div>
                                    </div>

                                    <hr>

                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                                <!-- JavaScript for Auto Fill -->
                                <script src="{{ asset('assets/js/plantScript.js') }}"></script>
                            </div>
                        </div>
                    </div>
                </div>
                @include('modals.add_new_location')
            </section>
        </main>
    </div>
@endsection