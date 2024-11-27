<div class="d-flex align-items-center">

    @if(isset($editModalTarget))
        <!-- Edit Button -->
        <button type="button" class="icon-button" data-bs-toggle="modal" data-bs-target="{{ $editModalTarget }}">
            <i class="bx bx-edit"></i>
        </button>
    @endif

    @if(isset($QrCode))
        <!-- QR Code Pop Up Button -->
        <button type="button" class="icon-button" data-bs-toggle="modal" data-bs-target="{{ $QrCode }}">
            <i class="bx bx-qr-scan"></i>
        </button>
    @endif

    @if(isset($deleteRoute) && $deleteRoute)
        <form action="{{ $deleteRoute }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="icon-button" data-confirm-delete="true">
                <i class="bi bi-trash"></i>
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

</div>  