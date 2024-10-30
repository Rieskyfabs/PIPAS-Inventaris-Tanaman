<!-- Add New Category Modal -->
<div class="modal fade" id="addNewCategoryModal" tabindex="-1" aria-labelledby="addNewCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewCategoryModalLabel">{{ __('Tambah Kategori Tanaman Baru') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addNewCategoryForm">
                    <div class="mb-3">
                        <label for="newCategoryName" class="form-label">Nama Kategori Tanaman</label>
                        <input type="text" class="form-control" id="newCategoryName" name="name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
