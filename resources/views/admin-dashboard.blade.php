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

          <!-- Recent Plants -->
          <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Tanaman Terbaru <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
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
              <h5 class="card-title">Aktifitas Terbaru <span></span></h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    Voluptatem blanditiis blanditiis eveniet
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    Voluptates corrupti molestias voluptatem
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                    Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    Est sit eum reiciendis exercitationem
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                  </div>
                </div><!-- End activity item-->

              </div>

            </div>
          </div>
          <!-- End Recent Activity -->

          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Data Tanaman Masuk Peruangan</h5>

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
                                      label: 'View Tanaman',
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