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
                <!-- Summary Card -->
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
                <x-card
                    type="revenue"
                    title="Tanaman Masuk"
                    period="Hari ini"
                    icon="ri-inbox-archive-fill"
                    value="24"
                    changePercent="12" 
                    changeType="increase"
                    :filter="true"
                    :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
                />
                <x-card
                    type="location"
                    title="Tanaman Keluar"
                    period="Hari ini"
                    icon="ri-inbox-unarchive-fill"
                    value="12"
                    changePercent="12" 
                    changeType="increase"
                    :filter="true"
                    :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
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

                                    // Inisialisasi ApexCharts dengan data yang diambil
                                    new ApexCharts(document.querySelector("#plantStatus"), {
                                        series: chartData.series, // Nilai jumlah tanaman berdasarkan status
                                        chart: {
                                            height: 350,
                                            type: 'pie', // Tipe chart 'pie'
                                            toolbar: {
                                                show: true // Tampilkan toolbar
                                            }
                                        },
                                        labels: chartData.labels, // Label status (Sehat, Sakit, dll.)
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
                                            <th>#</th>
                                            <th>{{__('KODE')}}</th>
                                            <th>{{__('NAMA TANAMAN')}}</th>
                                            <th>{{__('NAMA ILMIAH')}}</th>
                                            <th>{{__('TIPE TANAMAN')}}</th>
                                            <th>{{__('KATEGORI TANAMAN')}}</th>
                                            <th>{{__('MANFAAT TANAMAN')}}</th>
                                            <th>{{__('JUMLAH')}}</th>
                                            {{-- <th>{{__('STATUS')}}</th> --}}
                                            {{-- <th>{{__('QR CODE')}}</th> --}}
                                            <th>{{__('ACTIONS')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($plants as $plant)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $plant->plantCode ? $plant->plantCode->plant_code : 'Unknown' }}</td>
                                                <td>{{ $plant->name }}</td>
                                                <td>{{ $plant->scientific_name ?? 'Unknown' }}</td>
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
                                                {{-- <td>
                                                    <span class="badge 
                                                        @if ($plant->status === 'sehat') badge-soft-green <i class='bi bi-check-circle me-1'></i>
                                                        @elseif ($plant->status === 'baik') badge-soft-primary <i class='bi bi-star me-1'></i>
                                                        @elseif ($plant->status === 'layu') badge-soft-warning <i class='bi bi-exclamation-triangle me-1'></i>
                                                        @elseif ($plant->status === 'sakit') badge-soft-danger <i class='bi bi-exclamation-octagon me-1'></i>
                                                        @else bg-secondary @endif">
                                                        {{ $plant->status }}
                                                    </span>
                                                </td> --}}
                                                <td>{{ $plant->total_quantity }}</td>
                                                {{-- <td>
                                                    <img src="{{ asset('storage/' . $plant->qr_code) }}" alt="QR Code for {{ $plant->name }}">
                                                </td> --}}
                                                <td>
                                                    <x-action-buttons
                                                        action="{{ route('plants.destroy', $plant->id) }}"
                                                        viewData="{{ route('plants.show', $plant->plant_code_id) }}"
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