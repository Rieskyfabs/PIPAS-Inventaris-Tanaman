@extends('layouts.admin')

@section('title', 'Data Tanaman')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs
        title="{{ __('Plant Details')}}"
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['route' => 'plants', 'label' => 'Data Tanaman'],
          ['label' => 'Detail Tanaman']
        ]"
      />

      <section class="section dashboard">
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('Plants Data Details : ') . $plantDetail->plantAttribute->plant_code }}</h5>
                        
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
