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
                                                  <x-action-buttons
                                                        deleteData="{{ route('locations.destroy', $location->id) }}"
                                                        method="DELETE"
                                                        submit="true"
                                                        :dropdown="[
                                                            ['href' => route('locations.edit', $location->id), 'label' => 'Edit'],
                                                        ]"
                                                    />
                                              </td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                              <!-- End Table with stripped rows -->
                          </div>

                          <!-- Create Locations Modal -->
                          <div class="modal fade" id="Location" tabindex="-1" aria-labelledby="LocationLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="LocationLabel">{{ __('Tambahkan Lokasi Baru') }}</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                          @if ($errors->any())
                                              <div class="alert alert-danger">
                                                  <ul>
                                                      @foreach ($errors->all() as $error)
                                                          <li>{{ $error }}</li>
                                                      @endforeach
                                                  </ul>
                                              </div>
                                          @endif
                                          <form action="{{ route('locations.store') }}" method="POST">
                                              @csrf
                                              <div class="form-floating mb-3">
                                                  <input type="text" name="name" class="form-control" id="floatingInputName" placeholder="name" required>
                                                  <label for="floatingInputName">{{ __('Nama Lokasi') }}</label>
                                              </div>
                                              <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- End Locations Modal -->

                      </div>
                  </div>
              </div>
          </div>
      </section>

    </main>
  </div>
@endsection
