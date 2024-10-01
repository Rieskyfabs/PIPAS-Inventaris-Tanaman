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
                          <th>{{__('KODE TANAMAN KELUAR')}}</th>
                          <th>{{__('KODE TANAMAN')}}</th>
                          <th>{{__('NAMA TANAMAN')}}</th>
                          <th>{{__('TANGGAL KELUAR')}}</th>
                          <th>{{__('JUMLAH KELUAR')}}</th>
                          <th>{{__('STATUS TANAMAN')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tanamanKeluar as $item)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $item->kode_tanaman_keluar }}</td>
                              <td>{{ $item->plant->plantAttribute->plant_code }}</td>
                              <td>{{ $item->plant->plantAttribute->name }}</td>
                              <td>{{ $item->tanggal_keluar }}</td>
                              <td>{{ $item->jumlah_keluar }}</td>
                              <td>{{ $item->plant->status }}</td>
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