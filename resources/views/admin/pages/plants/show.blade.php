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
                title="{{ __('List Tanaman ') . 'NULL' }}"
                :items="[ 
                    ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
                    ['route' => 'plants', 'label' => 'Data Tanaman'],
                    ['label' => 'Detail Tanaman']
                ]"
                />
            @endif
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
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
                                            {{-- <th>{{__('GAMBAR')}}</th> --}}
                                            <th>{{__('NAMA')}}</th>
                                            <th>{{__('PEMILIK')}}</th>
                                            <th>{{__('LOKASI')}}</th>
                                            <th>{{__('KONDISI')}}</th>
                                            <th>{{__('TANGGAL TANAM')}}</th>
                                            <th>{{__('EST. TANGGAL PANEN')}}</th>
                                            <th>{{__('STATUS')}}</th>
                                            <th>{{__('AKSI')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($plants as $item)
                                                <tr>
                                                    {{-- <td>
                                                        @if($item->image)
                                                            <a href="{{ asset('storage/' . $item->image) }}" target="_blank">
                                                                <img src="{{ asset('storage/' . $item->image) }}" alt="Image of {{ $item->plantAttribute->name ?? 'Unknown' }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                                            </a>
                                                        @else
                                                            <img src="{{ asset('default-image.png') }}" alt="Default Image" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                                        @endif 
                                                    </td> --}}
                                                    <td>
                                                        <div class="d-flex flex-column">
                                                            <a href="#" class="text-heading text-truncate">
                                                                <span class="fw-bold">{{ $item->plantAttribute->name }}</span>
                                                            </a>
                                                            <small class="text-muted fst-italic">{{ $item->plantAttribute->scientific_name ?? 'Data nama ilmiah tidak ditemukan' }}</small>
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->student->name ?? 'Data siswa tidak ditemukan' }}</td>
                                                    <td>{{ $item->location->name ?? 'Data lokasi tidak ditemukan' }}</td>
                                                    <td>
                                                        <span class="badge
                                                            @if ($item->status === 'sehat') badge-soft-green <i class='bi bi-check-circle me-1'></i>
                                                            @elseif ($item->status === 'baik') badge-soft-primary <i class='bi bi-star me-1'></i>
                                                            @elseif ($item->status === 'layu') badge-soft-warning <i class='bi bi-exclamation-triangle me-1'></i>
                                                            @elseif ($item->status === 'sakit') badge-soft-danger <i class='bi bi-exclamation-octagon me-1'></i>
                                                            @else bg-secondary @endif">
                                                            {{ ucfirst($item->status) }}
                                                        </span>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($item->seeding_date)->format('d M Y') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->harvest_date)->format('d M Y') }}</td>
                                                    <td>
                                                        <span class="badge
                                                            @if ($item->harvest_status === 'belum panen') badge-soft-warning
                                                            @elseif ($item->harvest_status === 'siap panen') badge-soft-primary
                                                            @elseif ($item->harvest_status === 'sudah dipanen') badge-soft-green
                                                            @endif">
                                                            {{ Str::upper($item->harvest_status) }}
                                                            @if($item->harvest_status === 'siap panen')
                                                                <span class="notification-bubble"></span>
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if($item->harvest_status === 'siap panen')
                                                            <div class="d-flex align-items-center gap-2">
                                                                <x-action-buttons 
                                                                    QrCode="#QrCode{{ $item->id }}"
                                                                    editModalTarget="#EditPlant{{ $item->id }}"
                                                                    deleteRoute="{{ route('plants.destroy', $item->id) }}"
                                                                    markAsHarvested="{{ route('plants.panen', $item->id) }}"
                                                                />
                                                            </div>
                                                        @else
                                                            <div style="display: flex; align-items: center;">
                                                                <x-action-buttons 
                                                                    QrCode="#QrCode{{ $item->id }}"
                                                                    editModalTarget="#EditPlant{{ $item->id }}"
                                                                    deleteRoute="{{ route('plants.destroy', $item->id) }}"
                                                                />
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @include('modals.edit_plant_modal')
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
