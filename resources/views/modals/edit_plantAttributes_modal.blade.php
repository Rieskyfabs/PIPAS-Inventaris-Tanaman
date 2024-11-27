<div class="modal fade" id="EditPlantAttribute{{ $item->id }}" tabindex="-1" aria-labelledby="EditPlantAttributeLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditPlantAttributeLabel{{ $item->id }}">{{ __('Edit Atribut Tanaman') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('plantAttributes.update', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-floating mb-3">
                        <input type="text" name="plant_code" class="form-control" id="floatingInputPlantCode{{ $item->id }}" value="{{ $item->plant_code }}" required>
                        <label for="floatingInputPlantCode{{ $item->id }}">{{ __('Kode Tanaman') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName{{ $item->id }}" value="{{ $item->name }}" required>
                        <label for="floatingInputName{{ $item->id }}">{{ __('Nama Tanaman') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="scientific_name" class="form-control" id="floatingInputScientificName{{ $item->id }}" value="{{ $item->scientific_name }}" required>
                        <label for="floatingInputScientificName{{ $item->id }}">{{ __('Nama Ilmiah Tanaman') }}</label>
                    </div>
                    <div class="form-floating mb-3 d-flex align-items-center">
                        <select name="type_id" class="form-control custom-select me-2" id="floatingInputType{{ $item->id }}" required>
                            <option value="" disabled selected>{{ __('Pilih Tipe Tanaman') }}</option>
                            @foreach ($plantTypes as $type)
                                <option value="{{ $type->id }}" {{ $item->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn-add-item" data-bs-toggle="modal" data-bs-target="#addNewTypeModal">
                            +
                        </button>
                        <label for="floatingInputType{{ $item->id }}">{{ __('Tipe Tanaman') }}</label>
                    </div>
                    <div class="form-floating mb-3 d-flex align-items-center">
                        <select name="category_id" class="form-control custom-select me-2" id="floatingInputCategory{{ $item->id }}" required>
                            <option value="" disabled selected>{{ __('Pilih Kategori') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button type="button" class="btn-add-item" data-bs-toggle="modal" data-bs-target="#addNewCategoryModal">
                            +
                        </button>
                        <label for="floatingInputCategory{{ $item->id }}">{{ __('Kategori Tanaman') }}</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="benefit" class="form-control" id="floatingInputBenefit{{ $item->id }}" value="{{ $item->benefit }}" required>
                        <label for="floatingInputBenefit{{ $item->id }}">{{ __('Manfaat Tanaman') }}</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="description" class="form-control" id="floatingInputDescription{{ $item->id }}" value="{{ $item->description }}">
                        <label for="floatingInputDescription{{ $item->id }}">{{ __('Deskripsi') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
