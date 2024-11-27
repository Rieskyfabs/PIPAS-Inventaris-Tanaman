@extends('layouts.admin')

@section('title', 'Dashboard')

@section('contents')
  <div>
    <main id="main" class="main">

      <x-breadcrumbs
        title="Kategori"
        :items="[
          ['route' => 'admin/dashboard', 'label' => 'Dashboard'],
          ['label' => 'Kategori']
        ]"
      />

      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">{{ __('DATA KATEGORI TANAMAN') }}</h5>
                <div class="add-btn-container">
                  <x-add-button 
                    target="#Category" 
                    label="TAMBAH" 
                  />
                </div>
                <!-- Table with stripped rows -->
                <table class="table table-bordered table-hover datatable">
                  <thead>
                      <tr>
                        <th>{{__('NO')}}</th>
                        <th>{{__('NAMA KATEGORI')}}</th>
                        <th>{{__('DIBUAT PADA')}}</th>
                        <th>{{__('AKSI')}}</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($categories as $item)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex flex-column">
                                    <div class="text-heading text-truncate">
                                      <span class="fw-medium">{{ $item->name }}</span>
                                    </div>
                                    <small>{{ $item->description ?? 'Tidak Ada Deskripsi' }}</small>
                                </div>
                            </td>
                            <td>{{ $item->created_at->format('d F Y, H:i') }}</td>
                            <td>
                                <div style="display: flex; align-items: center;">
                                    <x-action-buttons 
                                        editModalTarget="#EditCategory{{ $item->id }}"
                                        deleteRoute="{{ route('categories.destroy', $item->id) }}"
                                    />
                                </div>
                            </td>
                          </tr>
                          @include('modals.edit_category_modal')
                      @endforeach
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
                @include('modals.create_category_modal')
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
@endsection
