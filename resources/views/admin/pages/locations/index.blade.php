@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs
        title="Lokasi Penyimpanan"
        :items="[
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'Lokasi Penyimpanan']
        ]"
      />

      <section class="section dashboard">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">{{__('DATA LOKASI PENYIMPANAN')}}</h5>
                          <div class="add-btn-container">
                              <!-- Button to trigger modal -->
                              <button type="button" class="btn-add-item" data-bs-toggle="modal" data-bs-target="#Location">
                                  <i class="ri-add-fill"></i>
                                  {{ __('TAMBAH') }}
                              </button>
                          </div>

                            <div class="table-responsive">
                              <!-- Table with stripped rows -->
                              <table class="table table-bordered table-hover datatable">
                                  <thead>
                                      <tr>
                                          <th>NO</th>
                                          <th>{{__('NAMA LOKASI')}}</th>
                                          <th>{{__('DIBUAT PADA')}}</th>
                                          <th>{{__('AKSI')}}</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($locations as $location)
                                          <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $location->name }}</td>
                                            <td>{{ $location->created_at->format('d F Y, H:i') }}</td>
                                            <td>
                                                <div style="display: flex; align-items: center;">
                                                    <button type="button" class="icon-button" data-bs-toggle="modal" data-bs-target="#EditLocation{{ $location->id }}">
                                                        <i class='bx bx-edit'></i>
                                                    </button>
                                                    <x-action-buttons
                                                        deleteData="{{ route('locations.destroy', $location->id) }}"
                                                        method="DELETE"
                                                        submit="true"
                                                    />
                                                </div>
                                            </td>
                                          </tr>
                                            @include('modals.edit_location_modal')
                                      @endforeach
                                  </tbody>
                              </table>
                              <!-- End Table with stripped rows -->
                          </div>
                        @include('modals.create_location_modal')
                      </div>
                  </div>
              </div>
          </div>
      </section>

    </main>
  </div>
@endsection
