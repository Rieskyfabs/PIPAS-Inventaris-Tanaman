@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Transaksi Tanaman Masuk" 
        :items="[
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'Transaksi Tanaman Masuk']
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('TANAMAN MASUK')}}</h5>
                <div class="add-btn-container">
                  
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
                        @foreach ($tanamanMasuk as $item)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>
                                  @if($item->image)
                                      <a href="{{ asset('storage/' . $item->image) }}" target="_blank">
                                          <img src="{{ asset('storage/' . $item->image) }}" alt="Image of {{ $item->plantAttribute->name }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
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