<div class="modal fade" id="EditPlant{{ $item->id }}" tabindex="-1" aria-labelledby="EditPlantLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditPlantLabel{{ $item->id }}">{{ __('Edit Data Tanaman') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('plants.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Plant Owner Section -->
                    <div class="form-floating mb-3">
                        <select name="student_id" class="form-select" id="studentForm">
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}" {{ $student->id == $item->student_id ? 'selected' : '' }}>
                                    {{ $student->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="studentForm">{{ __('NAMA PEMILIK') }}</label>
                    </div>

                    <!-- Plant Name (readonly) -->
                    <div class="form-floating mb-3">
                        <select name="plant_name_id" class="form-select" id="plantName" readonly>
                            @foreach ($plantAttributes as $attribute)
                                <option value="{{ $attribute->id }}" {{ $attribute->id == $item->plant_name_id ? 'selected' : '' }}>
                                    {{ $attribute->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="plantName">{{ __('NAMA TANAMAN') }}</label>
                    </div>

                    <!-- Plant Scientific Name (hidden) -->
                    <input type="hidden" name="plant_scientific_name_id" value="{{ $item->plant_scientific_name_id }}">

                    <!-- Plant Code (hidden) -->
                    <input type="hidden" name="plant_code_id" value="{{ $item->plant_code_id }}">

                    <!-- Type Selection (readonly) -->
                    <input type="hidden" name="type" value="{{ $item->type }}">

                    <!-- Category Selection (readonly) -->
                    <div class="form-floating mb-3">
                        <select name="category_id" class="form-select" id="plantCategories" readonly>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="plantCategories">{{ __('KATEGORI TANAMAN') }}</label>
                    </div>

                    <!-- Plant Type Selection (readonly) -->
                    <div class="form-floating mb-3">
                        <select name="type_id" class="form-select" id="plantType" readonly>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id', $item->type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <label for="plantType">{{ __('TIPE TANAMAN') }}</label>
                    </div>
                    
                    <!-- Benefit Selection (readonly) -->
                    <div class="form-floating mb-3">
                        <select name="benefit_id" class="form-select" id="plantBenefits" readonly>
                            @foreach ($plantAttributes as $attribute)
                                <option value="{{ $attribute->id }}" {{ $attribute->id == $item->benefit_id ? 'selected' : '' }}>
                                    {{ $attribute->benefit }} <!-- Display the benefit value -->
                                </option>
                            @endforeach
                        </select>
                        <label for="plantBenefits">{{ __('MANFAAT TANAMAN') }}</label>
                    </div>

                    <!-- Location Selection (editable) -->
                    <div class="form-floating mb-3">
                        <select name="location_id" class="form-select" id="plantLocations">
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}" {{ $location->id == $item->location_id ? 'selected' : '' }}>
                                    {{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="plantLocations">{{ __('LOKASI TANAMAN') }}</label>
                    </div>

                    <!-- Status (editable) -->
                    <div class="form-floating mb-3">
                        <select name="status" class="form-select" required>
                            <option value="sehat" {{ $item->status == 'sehat' ? 'selected' : '' }}>
                                {{__('Sehat')}}
                            </option>
                            <option value="baik" {{ $item->status == 'baik' ? 'selected' : '' }}>
                                {{__('Baik')}}
                            </option>
                            <option value="layu" {{ $item->status == 'layu' ? 'selected' : '' }}>
                                {{__('Layu')}}
                            </option>
                            <option value="sakit" {{ $item->status == 'sakit' ? 'selected' : '' }}>
                                {{__('Sakit')}}
                            </option>
                        </select>
                        <label for="status">{{ __('KONDISI TANAMAN') }}</label>
                    </div>

                    <!-- Seeding Date (editable) -->
                    <div class="form-floating mb-3">
                        <input type="date" name="seeding_date" class="form-control" value="{{ \Carbon\Carbon::parse($item->seeding_date)->format('Y-m-d') }}" required>
                        <label for="seeding_date">{{ __('TANGGAL TANAM') }}</label>
                    </div>

                    <!-- Harvest Date (editable) -->
                    <div class="form-floating mb-3">
                        <input type="date" name="harvest_date" class="form-control" value="{{ \Carbon\Carbon::parse($item->harvest_date)->format('Y-m-d') }}" required>
                        <label for="harvest_date">{{ __('ESTIMASI TANGGAL PANEN') }}</label>
                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>