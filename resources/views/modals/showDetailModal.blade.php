<!-- Modal -->
<div class="modal fade" id="showDetailModal{{ $item->id }}" tabindex="-1" aria-labelledby="showDetailModal{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-4 shadow-sm">
      <div class="modal-header">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">{{__('Tanaman')}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $item->plantAttribute->name }}</li>
          </ol>
        </nav>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="mb-2">{{ $item->plantAttribute->name }} <span class="text-muted float-end">{{ $item->plantAttribute->plant_code }}</span></h5>
        <p class="mb-3 text-muted">
          <small>{{ $item->plantAttribute->scientific_name }}</small> 
          <span class="float-end"><small>{{ $item->plantType->name }}</small></span>
        </p>

        <!--- Card Image -->
        @if($item->image)
        <img src="{{ asset('storage/' . $item->image) }}" 
          alt="Image of {{ $item->plantAttribute->name ?? 'Unknown' }}" 
          class="w-100 mb-3 rounded" 
          style="width: 100%; height: auto; max-height: 200px; object-fit: cover; border-radius: 15px;">
        @else
            <img src="{{ asset('default-image.png') }}" 
                alt="Default Image" 
                class="img-thumbnail w-100 mb-3 rounded" 
                style="width: 100%; height: auto; max-height: 200px; object-fit: cover; border-radius: 15px;">
        @endif

        <ul class="list-unstyled">

          <li class="mb-2 d-flex justify-content-between align-items-center">
            <span class="d-flex align-items-center text-muted">
              <i class="ri-user-line me-2"></i> <small>{{__('Pemilik')}}</small>
            </span>
            <span class="text-dark">{{ $item->student->name ?? 'Data siswa tidak ditemukan' }}</span>
          </li>

          <li class="mb-2 d-flex justify-content-between align-items-center">
            <span class="d-flex align-items-center text-muted">
              <i class="ri-calendar-line me-2"></i> <small>{{__('Tanggal Tanam')}}</small>
            </span>
            <span class="text-dark">{{ $item->seeding_date }}</span>
          </li>

          <li class="mb-2 d-flex justify-content-between align-items-center">
            <span class="d-flex align-items-center text-muted">
              <i class="ri-calendar-check-line me-2"></i> <small>{{__('Estimasi Panen')}}</small>
            </span>
            <span class="text-dark">{{ $item->harvest_date }}</span>
          </li>

          <li class="mb-2 d-flex justify-content-between align-items-center">
            <span class="d-flex align-items-center text-muted">
              <i class="ri-map-pin-line me-2"></i> <small>{{__('Lokasi')}}</small>
            </span>
            <span class="text-dark">{{ $item->location->name }}</span>
          </li>

          <li class="mb-2 d-flex justify-content-between align-items-center">
            <span class="d-flex align-items-center text-muted">
              <i class="ri-checkbox-circle-line me-2"></i> <small>{{__('Status')}}</small>
            </span>
            <span class="badge bg-light text-dark px-3 py-1 rounded-pill">
              <i class="ri-checkbox-circle-fill text-success me-1"></i> {{ $item->harvest_status }}
            </span>
          </li>

          <li class="mb-2 d-flex justify-content-between align-items-center">
            <span class="d-flex align-items-center text-muted">
              <i class="ri-price-tag-3-line me-2"></i> <small>{{__('Kategori')}}</small>
            </span>
            <span class="text-dark">{{ $item->category->name }}</span>
          </li>

          <li class="mb-2 d-flex justify-content-between align-items-center">
            <span class="d-flex align-items-center text-muted">
              <i class="ri-heart-line me-2"></i> <small>{{__('Kondisi')}}</small>
            </span>
            <span class="badge bg-light text-success px-4 py-1 rounded-pill">{{ $item->status }}</span>
          </li> 

        </ul>
        
        <!-- Divider -->
        <hr class="my-3">
        
          <div class="mt-3">
            <h6>{{__('Manfaat Tanaman')}}</h6>
            <p class="small">{{ $item->plantAttribute->benefit }}</p>
          </div>

        <hr class="my-3"> 
      </div>

      @if($item->harvest_status === 'siap panen')
          <div class="button-container ps-3 d-flex justify-content-between w-100">
            <x-modal-action-buttons 
              deleteRoute="{{ route('plants.destroy', $item->id) }}"
            />
            <div class="ms-auto"> <!-- Kelas ms-auto untuk mendorong elemen ke kanan -->
              <x-modal-action-buttons 
                QrCode="#QrCode{{ $item->id }}"
                markAsHarvested="{{ route('plants.panen', $item->id) }}"
              />
            </div>
          </div>
      @else
          <div class="button-container ps-3 d-flex justify-content-between w-100">
            <x-modal-action-buttons 
              deleteRoute="{{ route('plants.destroy', $item->id) }}"
            />
            <div class="ms-auto"> <!-- Kelas ms-auto untuk mendorong elemen ke kanan -->
              <x-modal-action-buttons 
                QrCode="#QrCode{{ $item->id }}"
              />
            </div>
          </div>
      @endif

    </div>
  </div>
</div>