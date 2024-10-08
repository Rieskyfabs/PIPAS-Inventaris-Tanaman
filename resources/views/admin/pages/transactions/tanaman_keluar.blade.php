@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Laporan Tanaman Keluar" 
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['label' => 'Laporan Tanaman Keluar']
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('LAPORAN TANAMAN KELUAR')}}</h5>
                <div class="add-btn-container">

                </div>

                <!-- Table with stripped rows -->
                <table class="table table-bordered table-hover datatable">
                    <thead>
                        <tr>
                          <th>{{__('NO')}}</th>
                          <th>{{__('GAMBAR')}}</th>
                          <th>{{__('KODE TANAMAN KELUAR')}}</th>
                          <th>{{__('KODE TANAMAN')}}</th>
                          <th>{{__('NAMA TANAMAN')}}</th>
                          <th>{{__('KONDISI TANAMAN')}}</th>
                          <th>{{__('TANGGAL KELUAR')}}</th>
                          <th>{{__('JUMLAH KELUAR')}}</th>
                          {{-- <th>{{__('TUJUAN')}}</th> --}}
                          <th>{{__('AKSI')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tanamanKeluar as $item)
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
                              <td>{{ $item->kode_tanaman_keluar }}</td>
                              <td>{{ $item->plant->plantAttribute->plant_code }}</td>
                              <td>{{ $item->plant->plantAttribute->name }}</td>
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
                              <td>{{ $item->tanggal_keluar }}</td>
                              <td>{{ $item->jumlah_keluar }}</td>
                              {{-- <td>Dummy -> GreenRoof</td> --}}
                              <td>
                                  <x-action-buttons
                                      deleteData="{{ route('categories.destroy', $item->id) }}"
                                      method="DELETE"
                                      submit="true"
                                      :dropdown="[ 
                                        ['href' => route('categories.edit', $item->id), 'label' => 'Edit'], 
                                      ]"
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
      </section>
      
    </main>
  </div>
@endsection