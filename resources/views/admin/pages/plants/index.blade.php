@extends('layouts.admin')

@section('title', 'Data Tanaman')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="{{ __('Plants')}}" 
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['label' => 'Data Tanaman']
        ]" 
      />

    <section class="section dashboard"> 
        <div class="row">
            <!-- Total Plants Card -->
            <x-card
            type="plants"
            title="Total Tanaman"
            period="Hari ini"
            icon="ri-plant-fill"
            value="{{ $totalQuantity }}"
            changePercent="12" 
            changeType="increase"
            :filter="true"
            :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
            />
            <!-- End Total Plants Card -->

            <!-- Status Cards -->
            <x-card
            type="revenue"
            title="Tanaman Baik"
            period="Hari ini"
            icon="bi bi-check-circle"
            value="{{ $countByStatus['baik'] ?? 0 }}"
            changePercent="N/A"
            changeType="none"
            :filter="false"
            :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
            />

            <x-card
            type="users"
            title="Tanaman Layu"
            period="Hari ini"
            icon="bi bi-droplet"
            value="{{ $countByStatus['layu'] ?? 0 }}"
            changePercent="N/A"
            changeType="none"
            :filter="false"
            :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
            />

            <x-card
            type="location"
            title="Tanaman Sakit"
            period="Hari ini"
            icon="bi bi-thermometer"
            value="{{ $countByStatus['sakit'] ?? 0 }}"
            changePercent="N/A"
            changeType="none"
            :filter="false"
            :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
            />

            <x-card
            type="plants"
            title="Tanaman Sehat"
            period="Hari ini"
            icon="bi bi-heart"
            value="{{ $countByStatus['sehat'] ?? 0 }}"
            changePercent="N/A"
            changeType="none"
            :filter="false"
            :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
            />
            <!-- End Status Cards -->

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{__('Plants Data')}}</h5>
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
                                {{ __('Add Plant') }}
                            </a>
                        </div>
                        
                        <div class="table-responsive">
                            <!-- Table with stripped rows -->
                            <table class="table table-bordered table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>{{__('Nama Tanaman')}}</th>
                                        <th>{{__('Tipe Tanaman')}}</th>
                                        <th>{{__('Kategori Tanaman')}}</th>
                                        <th>{{__('Lokasi Tanaman')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('QR Code')}}</th>
                                        <th>{{__('Actions')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plants as $plant)
                                        <tr>
                                            <td>{{ $plant->name }}</td>
                                            <td>
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
                                                        {{ $plant->type }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ $plant->category->name ?? 'Kategori tidak ditemukan' }}</td>
                                            <td>{{ $plant->location->name ?? 'Lokasi tidak ditemukan' }}</td>
                                            <td>
                                                <span class="badge 
                                                    @if ($plant->status === 'sehat') badge-soft-green <i class='bi bi-check-circle me-1'></i>
                                                    @elseif ($plant->status === 'baik') badge-soft-primary <i class='bi bi-star me-1'></i>
                                                    @elseif ($plant->status === 'layu') badge-soft-warning <i class='bi bi-exclamation-triangle me-1'></i>
                                                    @elseif ($plant->status === 'sakit') badge-soft-danger <i class='bi bi-exclamation-octagon me-1'></i>
                                                    @else bg-secondary @endif">
                                                    {{ $plant->status }}
                                                </span>
                                            </td>
                                            <td>{{ $plant->qr_code }}</td>
                                            <td>
                                                <x-action-buttons
                                                    action="{{ route('plants.destroy', $plant->id) }}"
                                                    viewData="{{ route('plants.show', $plant->id) }}"
                                                    method="DELETE"
                                                    submit="true"
                                                    :dropdown="[ ['href' => route('plants.edit', $plant->id), 'label' => 'Edit'] ]"
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