@extends('layouts.admin')

@section('title', 'Data Tanaman')

@section('contents')
    <div>
        <main id="main" class="main">

            <x-breadcrumbs
                title="{{ __('List Tanaman ') . ($plantDetail->plantAttribute->name ?? 'NULL') }}"
                :items="[ 
                    ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
                    ['route' => 'plants', 'label' => 'Data Tanaman'],
                    ['label' => 'Detail Tanaman']
                ]"
            />
            
            <x-atoms.table.error-alert />

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
                                                        <span class="badge {{ ConditionBadgeClass($item->status) }}">
                                                            {{ ucfirst($item->status) }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $item->formatted_seeding_date }}</td>
                                                    <td>{{ $item->formatted_harvest_date }}</td>
                                                    <td>
                                                        <span class="badge {{ harvestBadgeClass($item->harvest_status) }}">
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