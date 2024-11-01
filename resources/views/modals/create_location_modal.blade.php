<!-- Create Location Modal -->
<div class="modal fade" id="Location" tabindex="-1" aria-labelledby="LocationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LocationLabel">{{ __('Tambahkan Lokasi Baru') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('locations.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName" placeholder="name" required>
                        <label for="floatingInputName">{{ __('Nama Lokasi') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Tambah') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Create Location Modal -->
