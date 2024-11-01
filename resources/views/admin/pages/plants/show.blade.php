@extends('layouts.admin')

@section('title', 'Data Tanaman')

@section('contents')
  <div>
    <main id="main" class="main">

      @if($plantDetail)
        <x-breadcrumbs
          title="{{ __('List Tanaman ') . ($plantDetail->plantAttribute->name ?? '') }}"
          :items="[ 
            ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
            ['route' => 'plants', 'label' => 'Data Tanaman'],
            ['label' => 'Detail Tanaman']
          ]"
        />
      @else
        <x-breadcrumbs
          title="{{ __('List Tanaman ') . '' }}"
          :items="[ 
            ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
            ['route' => 'plants', 'label' => 'Data Tanaman'],
            ['label' => 'Detail Tanaman']
          ]"
        />
      @endif

      <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Detail Data Tanaman  ') . ($plantDetail->plantAttribute->name ?? '') }}</h5>
                        <div class="add-btn-container">
                            <a href="{{ route('plants.create') }}" class="btn-add-item">
                                +
                                {{ __('TAMBAH') }}
                            </a>
                        </div>

                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table table-bordered table-hover datatable">
                                <thead>
                                    <tr>
                                      <th>{{__('GAMBAR')}}</th>
                                      <th>{{__('NAMA')}}</th>
                                      <th>{{__('KATEGORI')}}</th>
                                      <th>{{__('MANFAAT')}}</th>
                                      <th>{{__('LOKASI')}}</th>
                                      <th>{{__('KONDISI')}}</th>
                                      <th>{{__('TANGGAL TANAM')}}</th>
                                      <th>{{__('EST. TANGGAL PANEN')}}</th>
                                      <th>{{__('STATUS')}}</th>
                                      {{-- <th>{{__('QR CODE')}}</th> --}}
                                      <th>{{__('AKSI')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plants as $plant)
                                        <tr>
                                            <td>
                                                @if($plant->image)
                                                    <a href="{{ asset('storage/' . $plant->image) }}" target="_blank">
                                                        <img src="{{ asset('storage/' . $plant->image) }}" alt="Image of {{ $plant->plantAttribute->name ?? 'Unknown' }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                                    </a>
                                                @else
                                                    <img src="{{ asset('default-image.png') }}" alt="Default Image" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                                @endif 
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-heading text-truncate">
                                                        <!-- Nama tanaman dibuat bold -->
                                                        <span class="fw-bold">{{ $plant->plantAttribute->name }}</span>
                                                    </a>
                                                    <!-- Nama ilmiah dibuat pudar dan italic -->
                                                    <small class="text-muted fst-italic">{{ $plant->plantAttribute->scientific_name ?? 'Unknown' }}</small>
                                                    <!-- Tipe tanaman dengan background warna smooth -->
                                                    <small>
                                                        <span class="badge" style="background-color: #e0f7df; color: #388e3c;">
                                                            <i class="fa fa-leaf" aria-hidden="true" style="font-size: 1.2em; margin-right: 0.5em;"></i> {{ $plant->plantType->name }}
                                                        </span>
                                                    </small>
                                                </div>
                                            </td>
                                            <td>{{ $plant->category->name ?? 'Kategori tidak ditemukan' }}</td>
                                            <td style="white-space: normal; word-wrap: break-word;">
                                                {{ Str::limit($plant->plantAttribute ? $plant->plantAttribute->benefit : 'Unknown', 20) }}
                                            </td>
                                            <td>{{ $plant->location->name ?? 'Lokasi tidak ditemukan' }}</td>
                                            <td>
                                                <span class="badge
                                                    @if ($plant->status === 'sehat') badge-soft-green <i class='bi bi-check-circle me-1'></i>
                                                    @elseif ($plant->status === 'baik') badge-soft-primary <i class='bi bi-star me-1'></i>
                                                    @elseif ($plant->status === 'layu') badge-soft-warning <i class='bi bi-exclamation-triangle me-1'></i>
                                                    @elseif ($plant->status === 'sakit') badge-soft-danger <i class='bi bi-exclamation-octagon me-1'></i>
                                                    @else bg-secondary @endif">
                                                    {{ ucfirst($plant->status) }}
                                                </span>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($plant->seeding_date)->format('d M Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($plant->harvest_date)->format('d M Y') }}</td>
                                            <td>
                                                <span class="badge
                                                    @if ($plant->harvest_status === 'belum panen') badge-soft-warning
                                                    @elseif ($plant->harvest_status === 'siap panen') badge-soft-primary
                                                    @elseif ($plant->harvest_status === 'sudah dipanen') badge-soft-green
                                                    @endif">
                                                    {{ Str::upper($plant->harvest_status) }}
                                                    @if($plant->harvest_status === 'siap panen')
                                                        <span class="notification-bubble"></span>
                                                    @endif
                                                </span>
                                            </td>
                                            {{-- <td>
                                                <img src="{{ asset('storage/' . $plant->qr_code) }}" alt="QR Code for {{ $plant->plantAttribute->name ?? 'Unknown' }}">
                                            </td> --}}
                                            <td>
                                                @if($plant->harvest_status === 'siap panen')
                                                    <div style="display: flex; align-items: center;">
                                                        <form action="{{ route('plants.panen', $plant->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-success">
                                                                {{ __('Panen') }}
                                                            </button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <div style="display: flex; align-items: center;">
                                                        <button type="button" class="icon-button" data-bs-toggle="modal" data-bs-target="#QrCode" tooltip>
                                                            <i class='bx bx-qr-scan'></i>
                                                        </button>
                                                        <button type="button" class="icon-button" data-bs-toggle="modal" data-bs-target="#EditPlant{{ $plant->id }}">
                                                            <i class='bx bx-edit'></i>
                                                        </button>
                                                        <x-action-buttons
                                                            deleteData="{{ route('plants.destroy', $plant->id) }}"
                                                            method="DELETE"
                                                            submit="true"
                                                        />
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
      </section>

    </main>
  </div>
@endsection
