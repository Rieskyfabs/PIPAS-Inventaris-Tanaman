@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Halo, {{Auth::user()->username}}!" 
        :items="[
            ['route' => 'home', 'label' => 'Home'],
            ['label' => 'Dashboard']
        ]" 
      />  

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Plant Card -->
            <x-card
              type="plants"
              title="Tanaman"
              period="Hari ini"
              icon="ri-plant-line"
              value="{{ $totalPlantsQuantity }}"
              changePercent="12"
              changeType="increase"
              :filter="true"
              :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
            />
            <!-- End Plant Card -->

            <!-- Location Card -->
            <x-card
              type="location"
              title="Lokasi Inventaris"
              period="Hari ini"
              icon="ri-map-pin-line"
              value="{{ $totalLocations }}"
              changePercent="12"
              changeType="increase"
              :filter="true"
              :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
            />
            <!-- End Location Card -->

            <!-- Total Users Card -->
            <x-card
              type="revenue"
              title="Pengguna"
              period="Hari ini"
              icon="ri-group-line"
              value="{{ $totalUsers }}"
              changePercent="12"
              changeType="increase"
              :filter="true"
              :filterOptions="['Hari ini', 'Bulan Ini', 'Tahun Ini']"
            />
            <!-- End Total Users Card -->
          </div>
            <!-- Reports -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{__('Laporan Status Tanaman')}}</h5>
                        @if(empty($dataBelumDipanen) && empty($dataSiapDipanen) && empty($dataSudahDipanen))
                            <p>{{ __('Tidak ada data lokasi yang tersedia.') }}</p>
                        @else
                            <!-- Column Chart -->
                            <div id="columnChart"></div>

                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#columnChart"), {
                                        series: [{
                                            name: 'Belum Panen',
                                            data: @json($dataBelumDipanen)
                                        }, {
                                            name: 'Siap Dipanen',
                                            data: @json($dataSiapDipanen)
                                        }, {
                                            name: 'Sudah Dipanen',
                                            data: @json($dataSudahDipanen)
                                        }],
                                        chart: {
                                            type: 'bar',
                                            height: 350
                                        },
                                        plotOptions: {
                                            bar: {
                                                horizontal: false,
                                                columnWidth: '55%',
                                                endingShape: 'rounded'
                                            },
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            show: true,
                                            width: 2,
                                            colors: ['transparent']
                                        },
                                        xaxis: {
                                            categories: @json(array_values($ruangan)),
                                            title: {
                                                text: 'Lokasi Penyimpanan'
                                            }
                                        },
                                        yaxis: {
                                            title: {
                                                text: 'Jumlah Tanaman'
                                            }
                                        },
                                        fill: {
                                            opacity: 1
                                        },
                                        tooltip: {
                                            y: {
                                                formatter: function(val) {
                                                    return val + " Tanaman"
                                                }
                                            }
                                        }
                                    }).render();
                                });
                            </script>
                            <!-- End Column Chart -->
                        @endif
                    </div>
                </div>
            </div>
            <!-- End Reports -->

            <!-- Recent Plants -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                </div>

                <div class="card-body">
                  <h5 class="card-title">{{__('Tanaman Terbaru')}}</h5>

                  <table class="table table-borderless table-hover datatable">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('KODE TANAMAN MASUK') }}</th>
                            <th scope="col">{{ __('KODE TANAMAN') }}</th>
                            <th scope="col">{{ __('NAMA TANAMAN') }}</th>
                            <th scope="col">{{ __('TIPE TANAMAN') }}</th>
                            <th scope="col">{{ __('KATEGORI TANAMAN') }}</th>
                            <th scope="col">{{ __('LOKASI TANAMAN') }}</th>
                            <th scope="col">{{ __('STATUS') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plants as $plant)
                            <tr>
                                <td>{{ $plant->tanamanMasuk->kode_tanaman_masuk }}</td>
                                <td>{{ $plant->plantAttribute->plant_code }}</td>
                                <th scope="row">
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('plants.show', ['plantAttribute' => $plant->plantAttribute->plant_code]) }}">
                                          {{ $plant->plantAttribute->name }}
                                        </a>
                                        <small>{{ $plant->plantAttribute->scientific_name ?? 'Unknown' }}</small>
                                    </div>
                                </th>
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
                                        @if ($plant->harvest_status === 'sudah dipanen') badge-soft-green <i class='bi bi-check-circle me-1'></i>
                                        @elseif ($plant->harvest_status === 'siap panen') badge-soft-primary <i class='bi bi-star me-1'></i>
                                        @elseif ($plant->harvest_status === 'belum panen') badge-soft-warning <i class='bi bi-exclamation-triangle me-1'></i>
                                        @else bg-secondary @endif">
                                        {{ $plant->harvest_status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
            <!-- End Recent Sales -->

          </div>

          <!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ __('Aktifitas Terbaru') }}</h5>
              <div class="activity">
                @forelse ($activityLogs as $log)
                  <div class="activity-item d-flex mb-3">
                    <div class="activite-label text-muted small me-3" style="min-width: 70px;">
                      {{ $log->performed_at->diffForHumans() }}
                    </div>
                    <i class='bi bi-circle-fill activity-badge text-success me-3'></i>
                    <div class="activity-content">
                      <strong>{{ $log->action }}</strong> - {{ $log->description }}
                      <br><small class="text-muted">{{ __('Oleh') }}: {{ $log->user->username }}</small>
                    </div>
                  </div><!-- End activity item-->
                @empty
                  <div class="activity-item d-flex">
                    <div class="activity-content">
                      {{ __('Tidak Ada Aktivitas Terbaru') }}
                    </div>
                  </div><!-- End activity item-->
                @endforelse
              </div>
            </div>
          </div>

          <!-- End Recent Activity -->

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ __('Galeri Tanaman Terbaru') }}</h5>

                    @if($recentPlants->isEmpty())
                        <p>{{ __('Tidak ada data tersedia.') }}</p>
                    @else
                        <!-- Slides with captions -->
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach($recentPlants as $index => $plant)
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach($recentPlants as $index => $plant)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $plant->image) }}" class="d-block w-100 img-max-height" alt="{{ $plant->plantAttribute->name }}">
                                        <div class="overlay"></div> <!-- Overlay gelap -->
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{ $plant->plantAttribute->name }}</h5>
                                            <p>{{ $plant->location->name ?? 'There Is No Location.' }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">{{__('Previous')}}</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">{{__('Next')}}</span>
                            </button>
                        </div><!-- End Slides with captions -->
                    @endif

                </div>
            </div>
        </div>


          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">{{ __('Total Tanaman Per Lokasi') }}</h5>

                  <!-- Check if there's data -->
                  @if(count($dataPerLocation) > 0)
                      <!-- Bar Chart -->
                      <canvas id="DataTanaman" style="max-height: 400px;"></canvas>
                      <script>
                          document.addEventListener("DOMContentLoaded", () => {
                              // Get data from the Blade view
                              const labels = @json(array_keys($dataPerLocation));
                              const dataValues = @json(array_values($dataPerLocation));

                              new Chart(document.querySelector('#DataTanaman'), {
                                  type: 'bar',
                                  data: {   
                                      labels: labels,
                                      datasets: [{
                                          label: 'Total',
                                          data: dataValues,
                                          backgroundColor: [
                                              'rgba(255, 99, 132, 0.2)',
                                              'rgba(255, 159, 64, 0.2)',
                                              'rgba(255, 205, 86, 0.2)',
                                              'rgba(75, 192, 192, 0.2)',
                                          ],
                                          borderColor: [
                                              'rgb(255, 99, 132)',
                                              'rgb(255, 159, 64)',
                                              'rgb(255, 205, 86)',
                                              'rgb(75, 192, 192)',
                                          ],
                                          borderWidth: 1
                                      }]
                                  },
                                  options: {
                                      scales: {
                                          y: {
                                              beginAtZero: true
                                          }
                                      }
                                  }
                              });
                          });
                      </script>
                      <!-- End Bar Chart -->
                  @else
                      <!-- No data message -->
                      <p>{{ __('Tidak ada data tersedia untuk lokasi tanaman.') }}</p>
                  @endif
              </div>
          </div>

        </div>
        <!-- End Right side columns -->

      </div>
    </section>

    </main>
  </div>
@endsection