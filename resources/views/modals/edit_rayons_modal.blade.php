<!-- Edit Rayon Modal -->
<div class="modal fade" id="EditRayons{{ $item->id }}" tabindex="-1" aria-labelledby="EditRayonLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditRayonLabel{{ $item->id }}">{{ __('Edit Rayon') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" {{ $errors->any() ? 'disabled' : '' }}></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('rayon.update', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName{{ $item->id }}" value="{{ old('name', $item->name) }}" required>
                        <label for="floatingInputName{{ $item->id }}">{{ __('Nama Rayon') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Rayon Modal -->
