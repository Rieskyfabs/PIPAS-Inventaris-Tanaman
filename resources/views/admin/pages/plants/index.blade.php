@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Tanaman" 
        :items="[
          ['route' => 'home', 'label' => 'Home'],
          ['label' => 'Tanaman']
        ]" 
      />

      <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Data Tanaman</h5>
                <p></p>

                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                          <th>Nama Tanaman</th>
                          <th>Nama Ilmiah</th>
                          <th>Tipe Tanaman</th>
                          <th>Kategori</th>
                          <th>Manfaat</th>
                          <th>Lokasi Tanaman</th>
                          <th>Jumlah</th>
                          <th>Status</th>
                          <th>Barcode</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plants as $plant)
                            <tr>
                              <td>{{ $plant->name }}</td>
                              <td>{{ $plant->scientific_name }}</td>
                              <td>{{ $plant->type }}</td>
                              <td>{{ $plant->category_id }}</td>
                              <td>{{ $plant->benefit_id }}</td>
                              <td>{{ $plant->location }}</td>
                              <td>{{ $plant->quantity }}</td>
                              <td>{{ $plant->status }}</td>
                              <td>{{ $plant->barcode }}</td>
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