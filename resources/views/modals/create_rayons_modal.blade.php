<!-- Create Rayon Modal -->
<div class="modal fade" id="Rayons" tabindex="-1" aria-labelledby="RombelLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="RombelLabel">{{ __('Tambah Data Rayon Baru') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" {{ $errors->any() ? 'disabled' : '' }}></button>
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
                <form action="{{ route('rayon.store') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="floatingInputName" placeholder="Nama Rayon" required>
                        <label for="floatingInputName">{{ __('Nama Rayon') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Tambah') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Create Rayon Modal -->
