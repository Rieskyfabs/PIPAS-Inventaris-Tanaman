<div class="modal fade" id="EditBenefit{{ $benefit->id }}" tabindex="-1" aria-labelledby="EditBenefitLabel{{ $benefit->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditBenefitLabel{{ $benefit->id }}">{{ __('Edit Deskripsi Manfaaat') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('benefits.update', ['id' => $benefit->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName{{ $benefit->id }}" value="{{ $benefit->name }}" required>
                        <label for="floatingInputName{{ $benefit->id }}">{{ __('Deskripsi Manfaat') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>