@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs 
        title="Manfaat Tanaman" 
        :items="[
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'Manfaat Tanaman']
        ]" 
      />

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{__('DATA MANFAAT TANAMAN')}}</h5>
                <div class="add-btn-container">
                    <a href="{{ route('benefits.create') }}" class="btn-add-item">
                        +
                        {{ __('TAMBAH') }}
                    </a>
                </div>

                <!-- Table with stripped rows -->
                <table class="table table-bordered table-hover datatable">
                    <thead>
                        <tr>
                          <th>{{__('NO')}}</th>
                          <th>{{__('NAMA MANFAAT')}}</th>
                          <th>{{__('CREATED AT')}}</th>
                          <th>{{__('ACTIONS')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($benefits as $benefit)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $benefit->name }}</td>
                              <td>{{ $benefit->created_at->format('d F Y, H:i') }}</td>
                              <td>
                                  <x-action-buttons
                                      deleteData="{{ route('benefits.destroy', $benefit->id) }}"
                                      method="DELETE"
                                      submit="true" {{-- Tombol hapus akan muncul --}}
                                      :dropdown="[ 
                                          ['href' => route('benefits.edit', $benefit->id), 'label' => 'Edit'], 
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