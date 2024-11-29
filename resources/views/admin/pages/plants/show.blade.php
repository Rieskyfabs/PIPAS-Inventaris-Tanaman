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
                                                <th>{{__('NO')}}</th>
                                                <th>{{__('PEMILIK')}}</th>
                                                <th>{{__('NAMA')}}</th>
                                                <th>{{__('LOKASI')}}</th>
                                                <th>{{__('KONDISI')}}</th>
                                                <th>{{__('TANGGAL TANAM')}}</th>
                                                <th>{{__('EST. PANEN')}}</th>
                                                <th>{{__('STATUS')}}</th>
                                                <th>{{__('AKSI')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($plants as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <div class="d-flex flex-column">
                                                            <div class="text-heading text-truncate">
                                                                <span class="fw-medium">{{ $item->student->name ?? 'Data siswa tidak ditemukan' }}</span>
                                                            </div>
                                                            <small class="text-muted">
                                                                {{ $item->student->rombel->name ?? 'Data nis tidak ditemukan' }} |
                                                                {{ $item->student->nis ?? 'Data nis tidak ditemukan' }} |
                                                                {{ $item->student->rayon->name ?? 'Data nis tidak ditemukan' }}
                                                            </small>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column">
                                                            <div class="text-heading text-truncate">
                                                                <span class="fw-medium">{{ $item->plantAttribute->name }}</span>
                                                            </div>
                                                            <small class="text-muted">{{ $item->plantAttribute->scientific_name ?? 'Data nama ilmiah tidak ditemukan' }}</small>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex flex-column">
                                                            <div class="text-heading text-truncate">
                                                                <span class="fw-medium">{{ $item->location->name ?? 'Data lokasi tidak ditemukan' }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge
                                                            @if ($item->status === 'sehat') badge-soft-green
                                                            @elseif ($item->status === 'baik') badge-soft-primary
                                                            @elseif ($item->status === 'layu') badge-soft-warning
                                                            @elseif ($item->status === 'sakit') badge-soft-danger
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
                                                            <div class="d-flex align-items-center">
                                                                <x-action-buttons 
                                                                    showDetailModal="#showDetailModal{{ $item->id }}"
                                                                    {{-- QrCode="#QrCode{{ $item->id }}" --}}
                                                                    editModalTarget="#EditPlant{{ $item->id }}"
                                                                    {{-- deleteRoute="{{ route('plants.destroy', $item->id) }}" --}}
                                                                    {{-- markAsHarvested="{{ route('plants.panen', $item->id) }}" --}}
                                                                />
                                                            </div>
                                                        @else
                                                            <div class="d-flex align-items-center">
                                                                <x-action-buttons 
                                                                    showDetailModal="#showDetailModal{{ $item->id }}"
                                                                    {{-- QrCode="#QrCode{{ $item->id }}" --}}
                                                                    editModalTarget="#EditPlant{{ $item->id }}"
                                                                    {{-- deleteRoute="{{ route('plants.destroy', $item->id) }}" --}}
                                                                />
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @include('modals.showDetailModal')
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