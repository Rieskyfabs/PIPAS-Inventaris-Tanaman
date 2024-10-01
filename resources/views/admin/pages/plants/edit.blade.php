@extends('layouts.admin')

@section('title', 'Edit Plant Data')

@section('contents')
    <div>
        <main id="main" class="main">

            <x-breadcrumbs title="{{ __('Edit Plant') }}" :items="[
                ['route' => 'home', 'label' => 'Home'],
                ['route' => 'plants', 'label' => 'Data Tanaman'],
                ['label' => 'Edit Plant'],
            ]" />

            <section class="section dashboard">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ __('Edit Plant Data') }}</h5>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('plants.update', $plant->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Plant Name (readonly) -->
                                    <div class="form-floating mb-3">
                                        <select name="plant_name_id" class="form-select" id="plantName" readonly>
                                            @foreach ($plantAttributes as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $plant->plant_name_id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="plantName">{{ __('Nama Tanaman') }}</label>
                                    </div>

                                    <!-- Plant Scientific Name (hidden) -->
                                    <input type="hidden" name="plant_scientific_name_id"
                                        value="{{ $plant->plant_scientific_name_id }}">

                                    <!-- Plant Code (hidden) -->
                                    <input type="hidden" name="plant_code_id" value="{{ $plant->plant_code_id }}">

                                    <!-- Type Selection (readonly) -->
                                    <input type="hidden" name="type" value="{{ $plant->type }}">

                                    <!-- Category Selection (readonly) -->
                                    <div class="form-floating mb-3">
                                        <select name="category_id" class="form-select" id="plantCategories" readonly>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $plant->category_id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="plantCategories">{{ __('Kategori Tanaman') }}</label>
                                    </div>

                                    <!-- Benefit Selection (readonly) -->
                                    <div class="form-floating mb-3">
                                        <select name="benefit_id" class="form-select" id="plantBenefits" readonly>
                                            @foreach ($benefits as $benefit)
                                                <option value="{{ $benefit->id }}"
                                                    {{ $benefit->id == $plant->benefit_id ? 'selected' : '' }}>
                                                    {{ $benefit->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="plantBenefits">{{ __('Manfaat Tanaman') }}</label>
                                    </div>

                                    <!-- Location Selection (readonly) -->
                                    <div class="form-floating mb-3">
                                        <select name="location_id" class="form-select" id="plantLocations" readonly>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->id }}"
                                                    {{ $location->id == $plant->location_id ? 'selected' : '' }}>
                                                    {{ $location->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="plantLocations">{{ __('Lokasi Tanaman') }}</label>
                                    </div>

                                    <!-- Status (editable) -->
                                    <div class="form-floating mb-3">
                                        <select name="status" class="form-select" required>
                                            <option value="sehat" {{ $plant->status == 'sehat' ? 'selected' : '' }}>Sehat
                                            </option>
                                            <option value="baik" {{ $plant->status == 'baik' ? 'selected' : '' }}>Baik
                                            </option>
                                            <option value="layu" {{ $plant->status == 'layu' ? 'selected' : '' }}>Layu
                                            </option>
                                            <option value="sakit" {{ $plant->status == 'sakit' ? 'selected' : '' }}>Sakit
                                            </option>
                                        </select>
                                        <label for="status">{{ __('Status') }}</label>
                                    </div>

                                    <!-- Seeding Date (editable) -->
                                    <div class="form-floating mb-3">
                                        <input type="date" name="seeding_date" class="form-control"
                                            value="{{ $plant->seeding_date }}" required>
                                        <label for="seeding_date">{{ __('Seeding Date') }}</label>
                                    </div>

                                    <!-- Harvest Date (editable) -->
                                    <div class="form-floating mb-3">
                                        <input type="date" name="harvest_date" class="form-control"
                                            value="{{ $plant->harvest_date }}" required>
                                        <label for="harvest_date">{{ __('Harvest Date') }}</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
@endsection
