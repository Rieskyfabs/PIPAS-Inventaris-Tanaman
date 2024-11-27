@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Laporan Tanaman Masuk" 
        :items="[
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'Laporan Tanaman Masuk']
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('LAPORAN TANAMAN MASUK')}}</h5>
                
                <div class="d-flex justify-content-between align-items-center mb-3">

                  @auth
                    <div class="add-btn-container d-flex">
                        <a href="{{ route('reports.tanaman-masuk.export.excel', ['start_date' => request('start_date'), 'end_date' => request('end_date'), 'type' => 'masuk']) }}" class="btn btn-success me-2" data-bs-toggle="tooltip" title="Export to Excel">
                            <i class="bi bi-file-earmark-excel"></i> Export Excel
                        </a>
                        <a href="{{ route('reports.tanaman-masuk.export.pdf', ['start_date' => request('start_date'), 'end_date' => request('end_date'), 'type' => 'masuk']) }}" class="btn btn-danger me-2" data-bs-toggle="tooltip" title="Export to PDF">
                            <i class="bi bi-file-earmark-pdf"></i> Export PDF
                        </a>
                        <a href="{{ route('reports.tanaman-masuk.print', ['start_date' => request('start_date'), 'end_date' => request('end_date'), 'type' => 'masuk']) }}" class="btn btn-secondary" data-bs-toggle="tooltip" title="Print">
                            <i class="bi bi-printer"></i> Print
                        </a>
                    </div>
                  @endauth

                    <form method="GET" action="{{ route('reports.tanaman-masuk') }}" class="d-flex align-items-end">
                        <div class="d-flex">
                            <div class="me-2">
                                <label for="start_date" class="form-label">Tanggal Awal</label>
                                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}" placeholder="Tanggal Awal">
                            </div>
                            <div class="me-2">
                                <label for="end_date" class="form-label">Tanggal Akhir</label>
                                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}" placeholder="Tanggal Akhir">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">{{ __('Filter') }}</button>
                        <a href="{{ route('reports.tanaman-masuk') }}" class="btn btn-secondary">{{ __('Reset') }}</a>
                    </form>
                </div>

                <!-- Table with stripped rows -->
                <table class="table table-bordered table-hover datatable">
                    <thead>
                        <tr>
                          <th>{{__('NO')}}</th>
                          <th>{{__('GAMBAR')}}</th>
                          <th>{{__('KODE TANAMAN MASUK')}}</th>
                          <th>{{__('KODE TANAMAN')}}</th>
                          <th>{{__('NAMA TANAMAN')}}</th>
                          <th>{{__('LOKASI TANAMAN')}}</th>
                          <th>{{__('KONDISI TANAMAN')}}</th>
                          <th>{{__('TANGGAL MASUK')}}</th>
                          <th>{{__('JUMLAH MASUK')}}</th>
                          {{-- <th>{{__('ACTIONS')}}</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporanTanamanMasuk as $item)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>
                                  @if($item->plant->image)
                                      <a href="{{ asset('storage/' . $item->plant->image) }}" target="_blank">
                                          <img src="{{ asset('storage/' . $item->plant->image) }}" alt="Image of {{ $item->plant->name }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                      </a>
                                  @else
                                      <img src="{{ asset('default-image.png') }}" alt="Default Image" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                  @endif 
                              </td>
                              <td>{{ $item->kode_tanaman_masuk }}</td>
                              <td>{{ $item->plant->plantAttribute->plant_code }}</td>
                              <td>{{ $item->plant->plantAttribute->name }}</td>
                              <td>{{ $item->plant->location->name }}</td>
                              <td>
                                  <span class="badge
                                      @if ($item->plant->status === 'sehat') badge-soft-green <i class='bi bi-check-circle me-1'></i>
                                      @elseif ($item->plant->status === 'baik') badge-soft-primary <i class='bi bi-star me-1'></i>
                                      @elseif ($item->plant->status === 'layu') badge-soft-warning <i class='bi bi-exclamation-triangle me-1'></i>
                                      @elseif ($item->plant->status === 'sakit') badge-soft-danger <i class='bi bi-exclamation-octagon me-1'></i>
                                      @else bg-secondary @endif">
                                      {{ ucfirst($item->plant->status) }}
                                  </span>
                              </td>
                              <td>{{ $item->tanggal_masuk }}</td>
                              <td>{{ $item->jumlah_masuk }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

              </div>
            </div>
          </div>
        </div>
      </section>
      
    </main>
  </div>
@endsection