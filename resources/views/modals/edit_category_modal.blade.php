<div class="modal fade" id="EditCategory{{ $item->id }}" tabindex="-1" aria-labelledby="EditCategoryLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditCategoryLabel{{ $item->id }}">{{ __('Edit Kategori') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.update', ['id' => $item->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName{{ $item->id }}" value="{{ $item->name }}" required>
                        <label for="floatingInputName{{ $item->id }}">{{ __('Nama Kategori') }}</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="description" class="form-control" id="floatingInputDescription{{ $item->id }}" value="{{ $item->description }}">
                        <label for="floatingInputDescription{{ $item->id }}">{{ __('Deskripsi Kategori') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>