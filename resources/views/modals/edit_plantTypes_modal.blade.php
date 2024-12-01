@foreach ($plantTypes as $item)
    <div class="modal fade" id="EditPlantTypes{{ $item->id }}" tabindex="-1" aria-labelledby="EditPlantTypesLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditPlantTypesLabel{{ $item->id }}">{{ __('Edit Nama Tipe Tanaman') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('plantTypes.update', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="floatingInputName{{ $item->id }}" value="{{ $item->name }}" required>
                            <label for="floatingInputName{{ $item->id }}">{{ __('Nama Tipe Tanaman  ') }}</label>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach