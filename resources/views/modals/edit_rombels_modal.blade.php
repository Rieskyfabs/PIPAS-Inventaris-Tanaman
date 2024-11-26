<div class="modal fade" id="EditRombels{{ $item->id }}" tabindex="-1" aria-labelledby="EditRombelLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditRombelLabel{{ $item->id }}">{{ __('Edit Rombel') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('rombel.update', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName{{ $item->id }}" value="{{ $item->name }}" required>
                        <label for="floatingInputName{{ $item->id }}">{{ __('Nama Rombel') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>