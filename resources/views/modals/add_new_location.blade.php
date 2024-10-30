<!-- Add New Location Modal -->
<div class="modal fade" id="addNewLocationModal" tabindex="-1" aria-labelledby="addNewLocationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewLocationLabel">{{ __('Tambah Lokasi Tanaman Baru') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addNewLocationForm">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputLocationName" placeholder="Nama Lokasi" required>
                        <label for="floatingInputLocationName">{{ __('Nama Lokasi') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Tambah') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
