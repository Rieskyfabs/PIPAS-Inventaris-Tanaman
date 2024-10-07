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
                                    +
                                    {{ __('TAMBAH DATA TANAMAN') }}
                                </a>
                            </div>

                            <div class="table-responsive">
                                <!-- Table with stripped rows -->
                                <table class="table table-bordered table-hover datatable">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>{{__('KODE')}}</th>
                                            <th>{{__('NAMA TANAMAN')}}</th>
                                            <th>{{__('NAMA ILMIAH')}}</th>
                                            <th>{{__('TIPE TANAMAN')}}</th>
                                            <th>{{__('KATEGORI TANAMAN')}}</th>
                                            <th>{{__('MANFAAT TANAMAN')}}</th>
                                            <th>{{__('JUMLAH')}}</th>
                                            <th>{{__('AKSI')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($plants as $plant)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $plant->plantAttribute ? $plant->plantAttribute->plant_code : 'Unknown' }}</td>
                                                <td>{{ $plant->plantAttribute->name }}</td>
                                                <td>{{ $plant->plantAttribute->scientific_name ?? 'Unknown' }}</td>
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
                                                            {{ $plant->type ?? 'Unknown' }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>{{ $plant->category ? $plant->category->name : 'Unknown' }}</td>
                                                <td>{{ $plant->benefit ? $plant->benefit->name : 'Unknown' }}</td>
                                                {{-- <td>{{ $plant->total_quantity }}</td> --}}
                                                <td>
                                                    <span class="badge bg-primary badge-number">{{ $plant->total_quantity }}
                                                        @if($plant->ready_to_harvest_count > 0)
                                                            <span class="notification-bubble"></span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    {{-- <x-action-buttons
                                                        viewData="{{ route('plants.show', $plant->plantAttribute->plant_code) }}"
                                                    /> --}}
                                                    <a href="{{ route('plants.show', $plant->plantAttribute->plant_code) }}" class="btn btn-primary">
                                                        {{__('Lihat Tanaman')}}
                                                    </a>
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
