@extends('layouts.admin')

@section('title', 'Data Tanaman')

@section('contents')
<div>
    <main id="main" class="main">
        <x-breadcrumbs
            title="{{ __('Kelola Tanaman')}}"
            :items="[
            ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
            ['label' => 'Data Tanaman']
            ]"
        />
        <section class="section dashboard">
            <div class="row">
                
                <form method="GET" action="{{ route('plants') }}">
                    <div class="mb-3">
                        <label for="period" class="form-label">{{__('Filter Periode')}}</label>
                        <select name="period" id="period" class="form-select" onchange="this.form.submit()">
                            <option value="today" {{ $period == 'today' ? 'selected' : '' }}>{{__('Hari ini')}}</option>
                            <option value="this_month" {{ $period == 'this_month' ? 'selected' : '' }}>{{__('Bulan Ini')}}</option>
                            <option value="this_year" {{ $period == 'this_year' ? 'selected' : '' }}>{{__('Tahun Ini')}}</option>
                        </select>
                    </div>
                </form>

                <!-- Summary Card -->
                <x-card
                    type="plants"
                    title="Total Tanaman"
                    icon="ri-seedling-fill"
                    :value="$totalPlants"
                />

                <!-- Card Tanaman Masuk -->
                <x-card
                    type="revenue"
                    title="Tanaman Masuk"
                    icon="ri-inbox-archive-fill"
                    :value="$plantsIn"
                />

                <!-- Card Tanaman Keluar -->
                <x-card
                    type="location"
                    title="Tanaman Keluar"
                    icon="ri-inbox-unarchive-fill"
                    :value="$plantsOut"
                />
                <!-- End Summary Card -->

                <!-- Right side columns -->
                <div class="row-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ __('Total Tanaman Berdasarkan Status') }}</h5>
                            <!-- Plant Status Chart -->
                            <div id="plantStatus"></div>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    const chartData = @json($chartData);
                                    // Check if there's no data
                                    if (chartData.labels.length === 0 || chartData.series.length === 0) {
                                        document.querySelector("#plantStatus").innerHTML = "<p class='text-center'>Tidak ada data</p>";
                                        return; // Exit the script to avoid rendering the chart
                                    }
                                    // Define a mapping of status to colors
                                    const colorMapping = {
                                        "sehat": '#28a745',  // Green
                                        "baik": '#007bff',   // Blue
                                        "layu": '#ffc107',   // Yellow
                                        "sakit": '#dc3545'   // Red
                                    };
                                    // Create an array for series and corresponding colors
                                    const seriesData = [];
                                    const colors = [];
                                    chartData.labels.forEach(label => {
                                        seriesData.push(chartData.series[chartData.labels.indexOf(label)]);
                                        colors.push(colorMapping[label]);
                                    });
                                    // Initialize ApexCharts with the fetched data
                                    new ApexCharts(document.querySelector("#plantStatus"), {
                                        series: seriesData, // Values of plant counts based on status
                                        chart: {
                                            height: 350,
                                            type: 'pie', // Pie chart type
                                            toolbar: {
                                                show: true // Show toolbar
                                            }
                                        },
                                        labels: chartData.labels, // Status labels
                                        colors: colors, // Set custom colors for the statuses
                                        responsive: [{
                                            breakpoint: 480,
                                            options: {
                                                chart: {
                                                    width: 300
                                                },
                                                legend: {
                                                    position: 'bottom'
                                                }
                                            }
                                        }]
                                    }).render();
                                });
                            </script>
                            <!-- End Pie Chart -->
                        </div>
                    </div>
                </div>

                <!-- End Right side columns -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{__('Data Tanaman')}}</h5>
                            <p>{{__('')}}</p>
                            <div class="add-btn-container">
                                <a href="{{ route('plants.create') }}" class="btn-add-item">
                                    <i class="ri-add-fill"></i>
                                    {{ __('TAMBAH') }}
                                </a>
                            </div>
                            <div class="table-responsive">
                                <!-- Table with stripped rows -->
                                <table class="table table-bordered table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>{{__('KODE TANAMAN')}}</th>
                                            <th>{{__('NAMA TANAMAN')}}</th>
                                            <th>{{__('TIPE TANAMAN')}}</th>
                                            <th>{{__('KATEGORI TANAMAN')}}</th>
                                            <th>{{__('MANFAAT TANAMAN')}}</th>
                                            <th>{{__('JUMLAH')}}</th>
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
                                                            <span class="fw-medium">{{ $item->plantAttribute ? $item->plantAttribute->plant_code : 'Data kode tanaman tidak ditemukan' }}</span>
                                                        </div>
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
                                                            <span class="fw-medium">{{ $item->plantType->name ?? 'Data tipe tanaman tidak tersedia' }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <div class="text-heading text-truncate">
                                                            <span class="fw-medium">{{ $item->category->name ?? 'Data tipe kategori tidak tersedia' }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td style="white-space: normal; word-wrap: break-word;">
                                                    <div class="d-flex flex-column">
                                                        <div class="text-heading text-truncate">
                                                            <span class="text-muted">{{ Str::limit($item->plantAttribute->benefit ?? 'Data manfaat tanaman tidak ditemukan', 20) }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary badge-number">{{ $item->total_quantity }}
                                                        @if($item->ready_to_harvest_count > 0)
                                                            <span class="notification-bubble"></span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    <div style="display: flex; align-items: center; gap: 10px;">
                                                        <a href="{{ route('plants.show', $item->plantAttribute->plant_code) }}" class="btn btn-primary">
                                                            {{__('Lihat')}} 
                                                        </a>
                                                    </div>
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
