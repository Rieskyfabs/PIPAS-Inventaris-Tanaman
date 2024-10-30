<!-- Add New Type Modal -->
<div class="modal fade" id="addNewTypeModal" tabindex="-1" aria-labelledby="addNewTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewTypeModalLabel">{{ __('Tambah Tipe Tanaman Baru') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addNewTypeForm">
                    <div class="mb-3">
                        <label for="newTypeName" class="form-label">Nama Tipe Tanaman</label>
                        <input type="text" class="form-control" id="newTypeName" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>