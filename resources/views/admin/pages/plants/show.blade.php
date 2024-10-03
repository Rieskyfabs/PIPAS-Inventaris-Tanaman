@extends('layouts.admin')

@section('title', 'Data Tanaman')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs
        title="{{ __('List Tanaman ') . $plantDetail->plantAttribute->name}}"
        :items="[
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['route' => 'plants', 'label' => 'Data Tanaman'],
          ['label' => 'Detail Tanaman']
        ]"
      />

      <section class="section dashboard">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Detail Data Tanaman : ') . $plantDetail->plantAttribute->plant_code }}</h5>
                        <div class="add-btn-container">
                            <a href="{{ route('plants.create') }}" class="btn-add-item">
                                <svg aria-hidden="true" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <!-- SVG content -->
                                    <path
                                        stroke-width="2"
                                        stroke="#fffffff"
                                        d="M13.5 3H12H8C6.34315 3 5 4.34315 5 6V18C5 19.6569 6.34315 21 8 21H11M13.5 3L19 8.625M13.5 3V7.625C13.5 8.17728 13.9477 8.625 14.5 8.625H19M19 8.625V11.8125"
                                        stroke-linejoin="round"
                                        stroke-linecap="round"
                                        ></path>
                                        <path
                                        stroke-linejoin="round"
                                        stroke-linecap="round"
                                        stroke-width="2"
                                        stroke="#fffffff"
                                        d="M17 15V18M17 21V18M17 18H14M17 18H20"
                                    >
                                    </path>
                                </svg>
                                {{ __('Tambah Data Tanaman') }}
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
                                      <th>{{__('QR CODE')}}</th>
                                      <th>{{__('AKSI')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plants as $plant)
                                        <tr>
                                            <td>
                                                @if($plant->image)
                                                    <a href="{{ asset('storage/' . $plant->image) }}" target="_blank">
                                                        <img src="{{ asset('storage/' . $plant->image) }}" alt="Image of {{ $plant->plantAttribute->name }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                                    </a>
                                                @else
                                                    <img src="{{ asset('default-image.png') }}" alt="Default Image" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                                @endif 
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <a href="#" class="text-heading text-truncate">
                                                        <span class="fw-medium">{{ $plant->plantAttribute->name }}</span>
                                                    </a>
                                                    <small>{{ $plant->plantAttribute->scientific_name ?? 'Unknown' }}</small>
                                                    <small>
                                                        @if ($plant->type === 'Sayuran')
                                                            <span class="badge badge-soft-green">
                                                                <i class="fa fa-carrot" aria-hidden="true" style="font-size: 1.2em; margin-right: 0.5em;"></i> {{ $plant->type }}
                                                            </span>
                                                        @elseif ($plant->type === 'Herbal')
                                                            <span class="badge badge-soft-warning">
                                                                <i class="fa fa-leaf" aria-hidden="true" style="font-size: 1.2em; margin-right: 0.5em;"></i> {{ $plant->type }}
                                                            </span>
                                                        @else
                                                            <span class="badge badge-soft-gray">
                                                                {{ $plant->type ?? 'Unknown' }}
                                                            </span>
                                                        @endif
                                                    </small>
                                                </div>
                                            </td>
                                            <td>{{ $plant->category->name ?? 'Kategori tidak ditemukan' }}</td>
                                            <td>{{ $plant->benefit->name ?? 'Manfaat tidak ditemukan' }}</td>
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
                                                    {{ ucfirst($plant->harvest_status) }}
                                                    @if($plant->harvest_status === 'siap panen')
                                                        <span class="notification-bubble"></span>
                                                    @endif
                                                </span>
                                            </td>
                                            <td>
                                              <img src="{{ asset('storage/' . $plant->qr_code) }}" alt="QR Code for {{ $plant->name }}">
                                            </td>
                                            <td>
                                                <x-action-buttons
                                                    deleteData="{{ route('plants.destroy', $plant->id) }}"
                                                    method="DELETE"
                                                    submit="true" {{-- Tombol hapus akan muncul --}}
                                                    :dropdown="[
                                                        ['href' => route('plants.edit', $plant->id), 'label' => 'Edit'],
                                                    ]"
                                                />
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
