<div class="modal fade" id="EditLocation{{ $location->id }}" tabindex="-1" aria-labelledby="EditLocationLabel{{ $location->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditLocationLabel{{ $location->id }}">{{ __('Edit Lokasi') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('locations.update', ['id' => $location->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName{{ $location->id }}" value="{{ $location->name }}" required>
                        <label for="floatingInputName{{ $location->id }}">{{ __('Nama Lokasi') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>