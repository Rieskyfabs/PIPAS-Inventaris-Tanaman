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
              title="Total Tanaman"
              period="Hari ini"
              icon="ri-plant-fill"
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
              title="Total Lokasi Inventaris"
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
              title="Total Pengguna"
              period="Hari ini"
              icon="ri-user-fill"
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

                    <!-- Form untuk memilih tahun -->

                    <!-- Column Chart -->
                    <div id="columnChart"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#columnChart"), {
                                series: [{
                                    name: 'Belum Dipanen',
                                    data: @json($dataBelumDipanen) // Data dinamis berdasarkan ruangan
                                }, {
                                    name: 'Siap Dipanen',
                                    data: @json($dataSiapDipanen) // Data dinamis berdasarkan ruangan
                                }, {
                                    name: 'Sudah Dipanen',
                                    data: @json($dataSudahDipanen) // Data dinamis berdasarkan ruangan
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
                                    categories: @json($ruangan), // Ruangan dinamis
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
                  <h5 class="card-title">Tanaman Terbaru</h5>

                  <table class="table table-borderless table-hover datatable">
                    <thead>
                      <tr>
                        <th scope="col">{{__('KODE')}}</th>
                        <th scope="col">{{__('NAMA TANAMAN')}}</th>
                        <th scope="col">{{__('TIPE TANAMAN')}}</th>
                        <th scope="col">{{__('KATEGORI TANAMAN')}}</th>
                        <th scope="col">{{__('LOKASI TANAMAN')}}</th>
                        <th scope="col">{{__('STATUS')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($plants as $plant)
                        <tr>
                          <td>{{$plant->plantCode->plant_code}}</td>
                          <th scope="row"><a href="#">{{$plant->plantCode->name}}</a></th>
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
                      {{ __('Tidak Ada Aktivitas') }}
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
                <h5 class="card-title">Galeri PIPAS</h5>

                <!-- Slides with captions -->
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  </div>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="/assets/img/pipas/slide-2.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Lorem Ipsum Sit Dolor Amet Lorem Ipsum Sit Dolor Amet Lorem.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="/assets/img/pipas/slide-2.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem Ipsum Sit Dolor Amet Lorem Ipsum Sit Dolor Amet Lorem.</p>
                      </div>
                    </div>
                    <div class="carousel-item">
                      <img src="/assets/img/pipas/slide-2.jpg" class="d-block w-100" alt="...">
                      <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Lorem Ipsum Sit Dolor Amet Lorem Ipsum Sit Dolor Amet Lorem.</p>
                      </div>
                    </div>
                  </div>

                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>

                </div><!-- End Slides with captions -->

              </div>
            </div>

          </div>

          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">{{__('Total Tanaman PerLokasi')}}</h5>

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
              </div>
          </div>

        </div>
        <!-- End Right side columns -->

      </div>
    </section>

    </main>
  </div>
@endsection