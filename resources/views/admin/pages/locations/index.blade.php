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
                              <a href="{{ route('locations.create') }}" class="btn-add-item">
                                  +
                                  {{ __('TAMBAH') }}
                              </a>
                          </div>
                          
                          <div class="table-responsive">
                              <!-- Table with stripped rows -->
                              <table class="table table-bordered table-hover datatable">
                                  <thead>
                                      <tr>
                                          <th>NO</th>
                                          <th>{{__('NAMA LOKASI')}}</th>
                                          <th>{{__('CREATED AT')}}</th>
                                          <th>{{__('ACTIONS')}}</th>
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
                      </div>
                  </div>
              </div>
          </div>
      </section>
      
    </main>
  </div>
@endsection