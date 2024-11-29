@if(isset($QrCode))
    <!-- QR Code Pop Up Button Modal -->
    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="{{ $QrCode }}">
        <i class="icon ri-qr-scan-2-line" ></i>
    </button>
@endif

@if(isset($deleteRoute) && $deleteRoute)
    <form action="{{ $deleteRoute }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" data-confirm-delete="true">
            <i class="icon ri-delete-bin-line"></i>
        </button>
    </form>
@endif  

@if(isset($markAsHarvested) && $markAsHarvested)
    <form action="{{ $markAsHarvested }}" method="POST" class="d-flex align-items-center gap-4">
        @csrf
        @method('PUT')
        <!-- Harvest Button -->
        <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Tandai tanaman sudah dipanen">
            <i class='bx bx-check-double'></i>
        </button>
    </form>
@endif